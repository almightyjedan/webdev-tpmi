/// ==========================================
            // FLOW 1: PERSIAPAN & PENGAMBILAN DATA
            // ==========================================

            /**
             * Inisialisasi awal saat halaman dimuat.
             * Memuat library Google Charts dan menghitung total baris data dari spreadsheet.
             */
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(init);
            let currentRow = 2,
                totalRows = 0;
            let coeffN = {},
                coeffM = {},
                coeffR = {};
            
            function init() {
                // Panggil Google via proxy Laravel
                fetch(`/api/proxy/cen-data?sheet=Data&range=A:A`)
                    .then(res => res.text())
                    .then(text => {
                        // Logika parsing Google DataTable
                        const data = JSON.parse(text.substring(47, text.length - 2));
                        totalRows = data.table.rows.length;
                        fetchCoefficients(); // Lanjut mengambil detail koefisien baris aktif
                });
            }

            /**
             * Mengambil koefisien polinomial dan data teknis dari berbagai sheet (Data, Data_Min, Data_Rate, Efficiency).
             * Berdasarkan variabel 'currentRow' yang sedang aktif.
             */
            let currentGradientStatus = true;
            window.fetchCoefficients = function() {
                const baseUrl = '/api/proxy/cen-data';
                
                // Array promise untuk mengambil semua sheet melalui proxy Laravel
                const pN = fetch(`${baseUrl}?sheet=Data&range=A${currentRow}:AR${currentRow}`).then(r => r.text());
                const pM = fetch(`${baseUrl}?sheet=Data_Min&range=J${currentRow}:R${currentRow}`).then(r => r.text());
                const pR = fetch(`${baseUrl}?sheet=Data_Rate&range=J${currentRow}:R${currentRow}`).then(r => r.text());
                const pE = fetch(`${baseUrl}?sheet=Efficiency&range=Q${currentRow}:R${currentRow}`).then(r => r.text());

                Promise.all([pN, pM, pR, pE]).then(responses => {
                    // Gunakan fungsi helper untuk parse format Google Gviz
                    const parseGviz = (txt) => {
                        const json = JSON.parse(txt.substring(47, txt.length - 2));
                        return new google.visualization.DataTable(json.table);
                    };

                    handleQueryResponse(
                        { isError: () => false, getDataTable: () => parseGviz(responses[0]) },
                        { isError: () => false, getDataTable: () => parseGviz(responses[1]) },
                        { isError: () => false, getDataTable: () => parseGviz(responses[2]) },
                        { isError: () => false, getDataTable: () => parseGviz(responses[3]) }
                    );
                });
                document.getElementById('pumpInput').value = currentRow - 1;
            }

            /**
             * Memproses hasil query dari Google Sheets ke dalam objek koefisien (a, b, c, d, e).
             * @param {Object} respN - Data kurva maksimum (Data)
             * @param {Object} respM - Data kurva minimum (Data_Min)
             * @param {Object} respR - Data kurva rating (Data_Rate)
             * @param {Object} respE - Data densitas & viskositas (Efficiency)
             */

            window.handleQueryResponse = function(respN, respM, respR, respE) {
                if (respN.isError()) return;
                let dtN = respN.getDataTable();
                let dtM = !respM.isError() ? respM.getDataTable() : null;
                let dtR = !respR.isError() ? respR.getDataTable() : null;
                let dtE = !respE.isError() ? respE.getDataTable() : null;

                // Set Judul Pompa
                document.getElementById('main_title').innerText = dtN.getValue(0, 0);

                // Simpan koefisien polinomial derajat 4 (ax^4 + bx^3 + cx^2 + dx + e)
                coeffN = {
                    a: dtN.getValue(0, 29),
                    b: dtN.getValue(0, 30),
                    c: dtN.getValue(0, 31),
                    d: dtN.getValue(0, 32),
                    e: dtN.getValue(0, 33),
                    limitX: dtN.getValue(0, 21)
                };

                coeffM = dtM ? {
                    a: dtM.getValue(0, 4), b: dtM.getValue(0, 5),
                    c: dtM.getValue(0, 6), d: dtM.getValue(0, 7), e: dtM.getValue(0, 8),
                    limitX: dtM.getValue(0, 0)
                } : {};

                coeffR = dtR ? {
                    a: dtR.getValue(0, 4), b: dtR.getValue(0, 5),
                    c: dtR.getValue(0, 6), d: dtR.getValue(0, 7), e: dtR.getValue(0, 8),
                    limitX: dtR.getValue(0, 0)
                } : {};

                // Isi nilai input secara otomatis dari data spreadsheet
                document.getElementById('actCap').value = dtN.getValue(0, 34) || "";
                document.getElementById('actHead').value = dtN.getValue(0, 35) || "";
                if (dtE && dtE.getNumberOfRows() > 0) {
                    document.getElementById('actDens').value = dtE.getValue(0, 0) || "";
                    document.getElementById('actVisc').value = dtE.getValue(0, 1) || "";
                }

                currentGradientStatus = dtN.getValue(0, 39); // Status validasi gradien

                updatePoint(); // Gambar ulang grafik
            }

            // ==========================================
            // FLOW 2: LOGIKA HITUNG & ANALISIS
            // ==========================================

            /**
             * Mencari titik potong antara kurva pompa dan kurva sistem menggunakan metode Bisection.
             * @param {Object} n - Koefisien kurva pompa.
             * @param {Number} g - Gradien kurva sistem (Head / Capacity).
             * @returns {Number} Titik potong pada sumbu X (Capacity).
             */
            window.findIntersection = function(n, g) {
                if (!n.a) return 0;
                let lowX = 0,
                    highX = 150;
                
                // Iterasi sebanyak 40 kali untuk mendapatkan akurasi tinggi
                for (let i = 0; i < 40; i++) {
                    let midX = (lowX + highX) / 2;
                    let yP = (n.a * Math.pow(midX, 4)) + (n.b * Math.pow(midX, 3)) + (n.c * Math.pow(midX, 2)) + (n.d * midX) + n.e;
                    if (yP > g * midX) lowX = midX;
                    else highX = midX;
                }
                return lowX;
            }

            /**
             * Memvalidasi apakah input user (Head & Capacity) berada di dalam range kurva.
             * Memperbarui teks status UI dan memicu penggambaran grafik.
             */
            window.updatePoint = function() {
                let hIn = parseFloat(document.getElementById('actHead').value) || 0,
                    cIn = parseFloat(document.getElementById('actCap').value) || 0;
                let statusText = "<span style='color:#94a3b8;'>WAITING INPUT</span>";
                if (hIn > 0 && cIn > 0) {
                    // Hitung nilai Y pada kurva Max dan Min berdasarkan X (cIn) inputan
                    let yMax = (coeffN.a * Math.pow(cIn, 4)) + (coeffN.b * Math.pow(cIn, 3)) + (coeffN.c * Math.pow(cIn, 2)) + (coeffN.d * cIn) + coeffN.e;
                    let yMin = coeffM.a ? (coeffM.a * Math.pow(cIn, 4)) + (coeffM.b * Math.pow(cIn, 3)) + (coeffM.c * Math.pow(cIn, 2)) + (coeffM.d * cIn) + coeffM.e : 0;
                    
                    // Cek apakah titik berada di antara kurva Max dan Min (dengan toleransi 0.1)
                    if (hIn <= (yMax + 0.1) && hIn >= (yMin - 0.1)) {
                        if (currentGradientStatus === true) {
                            statusText = "<b style='color:green;'>IN RANGE</b>";
                        } else {
                            statusText = "<b style='color:red;'>OVERFLOW / OUT OF RANGE</b>";
                        }
                    } else {
                        statusText = "<b style='color:red;'>OVERFLOW / OUT OF RANGE</b>";
                    }
                }
                document.getElementById('equation_title').innerHTML = `<div>Status: ${statusText}</div>`;
                drawCurve(coeffN, coeffM, coeffR, cIn, hIn); // Gambar kurva
                checkAllPumps(); // Cek rekomendasi pompa lain
            }

            /**
             * Memindai seluruh baris data di spreadsheet untuk menemukan pompa mana saja yang cocok dengan input Head & Capacity.
             * Hasilnya ditampilkan dalam tabel rekomendasi.
             */
            window.checkAllPumps = function() {
                let hIn = parseFloat(document.getElementById('actHead').value) || 0;
                let cIn = parseFloat(document.getElementById('actCap').value) || 0;
                if (hIn <= 0 || cIn <= 0) {
                    document.getElementById('recommendation_container').style.display = "none";
                    return;
                }
                const baseUrl = '/api/proxy/cen-data';

                // Ambil data melalui Proxy Laravel, bukan langsung ke Google
                const qVisual = fetch(`${baseUrl}?sheet=Visual&range=A2:H`).then(r => r.text());
                const qData = fetch(`${baseUrl}?sheet=Data&range=A2:AN`).then(r => r.text());
                const qMin = fetch(`${baseUrl}?sheet=Data_Min&range=N2:R`).then(r => r.text());

                Promise.all([qVisual, qData, qMin]).then(responses => {
                    const parseGviz = (txt) => {
                        const json = JSON.parse(txt.substring(47, txt.length - 2));
                        return new google.visualization.DataTable(json.table);
                    };

                    let dtVisual = parseGviz(responses[0]);
                    let dtMax = parseGviz(responses[1]);
                    let dtMin = parseGviz(responses[2]);
                    
                    let tbody = document.getElementById('pumpTableBody');
                    let container = document.getElementById('recommendation_container');
                    tbody.innerHTML = "";
                    let foundCount = 0;
                    for (let i = 0; i < dtMax.getNumberOfRows(); i++) {
                        let isGradientValid = dtMax.getValue(i, 39);
                        let n = {
                            a: Number(dtMax.getValue(i, 29)),
                            b: Number(dtMax.getValue(i, 30)),
                            c: Number(dtMax.getValue(i, 31)),
                            d: Number(dtMax.getValue(i, 32)),
                            e: Number(dtMax.getValue(i, 33))
                        };
                        let m = (dtMin && dtMin.getNumberOfRows() > i) ? {
                            a: Number(dtMin.getValue(i, 0)),
                            b: Number(dtMin.getValue(i, 1)),
                            c: Number(dtMin.getValue(i, 2)),
                            d: Number(dtMin.getValue(i, 3)),
                            e: Number(dtMin.getValue(i, 4))
                        } : null;
                        const calcY = (c, x) => (c.a * Math.pow(x, 4)) + (c.b * Math.pow(x, 3)) + (c.c * Math.pow(x, 2)) + (c.d * x) + c.e;
                        let yMax = calcY(n, cIn);
                        let yMin = m ? calcY(m, cIn) : 0;
                        // Jika input masuk dalam range pompa ke-i, tambahkan ke tabel
                        if (hIn <= (yMax + 0.5) && hIn >= (yMin - 0.5) && isGradientValid == true) {
                            foundCount++;
                            let row = tbody.insertRow();
                            row.innerHTML = `
                                <td class="p-[12px_8px] text-center border-b border-[#f1f5f9] text-[#64748b] font-medium">${i + 1}</td>
                                <td class="p-[12px_8px] text-left border-b border-[#f1f5f9] font-bold text-[#1e293b] whitespace-nowrap">${dtVisual.getValue(i, 0)}</td>
                                <td class="p-[12px_8px] text-center border-b border-[#f1f5f9] text-[#1e293b]">${dtVisual.getValue(i, 1)}</td>
                                <td class="p-[12px_8px] text-center border-b border-[#f1f5f9] text-[#1e293b]">${dtVisual.getValue(i, 2).toFixed(2)}</td>
                                <td class="p-[12px_8px] text-center border-b border-[#f1f5f9] text-[#1e293b]">${dtVisual.getValue(i, 3).toFixed(2)}</td>
                                <td class="p-[12px_8px] text-center border-b border-[#f1f5f9] text-[#1e293b] font-bold text-[#b91c1c]">${dtVisual.getValue(i, 4).toFixed(2)}</td>
                                <td class="p-[12px_8px] text-center border-b border-[#f1f5f9] text-[#1e293b] font-bold text-[#15803d]">${dtVisual.getValue(i, 5).toFixed(2)}</td>
                                <td class="p-[12px_8px] text-center border-b border-[#f1f5f9] text-[#1e293b]">${dtVisual.getValue(i, 6).toFixed(2)}</td>
                                <td class="p-[12px_8px] text-center border-b border-[#f1f5f9] text-[#1e293b] whitespace-nowrap">${dtVisual.getValue(i, 7)}</td> 
                                <td class="p-[12px_8px] text-center border-b border-[#f1f5f9]">
                                    <button onclick="goToPump(${i + 1})" 
                                        class="bg-[#1b4399] text-white px-[16px] py-[6px] rounded-[6px] text-[11px] font-bold tracking-wider hover:bg-[#15347a] transition-colors shadow-sm">
                                        VIEW
                                    </button>
                                </td>`;
                        }
                    }
                    container.style.display = foundCount > 0 ? "block" : "none";
                });
            }

            // ==========================================
            // FLOW 3: VISUALISASI (GAMBAR GRAFIK)
            // ==========================================

            /**
             * Menggambar kurva performa menggunakan Google LineChart API.
             * Menghasilkan kurva Max, Min, Rate, dan satu titik segitiga untuk posisi aktual.
             */
            window.drawCurve = function(n, m, r, actX, actY) {
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'X');
                data.addColumn('number', 'Maksimum');
                data.addColumn('number', 'Minimum');
                data.addColumn('number', 'Rate');
                data.addColumn('number', 'Actual Point');

                // Menentukan batas sumbu X dan Y secara dinamis agar grafik tidak terpotong
                let maxDataLimit = Math.max(n.limitX || 0, m.limitX || 0, r.limitX || 0, actX || 0);
                let dynamicXMax = maxDataLimit > 0 ? maxDataLimit * 1.1 : 100;
                let highestPoint = Math.max(n.e || 0, m.e || 0, r.e || 0, actY || 0);
                let dynamicYMax = Math.max(50, Math.ceil((highestPoint * 1.3) / 10) * 10);

                // Loop untuk membentuk garis kurva dari kumpulan titik-titik (250 langkah)
                for (var x = 0; x <= dynamicXMax; x += (dynamicXMax / 250)) {
                    let yN = null, yM = null, yR = null;
                    if (x <= n.limitX) {
                        yN = (n.a * Math.pow(x, 4)) + (n.b * Math.pow(x, 3)) + (n.c * Math.pow(x, 2)) + (n.d * x) + n.e;
                    }
                    if (m && m.limitX && x <= m.limitX) {
                        yM = (m.a * Math.pow(x, 4)) + (m.b * Math.pow(x, 3)) + (m.c * Math.pow(x, 2)) + (m.d * x) + m.e;
                    }
                    if (r && r.limitX && x <= r.limitX) {
                        yR = (r.a * Math.pow(x, 4)) + (r.b * Math.pow(x, 3)) + (r.c * Math.pow(x, 2)) + (r.d * x) + r.e;
                    }
                    data.addRow([
                        x, 
                        (yN !== null && yN >= 0) ? yN : null, 
                        (yM !== null && yM >= 0) ? yM : null, 
                        (yR !== null && yR >= 0) ? yR : null, 
                        null
                    ]);
                }

                // Tambahkan titik aktual (Actual Point) sebagai data point tunggal
                if (actX > 0 && actY > 0) {
                    data.addRow([actX, null, null, null, actY]);
                }

                var options = {
                    // Konfigurasi tampilan: warna, ketebalan garis, dan desain titik actual
                    colors: ['#ef4444', '#3b82f6', '#22c55e', '#000000'],
                    curveType: 'function',
                    legend: { position: 'bottom' },
                    lineWidth: 2.5,
                    series: {
                        2: { lineDashStyle: [4, 4] }, // Garis Rate putus-putus
                        3: { pointSize: 12, lineWidth: 0, pointShape: 'triangle', visibleInLegend: true, labelInLegend: 'Actual Point' }  // Titik aktual bentuk segitiga
                    },
                    chartArea: { width: '92%', height: '80%', top: 20, left: 50 },
                    hAxis: { 
                        title: 'Capacity (m³/h)', 
                        viewWindow: { min: 0, max: dynamicXMax },
                        gridlines: { count: 12 }
                    },
                    vAxis: { 
                        title: 'Head (m)', 
                        viewWindow: { min: 0, max: dynamicYMax }
                    }
                };
                new google.visualization.LineChart(document.getElementById('chart_div')).draw(data, options);
            }

            // ==========================================
            // FLOW 4: NAVIGASI & PENYIMPANAN
            // ==========================================

            /**
             * Navigasi antar baris data (pompa) menggunakan tombol Prev/Next.
             */
            window.changeGraph = function(step) {
                let targetRow = currentRow + step;
                if (targetRow >= 2 && targetRow <= totalRows) {
                    currentRow = targetRow;
                    fetchCoefficients();
                }
            };

            /**
             * Melompat langsung ke nomor pompa tertentu (digunakan oleh tombol VIEW di tabel rekomendasi).
             */
            window.goToPump = function(index) {
                currentRow = index + 1;
                fetchCoefficients();
            }

            /**
             * Menghitung titik potong untuk SEMUA pompa di spreadsheet dan mengirimkan hasilnya secara massal
             * ke Google Apps Script (Web App) untuk disimpan kembali ke spreadsheet.
             */
            window.updateAllSheets = function() {
                const btn = document.getElementById('saveBtn');
                let hIn = parseFloat(document.getElementById('actHead').value) || 0;
                let cIn = parseFloat(document.getElementById('actCap').value) || 0;
                if (hIn <= 0 || cIn <= 0) {
                    alert("Input Data dulu!");
                    return;
                }
                btn.innerText = "SAVING...";
                btn.disabled = true;

                // Ambil koefisien seluruh pompa untuk perhitungan massal
                const baseUrl = '/api/proxy/cen-data';
                fetch(`${baseUrl}?sheet=Data&range=AD2:AH`)
                    .then(res => res.text())
                    .then(text => {
                        const json = JSON.parse(text.substring(47, text.length - 2));
                        let dt = new google.visualization.DataTable(json.table);
                        
                        let bulkData = [];
                        let slope = hIn / cIn; // Gradien sistem
                    for (let i = 0; i < dt.getNumberOfRows(); i++) {
                        let n = {
                            a: dt.getValue(i, 0),
                            b: dt.getValue(i, 1),
                            c: dt.getValue(i, 2),
                            d: dt.getValue(i, 3),
                            e: dt.getValue(i, 4)
                        };
                        let rx = findIntersection(n, slope); // Cari titik potong X
                        let ry = slope * rx; // Cari titik potong Y
                        bulkData.push({
                            main: [Number(cIn), Number(hIn), Number(rx.toFixed(4)), Number(ry.toFixed(4))],
                            efficiency: [Number(document.getElementById('actDens').value), Number(document.getElementById('actVisc').value)]
                        });
                    }

                    // Kirim data ke Google Apps Script via POST
                    fetch('/api/proxy/cen-save', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // WAJIB untuk keamanan Laravel
                        },
                        body: JSON.stringify({
                            allData: bulkData
                        })
                    }).then(() => {
                        alert("Data Berhasil Disimpan!");
                        btn.innerText = "SAVE TO SHEETS";
                        btn.disabled = false;
                    });
                });
            }
            document.getElementById('pumpInput').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    let pN = parseInt(this.value);
                    if (!isNaN(pN)) {
                        currentRow = Math.min(Math.max(pN + 1, 2), totalRows);
                        fetchCoefficients();
                    }
                }
            });
            
            document.addEventListener('DOMContentLoaded', function() {
                const actHead = document.getElementById('actHead');
                const actCap = document.getElementById('actCap');

                // Update grafik saat Head diubah
                if (actHead) {
                    actHead.addEventListener('input', () => {
                        if (typeof window.updatePoint === 'function') {
                            window.updatePoint();
                        }
                    });
                }

                // Update grafik saat Capacity diubah
                if (actCap) {
                    actCap.addEventListener('input', () => {
                        if (typeof window.updatePoint === 'function') {
                            window.updatePoint();
                        }
                    });
                }

                // Tombol Save ke Google Sheets
                const saveBtn = document.getElementById('saveBtn');
                if (saveBtn) {
                    saveBtn.addEventListener('click', () => {
                        if (typeof window.updateAllSheets === 'function') {
                            window.updateAllSheets();
                        }
                    });
                }
            })

            // Pastikan Chart responsif saat ukuran layar berubah
            window.addEventListener('resize', () => {
                if (typeof window.updatePoint === 'function') {
                    window.updatePoint();
                }
            });
            window.addEventListener('resize', updatePoint);