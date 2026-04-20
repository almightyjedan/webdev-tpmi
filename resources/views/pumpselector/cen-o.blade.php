<!DOCTYPE html>
<html lang="en">
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="m-0 p-0 flex flex-col min-h-screen font-['Inter','Segoe_UI',sans-serif] bg-[#f8fafc] box-border 
                 [--primary:#1b4399] [--primary-light:#3b82f6] [--card-bg:#ffffff] [--text-main:#1e293b] 
                 [--accent-blue:#e0f2fe] [--danger:#ef4444] [--success:#10b981] [--border-color:#e2e8f0] 
                 [--slate-soft:#f8fafc] [--slate-text:#64748b] max-[600px]:p-[10px]">
        @include('layouts.partials.navbar')

        <div class="bg-white rounded-[24px] shadow-[0_20px_50px_rgba(0,0,0,0.05)] w-full max-w-full h-auto min-h-[calc(100vh-40px)] p-[25px] flex flex-col box-border border border-[rgba(226,232,240,0.8)] max-[600px]:p-[15px] max-[600px]:rounded-[16px]">
            
            <div class="flex justify-center items-center gap-[20px] mb-[20px] p-[20px] bg-white rounded-[20px] border border-[var(--border-color)] shadow-[0_4px_15px_rgba(0,0,0,0.05)] self-center w-auto max-w-full flex-wrap max-[600px]:gap-[15px] max-[600px]:p-[15px] max-[600px]:justify-around">
                
                <div class="flex flex-col gap-[8px]">
                    <label class="text-[11px] font-[800] text-[#94a3b8] uppercase">Head</label>
                    <div class="flex items-center bg-[var(--slate-soft)] border-2 border-[var(--border-color)] rounded-[12px] px-[15px] py-[5px] max-[600px]:px-[10px]">
                        <input type="number" id="actHead" class="w-[70px] border-none bg-transparent py-[8px] text-center font-[800] text-[18px] text-[var(--primary)] outline-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none max-[600px]:w-[60px] max-[600px]:text-[16px]" placeholder="0">
                        <span class="text-[12px] font-[700] text-[#cbd5e1] ml-[5px]">m</span>
                    </div>
                </div>

                <div class="flex flex-col gap-[8px]">
                    <label class="text-[11px] font-[800] text-[#94a3b8] uppercase">Capacity</label>
                    <div class="flex items-center bg-[var(--slate-soft)] border-2 border-[var(--border-color)] rounded-[12px] px-[15px] py-[5px] max-[600px]:px-[10px]">
                        <input type="number" id="actCap" class="w-[70px] border-none bg-transparent py-[8px] text-center font-[800] text-[18px] text-[var(--primary)] outline-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none max-[600px]:w-[60px] max-[600px]:text-[16px]" placeholder="0"> 
                        <span class="text-[12px] font-[700] text-[#cbd5e1] ml-[5px]">m³/h</span>
                    </div>
                </div>

                <div class="flex flex-col gap-[8px]">
                    <label class="text-[11px] font-[800] text-[#94a3b8] uppercase">Density</label>
                    <div class="flex items-center bg-[var(--slate-soft)] border-2 border-[var(--border-color)] rounded-[12px] px-[15px] py-[5px] max-[600px]:px-[10px]">
                        <input type="number" id="actDens" class="w-[70px] border-none bg-transparent py-[8px] text-center font-[800] text-[18px] text-[var(--primary)] outline-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none max-[600px]:w-[60px] max-[600px]:text-[16px]" placeholder="0"> 
                        <span class="text-[12px] font-[700] text-[#cbd5e1] ml-[5px]">kg/m³</span>
                    </div>
                </div>

                <div class="flex flex-col gap-[8px]">
                    <label class="text-[11px] font-[800] text-[#94a3b8] uppercase">Viscosity</label>
                    <div class="flex items-center bg-[var(--slate-soft)] border-2 border-[var(--border-color)] rounded-[12px] px-[15px] py-[5px] max-[600px]:px-[10px]">
                        <input type="number" id="actVisc" class="w-[70px] border-none bg-transparent py-[8px] text-center font-[800] text-[18px] text-[var(--primary)] outline-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none max-[600px]:w-[60px] max-[600px]:text-[16px]" placeholder="0"> 
                        <span class="text-[12px] font-[700] text-[#cbd5e1] ml-[5px]">cP</span>
                    </div>
                </div>
                
                <button id="saveBtn" class="bg-[var(--success)] text-white border-none py-[12px] px-[20px] rounded-[12px] cursor-pointer font-[800] transition-transform active:scale-95 max-[600px]:w-full">SAVE TO SHEETS</button>
            </div>

            <div id="recommendation_container" class="mt-[15px] bg-white p-[15px] rounded-[16px] border border-[var(--border-color)] hidden max-w-[1000px] w-full mx-auto box-border overflow-x-auto">
                <h4 class="text-[var(--primary)] m-0 mb-[10px] text-[14px] uppercase tracking-[1px] font-bold">Pompa Sesuai Range</h4>
                <table id="pumpTable" class="w-full border-collapse text-[12px]">
                    <thead class="bg-[#f8fafc]">
                        <tr class="text-[var(--slate-text)] border-b border-[#e2e8f0]">
                            <th class="p-[12px_8px] text-center font-bold uppercase text-[11px]">No</th>
                            <th class="p-[12px_8px] text-left font-bold uppercase text-[11px]">Size Pump</th>
                            <th class="p-[12px_8px] text-center font-bold uppercase text-[11px]">Qopt max (m³/h)</th>
                            <th class="p-[12px_8px] text-center font-bold uppercase text-[11px]">Qopt (m³/h)</th>
                            <th class="p-[12px_8px] text-center font-bold uppercase text-[11px]">Flow Ratio</th>
                            <th class="p-[12px_8px] text-center font-bold uppercase text-[11px]">SP (kW)</th>
                            <th class="p-[12px_8px] text-center font-bold uppercase text-[11px]">Efficiency (%)</th>
                            <th class="p-[12px_8px] text-center font-bold uppercase text-[11px]">Potongan Impeller (mm)</th>
                            <th class="p-[12px_8px] text-center font-bold uppercase text-[11px]">Impeller Max (mm)</th>
                            <th class="p-[12px_8px] text-center font-bold uppercase text-[11px]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pumpTableBody"></tbody>
                </table>
            </div>

            <div class="text-center text-[22px] font-[800] text-[var(--primary)] mb-[5px] mt-4 max-[600px]:text-[18px]" id="main_title">Pump Performance Analysis</div>
            <div id="equation_title" class="text-center text-[16px] font-sans text-[var(--slate-text)] leading-[1.5] bg-[var(--slate-soft)] p-[12px_20px] rounded-[12px] self-center border border-[var(--border-color)] min-w-[250px] max-w-full box-border">Loading coefficients...</div>
            <div id="chart_div" class="w-full h-[500px] flex-grow-0 max-[600px]:h-[350px]"></div>

            <div class="flex justify-center items-center gap-[10px] mt-[15px] flex-wrap">
                <button class="bg-[var(--primary)] text-white border-none p-[10px_15px] rounded-[12px] cursor-pointer font-[700] text-[13px] disabled:bg-[#cbd5e1]" id="prevBtn" onclick="changeGraph(-1)">⇠ PREV</button>
                <div class="flex items-center gap-[8px] bg-[#e0f2fe] p-[5px_15px] rounded-[12px] border-2 border-[#bae6fd]">
                    <span class="font-[800] text-[var(--primary)] text-[12px]">POMPA</span>
                    <input type="number" id="pumpInput" class="w-[35px] border border-[#7dd3fc] rounded-[8px] text-center p-[4px] text-[14px] font-[800] text-[var(--primary)] outline-none" value="1">
                </div>
                <button class="bg-[var(--primary)] text-white border-none p-[10px_15px] rounded-[12px] cursor-pointer font-[700] text-[13px] disabled:bg-[#cbd5e1]" id="nextBtn" onclick="changeGraph(1)">NEXT ⇢</button>
            </div>
        </div>

        @vite(['resources/js/cen-o.js'])
    </body>
</html>