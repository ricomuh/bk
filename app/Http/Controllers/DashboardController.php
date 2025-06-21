<?php

namespace App\Http\Controllers;

use App\Models\JanjiPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'dokter') {

            return view('dokter.dashboard');
        }

        $janjiPeriksa = JanjiPeriksa::where('id_pasien', Auth::user()->id)
            // where it does have a periksa record
            ->doesntHave('periksa')
            ->get();

        return view('pasien.riwayat-periksa.index')->with([
            'janjiPeriksa' => $janjiPeriksa,
        ]);
    }
}
