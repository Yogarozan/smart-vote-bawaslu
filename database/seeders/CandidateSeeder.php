<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    public function run(): void
    {
        Candidate::create([
            'nomor_urut' => 1,
            'nama_capres' => 'Dr. Ir. H. Sugeng Riyadi, M.T.',
            'nama_cawapres' => 'Dra. Hj. Siti Aminah, M.Si.',
            'partai_pengusung' => 'Koalisi Banyumas Maju',
            'visi_misi' => 'Mewujudkan Banyumas Berbasis Digital dan Ekonomi Kreatif.',
        ]);

        Candidate::create([
            'nomor_urut' => 2,
            'nama_capres' => 'H. Achmad Husein, S.T.',
            'nama_cawapres' => 'Drs. Budi Setiawan, M.M.',
            'partai_pengusung' => 'Koalisi Banyumas Sejahtera',
            'visi_misi' => 'Pembangunan Infrastruktur Merata dan Penguatan Pertanian.',
        ]);

        Candidate::create([
            'nomor_urut' => 3,
            'nama_capres' => 'Prof. Dr. Triatmoko, M.Hum.',
            'nama_cawapres' => 'Aris Munandar, S.Kom.',
            'partai_pengusung' => 'Koalisi Pemuda Banyumas',
            'visi_misi' => 'Pendidikan Gratis dan Digitalisasi Pelayanan Publik.',
        ]);
    }
}
