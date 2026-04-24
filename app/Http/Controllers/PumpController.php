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

    public function cen() {
        return view('pumpselector.cen');
    }
    public function getCenData(Request $request)
    {
        $row = $request->query('row', 2);
        $sheet = $request->query('sheet', 'Data');
        $range = $request->query('range', 'A:AR');
        
        $spreadsheetId = env('ID_CEN');
        
        $url = "https://docs.google.com/spreadsheets/d/{$spreadsheetId}/gviz/tq?sheet={$sheet}&range={$range}";
        
        $response = Http::get($url);

        if ($response->failed()) {
            return response()->json(['error' => 'Gagal mengambil data'], 500);
        }

        return response($response->body())->header('Content-Type', 'text/javascript');
    }

    public function saveToSheetsCen(Request $request)
    {
        $scriptUrl = env('SCRIPT_CEN');
        
        $response = Http::post($scriptUrl, $request->all());

        return response()->json(['status' => 'success']);
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

    public function getCensvData(Request $request)
    {
        $type = $request->query('type');
        
        // Tentukan ID berdasarkan type
        $spreadsheetId = ($type === 'SEMI-OPEN') 
            ? env('ID_CEN_SV_SEMI') 
            : env('ID_CEN_SV_CLOSE');

        // Ambil semua parameter asli (tqx, tq, sheet, range)
        $params = $request->all();
        unset($params['type']); // hapus agar tidak dikirim ke google

        $url = "https://docs.google.com/spreadsheets/d/{$spreadsheetId}/gviz/tq?" . http_build_query($params);
        
        $response = Http::get($url);
        
        return response($response->body())->header('Content-Type', 'text/javascript');
    }

    public function saveToSheetsCensv(Request $request)
    {
        $type = $request->input('type');
        $scriptUrl = env('SCRIPT_CEN_SV');
        
        // Tentukan ID untuk dikirim ke Google Apps Script
        $spreadsheetId = ($type === 'SEMI-OPEN') ? env('ID_CEN_SV_SEMI') : env('ID_CEN_SV_CLOSE');
        
        $payload = $request->all();
        $payload['spreadsheetId'] = $spreadsheetId;

        $response = Http::post($scriptUrl, $payload);

        return response()->json(['status' => 'success']);
    }
}