<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Diagnosis;

class DiagnosisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (env('APP_ENV') == 'development') {
            Diagnosis::truncate();
        }

        $data = [
            [
                'kode' => 'B65 Schistosomiasis [bilharziasis]',
                'penjelasan_umum' => 'Infeksi akibat cacing Schistosoma, termasuk Schistosoma haematobium, S. mansoni, dan S. japonicum, yang menyebabkan penyakit bilharziasis atau schistosomiasis.',
                'kategori_bab' => 'Bab I - Penyakit Infeksi dan Parasit Tertentu.',
                'organ_terkait' => 'Usus, hati, kandung kemih (tergantung spesies Schistosoma)',
                'definisi_penyakit' => 'Penyakit parasit kronis yang disebabkan oleh cacing darah (Schistosoma spp), ditularkan melalui air tawar yang terkontaminasi.',
                'kategori_penyakit' => 'PM (Penyakit Menular)',
                'kaidah_koding' => 'Digunakan bila terdapat bukti laboratorium atau klinis dari infeksi Schistosoma spp.',
                'hasil_anamnesis' => 'Riwayat kontak dengan air tawar, keluhan demam, nyeri perut, diare berdarah, atau hematuria (tergantung spesies).',
                'hasil_pemeriksaan' => 'Pembesaran hati dan limpa, hasil pemeriksaan feses atau urin menunjukkan telur Schistosoma, eosinofilia.',
                'penegakan_diagnosis' => 'Schistosomiasis berdasarkan hasil mikroskopis telur Schistosoma pada tinja atau urin.',
                'penatalaksanaan' => 'Pemberian prazikuantel, edukasi kebersihan lingkungan, dan penghindaran air tercemar.',
            ],
            [
                'kode' => 'B65.0 Schistosomiasis due to Schistosoma haematobium [urinary schistosomiasis]',
                'penjelasan_umum' => 'Schistosomiasis akibat infeksi Schistosoma haematobium, umumnya mengenai saluran kemih, terutama kandung kemih.',
                'kategori_bab' => 'Bab I – Penyakit Infeksi dan Parasit Tertentu.',
                'organ_terkait' => 'Saluran kemih (vesika urinaria/kandung kemih, ureter, ginjal).',
                'definisi_penyakit' => 'Penyakit yang disebabkan oleh infeksi parasit Schistosoma haematobium, ditularkan melalui kontak dengan air yang terkontaminasi. Larva masuk ke dalam tubuh melalui kulit, bermigrasi, dan akhirnya menginfeksi saluran kemih.',
                'kategori_penyakit' => 'PM (Penyakit Menular)',
                'kaidah_koding' => 'Digunakan jika terdapat bukti klinis dan/atau laboratorium (misalnya mikroskopi urin menunjukkan telur Schistosoma haematobium) yang mendukung diagnosis.',
                'hasil_anamnesis' => 'Pasien mengeluhkan hematuria (air kencing berdarah), disuria (nyeri saat buang air kecil), nyeri perut bawah, serta riwayat sering kontak dengan air tawar di daerah endemis.',
                'hasil_pemeriksaan' => 'Nyeri tekan di suprapubik, urinalisis menunjukkan hematuria, pemeriksaan mikroskopik urin menunjukkan telur Schistosoma haematobium.',
                'penegakan_diagnosis' => 'Schistosomiasis urinaria akibat Schistosoma haematobium.',
                'penatalaksanaan' => 'Pemberian obat antiparasit seperti praziquantel 40 mg/kg BB sebagai dosis tunggal, edukasi untuk menghindari kontak dengan air tawar yang tercemar, serta pemantauan komplikasi seperti fibrosis kandung kemih atau hidronefrosis.',
            ],
        ];

        Diagnosis::insert($data);
    }
}
