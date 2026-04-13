<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Torishima Pump Mfg. Indonesia</title>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<style>
            :root {
                --primary: #1b4399;
                --primary-light: #3b82f6;
                --card-bg: #ffffff;
                --text-main: #1e293b;
                --accent-blue: #e0f2fe;
                --danger: #ef4444;
                --success: #10b981;
                --border-color: #e2e8f0;
                --slate-soft: #f8fafc;
                --slate-text: #64748b;
            }

            body {
                margin: 0;
                padding: 10px;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                min-height: 100vh;
                font-family: 'Inter', 'Segoe UI', sans-serif;
                box-sizing: border-box;
                background: #f8fafc;
            }

            .card-chart {
                background: var(--card-bg);
                border-radius: 24px;
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
                width: 100%;
                max-width: 100%;
                height: auto;
                min-height: calc(100vh - 40px);
                padding: 25px;
                display: flex;
                flex-direction: column;
                box-sizing: border-box;
                border: 1px solid rgba(226, 232, 240, 0.8);
            }

            .chart-header {
                text-align: center;
                font-size: 22px;
                font-weight: 800;
                color: var(--primary);
                margin-bottom: 5px;
            }

            #equation_title {
                text-align: center;
                font-size: 16px;
                font-family: sans-serif;
                color: var(--slate-text);
                line-height: 1.5;
                background: var(--slate-soft);
                padding: 12px 20px;
                border-radius: 12px;
                align-self: center;
                border: 1px solid var(--border-color);
                min-width: 250px;
                max-width: 100%;
                box-sizing: border-box;
            }

            #chart_div {
                width: 100%;
                height: 500px;
                flex-grow: 0;
            }

            .actual-input-container {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 20px;
                margin-bottom: 20px;
                padding: 20px;
                background: #ffffff;
                border-radius: 20px;
                border: 1px solid var(--border-color);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
                align-self: center;
                width: auto;
                max-width: 100%;
                flex-wrap: wrap;
            }

            .input-group {
                display: flex;
                flex-direction: column;
                gap: 8px;
            }

            .input-group label {
                font-size: 11px;
                font-weight: 800;
                color: #94a3b8;
                text-transform: uppercase;
            }

            .input-wrapper {
                display: flex;
                align-items: center;
                background: var(--slate-soft);
                border: 2px solid var(--border-color);
                border-radius: 12px;
                padding: 5px 15px;
            }

            .input-field {
                width: 70px;
                border: none;
                background: transparent;
                padding: 8px 0;
                text-align: center;
                font-weight: 800;
                font-size: 18px;
                color: var(--primary);
                outline: none;
            }

            .select-field {
                width: 120px;
                border: none;
                background: transparent;
                padding: 8px 0;
                text-align: center;
                font-weight: 800;
                font-size: 16px;
                color: var(--primary);
                outline: none;
            }

            .input-field::-webkit-outer-spin-button,
            .input-field::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            .input-field[type=number] {
                -moz-appearance: textfield;
            }

            .unit-label {
                font-size: 12px;
                font-weight: 700;
                color: #cbd5e1;
                margin-left: 5px;
            }

            .btn-save {
                background: var(--success);
                color: white;
                border: none;
                padding: 12px 20px;
                border-radius: 12px;
                cursor: pointer;
                font-weight: 800;
                transition: transform 0.2s;
            }

            .btn-save:active {
                transform: scale(0.95);
            }

            .nav-container {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
                margin-top: 15px;
                flex-wrap: wrap;
            }

            .btn-nav {
                background: var(--primary);
                color: white;
                border: none;
                padding: 10px 15px;
                border-radius: 12px;
                cursor: pointer;
                font-weight: 700;
                font-size: 13px;
            }

            .btn-nav:disabled {
                background: #cbd5e1;
            }

            .page-input-container {
                display: flex;
                align-items: center;
                gap: 8px;
                background: var(--accent-blue);
                padding: 5px 15px;
                border-radius: 12px;
                border: 2px solid #bae6fd;
            }

            .pump-label-nav {
                font-weight: 800;
                color: var(--primary);
                font-size: 12px;
            }

            .pump-number-input {
                width: 35px;
                border: 1px solid #7dd3fc;
                border-radius: 8px;
                text-align: center;
                padding: 4px;
                font-size: 14px;
                font-weight: 800;
                color: var(--primary);
                outline: none;
            }

            .recommendation-container {
                margin-top: 15px;
                background: white;
                padding: 15px;
                border-radius: 16px;
                border: 1px solid var(--border-color);
                display: none;
                max-width: 1000px;
                width: 100%;
                margin-left: auto;
                margin-right: auto;
                box-sizing: border-box;
                overflow-x: auto;
            }

            .recommendation-title {
                color: var(--primary);
                margin: 0 0 10px 0;
                font-size: 14px;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            .pump-table {
                width: 100%;
                border-collapse: collapse;
                font-size: 12px;
                text-align: left;
                min-width: 700px;
            }

            .pump-table thead tr {
                color: var(--slate-text);
                border-bottom: 2px solid #f1f5f9;
            }

            .pump-table th,
            .pump-table td {
                padding: 10px 8px;
                text-align: center;
            }

            .pump-table td {
                border-bottom: 1px solid #f1f5f9;
            }

            .td-number {
                color: #94a3b8;
            }

            .td-name {
                font-weight: bold;
            }

            .td-sp {
                color: #b91c1c;
                font-weight: bold;
            }

            .td-eff {
                color: #15803d;
                font-weight: bold;
            }

            .btn-view {
                background: var(--primary);
                color: white;
                border: none;
                padding: 6px 12px;
                border-radius: 6px;
                cursor: pointer;
                font-size: 11px;
                font-weight: bold;
            }

            @media (max-width: 600px) {
                body {
                    padding: 10px;
                }

                .card-chart {
                    padding: 15px;
                    border-radius: 16px;
                }

                .chart-header {
                    font-size: 18px;
                }

                #chart_div {
                    height: 350px;
                }


                .btn-save {
                    width: 100%;
                }

                .input-wrapper {
                    padding: 5px 10px;
                }

                .input-field {
                    width: 60px;
                    font-size: 16px;
                }
            }
		</style>
	</head>
	<body>
		<div class="card-chart">
			<div class="actual-input-container">
                <div class="input-group">
                    <label>Tipe Impeller</label>
                    <div class="input-wrapper">
                        <select id="spreadsheetSelector" class="select-field" onchange="switchSpreadsheet()">
                            <option value="13hO64XmmUWm4LEGIBk1XfI4G4Ytb3KHK8DBJFEKgMCY">CLOSE</option>
                            <option value="1wWzB1WWwg0m8gxJdiKt0Eo15j5Aq512enRcNg9yMR0U">SEMI-OPEN</option>
                        </select>
                    </div>
                </div>
                <div class="input-group">
                    <label>Head</label>
                    <div class="input-wrapper">
                        <input type="number" id="actHeadInput" class="input-field" placeholder="0" oninput="calculateBowlHeadRealtime()">
                        <span class="unit-label">m</span>
                    </div>
                </div>

                <div class="input-group">
                    <label>LWL</label>
                    <div class="input-wrapper">
                        <input type="number" id="actLWL" class="input-field" placeholder="0" oninput="calculateBowlHeadRealtime()">
                        <span class="unit-label">m</span>
                    </div>
                </div>

                <div class="input-group">
                    <label>Bowl Head</label>
                    <div class="input-wrapper" style="background: #e2e8f0;"> <input type="number" id="actHead" class="input-field" placeholder="Calc..." readonly>
                        <span class="unit-label">m</span>
                    </div>
                </div>

                <div class="input-group">
                    <label>Capacity</label>
                    <div class="input-wrapper">
                        <input type="number" id="actCap" class="input-field" placeholder="0" oninput="updatePoint()"> 
                        <span class="unit-label">m³/h</span>
                    </div>
                </div>

                <div class="input-group">
                    <label>Density</label>
                    <div class="input-wrapper">
                        <input type="number" id="actDens" class="input-field" placeholder="0"> 
                        <span class="unit-label">kg/m³</span>
                    </div>
                </div>

                <div class="input-group">
                    <label>Viscosity</label>
                    <div class="input-wrapper">
                        <input type="number" id="actVisc" class="input-field" placeholder="0"> 
                        <span class="unit-label">cP</span>
                    </div>
                </div>
                
                <button id="saveBtn" class="btn-save" onclick="updateAllSheets()">SAVE TO SHEETS</button>
            </div>
			<div id="recommendation_container" class="recommendation-container">
				<h4 class="recommendation-title">Pompa Sesuai Range</h4>
				<table id="pumpTable" class="pump-table">
					<thead>
						<tr>
							<th>No</th>
							<th>Size Pump</th>
							<th>Qopt max (m³/h)</th>
							<th>Qopt (m³/h)</th>
							<th>Flow Ratio</th>
							<th>SP (kW)</th>
                            <th>Efficiency Pump (%)</th>
							<th>Efficiency Bowl (%)</th>
							<th>Potongan Impeller (mm)</th>
							<th>Impeller Max (mm)</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody id="pumpTableBody"></tbody>
				</table>
			</div>
			<div class="chart-header" id="main_title">Pump Performance Analysis</div>
			<div id="equation_title">Loading coefficients...</div>
			<div id="chart_div"></div>
			<div class="nav-container">
				<button class="btn-nav" id="prevBtn" onclick="changeGraph(-1)">⇠ PREV</button>
				<div class="page-input-container">
					<span class="pump-label-nav">POMPA</span>
					<input type="number" id="pumpInput" class="pump-number-input" value="1">
				</div>
				<button class="btn-nav" id="nextBtn" onclick="changeGraph(1)">NEXT ⇢</button>
			</div>
		</div>
		<script type="text/javascript">
			// ==========================================
            // FLOW 1: PERSIAPAN & PENGAMBILAN DATA
            // ==========================================
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(init);
            let currentRow = 2,
                totalRows = 0;
            let coeffN = {},
                coeffM = {},
                coeffR = {};
            let SPREADSHEET_ID = document.getElementById('spreadsheetSelector').value;
            const scriptURL = 'https://script.google.com/macros/s/AKfycbzveA2s9xncZbZ3dHGLqEJyckuxWNAF6Zi6ckj_s5O4B9vo9gpK4o54P-WdB_4O57hX/exec';

            function switchSpreadsheet() {
                SPREADSHEET_ID = document.getElementById('spreadsheetSelector').value;
                
                currentRow = 2; 
                
                init();
                
                console.log("Switched to ID: " + SPREADSHEET_ID);
            }
            function init() {
                const query = new google.visualization.Query(`https://docs.google.com/spreadsheets/d/${SPREADSHEET_ID}/gviz/tq?sheet=Data&range=A:A`);
                query.send(response => {
                    if (!response.isError()) {
                        totalRows = response.getDataTable().getNumberOfRows();
                        fetchCoefficients();
                    }
                });
            }

            function fetchCoefficients() {
                const qN = new google.visualization.Query(`https://docs.google.com/spreadsheets/d/${SPREADSHEET_ID}/gviz/tq?sheet=Data&range=A${currentRow}:AR${currentRow}`);
                const qM = new google.visualization.Query(`https://docs.google.com/spreadsheets/d/${SPREADSHEET_ID}/gviz/tq?sheet=Data_Min&range=J${currentRow}:R${currentRow}`);
                const qR = new google.visualization.Query(`https://docs.google.com/spreadsheets/d/${SPREADSHEET_ID}/gviz/tq?sheet=Data_Rate&range=J${currentRow}:R${currentRow}`);
                const qE = new google.visualization.Query(`https://docs.google.com/spreadsheets/d/${SPREADSHEET_ID}/gviz/tq?sheet=Efficiency&range=Q${currentRow}:R${currentRow}`);
                Promise.all([
                    new Promise(res => qN.send(res)),
                    new Promise(res => qM.send(res)),
                    new Promise(res => qR.send(res)),
                    new Promise(res => qE.send(res))
                ]).then(res => handleQueryResponse(res[0], res[1], res[2], res[3]));
                document.getElementById('pumpInput').value = currentRow - 1;
            }

            function handleQueryResponse(respN, respM, respR, respE) {
                if (respN.isError()) return;
                
                let dtN = respN.getDataTable();
                let dtM = !respM.isError() ? respM.getDataTable() : null;
                let dtR = !respR.isError() ? respR.getDataTable() : null;
                let dtE = !respE.isError() ? respE.getDataTable() : null;

                document.getElementById('main_title').innerText = dtN.getValue(0, 0);
                
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

                document.getElementById('actHeadInput').value = dtN.getValue(0, 34) || ""; 
                document.getElementById('actLWL').value       = dtN.getValue(0, 35) || ""; 
                document.getElementById('actCap').value       = dtN.getValue(0, 37) || ""; 
                document.getElementById('actHead').value      = dtN.getValue(0, 36) || ""; 

                if (dtE && dtE.getNumberOfRows() > 0) {
                    document.getElementById('actDens').value = dtE.getValue(0, 0) || "";
                    document.getElementById('actVisc').value = dtE.getValue(0, 1) || "";
                }

                updatePoint();
            }
            
            // ==========================================
            // FLOW 2: LOGIKA HITUNG & ANALISIS
            // ==========================================
            function findIntersection(n, g) {
                if (!n.a) return 0;
                let lowX = 0,
                    highX = 150;
                for (let i = 0; i < 40; i++) {
                    let midX = (lowX + highX) / 2;
                    let yP = (n.a * Math.pow(midX, 4)) + (n.b * Math.pow(midX, 3)) + (n.c * Math.pow(midX, 2)) + (n.d * midX) + n.e;
                    if (yP > g * midX) lowX = midX;
                    else highX = midX;
                }
                return lowX;
            }

            function updatePoint() {
                let hIn = parseFloat(document.getElementById('actHead').value) || 0,
                    cIn = parseFloat(document.getElementById('actCap').value) || 0;
                let statusText = "<span style='color:#94a3b8;'>WAITING INPUT</span>";
                if (hIn > 0 && cIn > 0) {
                    let yMax = (coeffN.a * Math.pow(cIn, 4)) + (coeffN.b * Math.pow(cIn, 3)) + (coeffN.c * Math.pow(cIn, 2)) + (coeffN.d * cIn) + coeffN.e;
                    let yMin = coeffM.a ? (coeffM.a * Math.pow(cIn, 4)) + (coeffM.b * Math.pow(cIn, 3)) + (coeffM.c * Math.pow(cIn, 2)) + (coeffM.d * cIn) + coeffM.e : 0;
                    statusText = (hIn <= (yMax + 0.1) && hIn >= (yMin - 0.1)) ? "<b style='color:green;'>IN RANGE</b>" : "<b style='color:red;'>OVERFLOW / OUT OF RANGE</b>";
                }
                document.getElementById('equation_title').innerHTML = `<div>Status: ${statusText}</div>`;
                drawCurve(coeffN, coeffM, coeffR, cIn, hIn);
                checkAllPumps();
            }

            function checkAllPumps() {
                let hIn = parseFloat(document.getElementById('actHead').value) || 0;
                let cIn = parseFloat(document.getElementById('actCap').value) || 0;
                if (hIn <= 0 || cIn <= 0) {
                    document.getElementById('recommendation_container').style.display = "none";
                    return;
                }
                
                const qVisual = new google.visualization.Query(`https://docs.google.com/spreadsheets/d/${SPREADSHEET_ID}/gviz/tq?sheet=Visual&range=A2:I`);
                const qData = new google.visualization.Query(`https://docs.google.com/spreadsheets/d/${SPREADSHEET_ID}/gviz/tq?sheet=Data&range=A2:AN`);
                const qMin = new google.visualization.Query(`https://docs.google.com/spreadsheets/d/${SPREADSHEET_ID}/gviz/tq?sheet=Data_Min&range=N2:R`);
                
                Promise.all([
                    new Promise(res => qVisual.send(res)),
                    new Promise(res => qData.send(res)),
                    new Promise(res => qMin.send(res))
                ]).then(responses => {
                    let dtVisual = responses[0].getDataTable();
                    let dtMax = responses[1].getDataTable();
                    let dtMin = !responses[2].isError() ? responses[2].getDataTable() : null;
                    let tbody = document.getElementById('pumpTableBody');
                    let container = document.getElementById('recommendation_container');
                    tbody.innerHTML = "";
                    let foundCount = 0;
                    
                    for (let i = 0; i < dtMax.getNumberOfRows(); i++) {
                        let n = {
                            a: Number(dtMax.getValue(i, 29)), b: Number(dtMax.getValue(i, 30)),
                            c: Number(dtMax.getValue(i, 31)), d: Number(dtMax.getValue(i, 32)), e: Number(dtMax.getValue(i, 33))
                        };
                        let m = (dtMin && dtMin.getNumberOfRows() > i) ? {
                            a: Number(dtMin.getValue(i, 0)), b: Number(dtMin.getValue(i, 1)),
                            c: Number(dtMin.getValue(i, 2)), d: Number(dtMin.getValue(i, 3)), e: Number(dtMin.getValue(i, 4))
                        } : null;
                        
                        const calcY = (c, x) => (c.a * Math.pow(x, 4)) + (c.b * Math.pow(x, 3)) + (c.c * Math.pow(x, 2)) + (c.d * x) + c.e;
                        let yMax = calcY(n, cIn);
                        let yMin = m ? calcY(m, cIn) : 0;

                        // Gunakan toleransi 0.5 agar sinkron dengan status
                        if (hIn <= (yMax + 0.001) && hIn >= (yMin - 0.5)) {
                            foundCount++;
                            let row = tbody.insertRow();
                            row.innerHTML = `
                                <td>${i + 1}</td>
                                <td>${dtVisual.getValue(i, 0)}</td>
                                <td>${dtVisual.getValue(i, 1)}</td>
                                <td>${dtVisual.getValue(i, 2).toFixed(2)}</td>
                                <td>${dtVisual.getValue(i, 3).toFixed(2)}</td>
                                <td>${dtVisual.getValue(i, 4).toFixed(2)}</td>
                                <td>${dtVisual.getValue(i, 5).toFixed(2)}</td>
                                <td>${dtVisual.getValue(i, 6).toFixed(2)}</td>
                                <td>${dtVisual.getValue(i, 7).toFixed(2)}</td>
                                <td>${dtVisual.getValue(i, 8)}</td> 
                                <td><button onclick="goToPump(${i + 1})" class="btn-view">VIEW</button></td>`;
                        }
                    }
                    container.style.display = foundCount > 0 ? "block" : "none";
                });
            }

            // ==========================================
            // FLOW 3: VISUALISASI (GAMBAR GRAFIK BERSIH)
            // ==========================================
            function drawCurve(n, m, r, actX, actY) {
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'X');
                data.addColumn('number', 'Maksimum');
                data.addColumn('number', 'Minimum');
                data.addColumn('number', 'Rate');
                data.addColumn('number', 'Actual Point');

                let maxDataLimit = Math.max(n.limitX || 0, m.limitX || 0, r.limitX || 0, actX || 0);
                
                let dynamicXMax = maxDataLimit > 0 ? maxDataLimit * 1.1 : 100;

                let highestPoint = Math.max(n.e || 0, m.e || 0, r.e || 0, actY || 0);
                let dynamicYMax = Math.max(50, Math.ceil((highestPoint * 1.3) / 10) * 10);

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

                if (actX > 0 && actY > 0) {
                    data.addRow([actX, null, null, null, actY]);
                }

                var options = {
                    colors: ['#ef4444', '#3b82f6', '#22c55e', '#000000'],
                    curveType: 'function',
                    legend: { position: 'bottom' },
                    lineWidth: 2.5,
                    series: {
                        2: { lineDashStyle: [4, 4] }, 
                        3: { pointSize: 12, lineWidth: 0, pointShape: 'triangle', visibleInLegend: true, labelInLegend: 'Actual Point' } 
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
            function changeGraph(step) {
                let targetRow = currentRow + step;
                if (targetRow >= 2 && targetRow <= totalRows) {
                    currentRow = targetRow;
                    fetchCoefficients();
                }
            }

            function goToPump(index) {
                currentRow = index + 1;
                fetchCoefficients();
            }

            function updateAllSheets() {
                const btn = document.getElementById('saveBtn');
                let headIn = parseFloat(document.getElementById('actHeadInput').value) || 0;
                let lwlIn = parseFloat(document.getElementById('actLWL').value) || 0;
                let capIn = parseFloat(document.getElementById('actCap').value) || 0;
                let bowlHead = parseFloat(document.getElementById('actHead').value) || 0; // Dari input readonly

                if (headIn === 0 || capIn === 0) {
                    alert("Input data belum lengkap!");
                    return;
                }
                
                btn.innerText = "SAVING...";
                btn.disabled = true;

                const qData = new google.visualization.Query(`https://docs.google.com/spreadsheets/d/${SPREADSHEET_ID}/gviz/tq?sheet=Data&range=AD:AH`);
                qData.send(resp => {
                    let dt = resp.getDataTable();
                    let bulkData = [];
                    let slope = (capIn > 0) ? bowlHead / capIn : 0;

                    for (let i = 0; i < dt.getNumberOfRows(); i++) {
                        let n = { a: dt.getValue(i, 0), b: dt.getValue(i, 1), c: dt.getValue(i, 2), d: dt.getValue(i, 3), e: dt.getValue(i, 4) };
                        let rx = findIntersection(n, slope);
                        let ry = slope * rx;

                       // Ganti bagian bulkData.push lama dengan ini:
                        bulkData.push({
                            part1: [
                                Number(headIn), // Masuk ke AI (35)
                                Number(lwlIn)   // Masuk ke AJ (36)
                            ],
                            part2: [
                                Number(capIn),       // Masuk ke AL (38)
                                Number(rx.toFixed(4)), // Masuk ke AM (39)
                                Number(ry.toFixed(4))  // Masuk ke AN (40)
                            ],
                            efficiency: [
                                Number(document.getElementById('actDens').value), 
                                Number(document.getElementById('actVisc').value)
                            ]
                        });
                    }

                    fetch(scriptURL, {
                        method: 'POST',
                        mode: 'no-cors',
                        body: JSON.stringify({ 
                            spreadsheetId: SPREADSHEET_ID, // ID dinamis dari dropdown
                            allData: bulkData 
                        })
                    }).then(() => {
                        const tipe = document.getElementById('spreadsheetSelector').options[document.getElementById('spreadsheetSelector').selectedIndex].text;
                        alert("Data Berhasil Disimpan ke Spreadsheet " + tipe + "!");
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

            function calculateBowlHeadRealtime() {
                let headVal = parseFloat(document.getElementById('actHeadInput').value) || 0;
                let lwlVal = parseFloat(document.getElementById('actLWL').value) || 0;
                let result = headVal - lwlVal;
                document.getElementById('actHead').value = result;
                updatePoint(); 
            }
            window.addEventListener('resize', updatePoint);
		</script>
	</body>
</html>