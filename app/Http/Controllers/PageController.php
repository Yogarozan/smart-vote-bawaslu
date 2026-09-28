<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home() {
    $totalVotes = Vote::count();
    $totalReports = DB::table('reports')->count();

    // Ganti 'pages.home' menjadi 'home'
    return view('home', compact('totalVotes', 'totalReports'));
}

    public function profil() {
        return view('pages.profil');
    }

    public function bilikSuara() {
        // Ambil data semua paslon dari database MySQL
        $candidates = Candidate::orderBy('nomor_urut', 'asc')->get();
        return view('bilik-suara', compact('candidates'));
    }

    public function quickCount() {
        // Ambil rekapitulasi suara per paslon
        $results = Candidate::withCount('votes')->get();
        $totalVotes = Vote::count();
        $ledgerLogs = Vote::latest()->take(5)->get();

        return view('pages.quick-count', compact('results', 'totalVotes', 'ledgerLogs'));
    }

    public function audit() {
        return view('pages.audit');
    }
}
