<?php

namespace App\Http\Controllers;

use App\Models\CorporatePage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function corporateData()
    {
        // Ambil data pertama, jika tidak ada kirim object kosong agar tidak error property on null
        $corporate = CorporatePage::first() ?? new CorporatePage();
        return view('about.corporate-data', compact('corporate'));
    }

    public function corporateProfile()
    {
        $corporate = CorporatePage::first() ?? new CorporatePage();
        return view('about.corporate-profile', compact('corporate'));
    }
}