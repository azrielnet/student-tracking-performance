<?php

namespace Database\Seeders;

use App\Models\AbsensiData;
use App\Models\DataGuru;
use App\Models\DataKelas;
use App\Models\DataMapel;
use App\Models\DataMurid;
use App\Models\DataNilai;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nisn_nrp' => 1000,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'as' => 'TEACHER',
            'password' => 'admin'
        ]);

        for ($i = 0; $i < 10; $i++) {
            DataMurid::create([
                'nisn' => "100$i",
                'nama' => "Siswa $i",
                'umur' => 17,
                'tahun_sekolah' => "2024",
                'kontak' => "09999",
                'email' => "siswa$i@gmail.com",
                'alamat' => "jalan pakutomo block b no 3",
            ]);
            
            DataGuru::create([
                
                'nrp' => "100151124$i",
                'nama' => "Guru $i",
                'umur' => 24,
                'kontak' => "09999",
                'email' => "guru$i@gmail.com",
                'alamat' => "jalan pakutomo block b no 3",
            ]);
            
            DataNilai::create([
                'nisn' => "100$i",
                'subject' => "SUBJECT-$i",
                "deskripsi_tugas" => "DESKRIPSI-$i",
                'nilai' => 100,
            ]);

            AbsensiData::create([
                'nisn' => "100$i",
                'subject' => "SUBJECT-$i",
                'criteria' => "CRITERIA-$i",
                'kehadiran' => 100

            ]);

            DataKelas::create([
                'kelas_slug' => "kelas-". $i + 1,
                'kelas' => $i + 1
            ]);

            DataMapel::create([
                'mapel_slug' => "Mapel-$i",
                'subject' => "SUBJECT-$i",
                'jadwal' => "17/2/2024 - 14:20"
            ]);
        }
    }
}