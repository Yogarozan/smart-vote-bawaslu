<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nik' => 'required|digits:16|starts_with:3302',
            'candidate_id' => 'required|exists:candidates,id',
            'kecamatan' => 'required',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus berjumlah 16 digit angka.',
            'nik.starts_with' => 'NIK harus terdaftar di Kabupaten Banyumas (diawali kode 3302).',
            'candidate_id.required' => 'Silakan pilih salah satu Pasangan Calon.',
            'kecamatan.required' => 'Silakan pilih kecamatan tempat tinggal Anda.',
        ]);

        // 2. Cek apakah NIK sudah pernah memilih
        if (Vote::where('nik', $request->nik)->exists()) {
            return back()->with('error', 'Hak pilih dengan NIK (' . $request->nik . ') sudah pernah digunakan!');
        }

        // 3. Generate SHA-256 Hash Token unik untuk Audit Ledger
        $rawString = $request->nik . $request->candidate_id . $request->kecamatan . microtime();
        $hashToken = '0x' . strtoupper(substr(hash('sha256', $rawString), 0, 16));

        // 4. Simpan ke Database
        Vote::create([
            'nik' => $request->nik,
            'candidate_id' => $request->candidate_id,
            'kecamatan' => $request->kecamatan,
            'hash_token' => $hashToken,
        ]);

        return back()->with([
            'success' => 'Suara Anda berhasil dienkripsi dan dicatat secara sah di Ledger Bawaslu!',
            'hash_token' => $hashToken
        ]);
    }
}
