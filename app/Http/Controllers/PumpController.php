<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PumpController extends Controller
{
    public function index()
    {
        return view('pumpselector.index');
    }

    public function cenO() {
        return view('pumpselector.cen-o');
    }
    public function getCenoData(Request $request)
    {
        $row = $request->query('row', 2);
        $sheet = $request->query('sheet', 'Data');
        $range = $request->query('range', 'A:AR');
        
        $spreadsheetId = env('ID_CEN_O');
        
        $url = "https://docs.google.com/spreadsheets/d/{$spreadsheetId}/gviz/tq?sheet={$sheet}&range={$range}";
        
        $response = Http::get($url);

        if ($response->failed()) {
            return response()->json(['error' => 'Gagal mengambil data'], 500);
        }

        return response($response->body())->header('Content-Type', 'text/javascript');
    }

    public function saveToSheets(Request $request)
    {
        $scriptUrl = env('SCRIPT_CEN_O');
        
        $response = Http::post($scriptUrl, $request->all());

        return response()->json(['status' => 'success']);
    }

    public function cenSv()
    {
        return view('pumpselector.cen-sv');
    }
}