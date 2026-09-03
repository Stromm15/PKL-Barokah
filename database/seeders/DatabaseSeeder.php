<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Jurusan
        DB::table('jurusans')->insert([
            [
                'jurusan' => 'Rekayasa Perangkat Lunak',
            ],
            [
                'jurusan' => 'Teknik Komputer dan Jaringan',
            ],
            [
                'jurusan' => 'Desain Komunikasi Visual',
            ],
        ]);

        // Siswa
        DB::table('siswas')->insert([
            [
                'nis' => '2026001',
                'nama_siswa' => 'Muhammad Arfa',
                'kelas' => 'XI RPL 1',
                'jurusan_id' => 1,
                'no_hp' => '081234567890',
            ],
            [
                'nis' => '2026002',
                'nama_siswa' => 'Budi Santoso',
                'kelas' => 'XI RPL 1',
                'jurusan_id' => 1,
                'no_hp' => '081234567891',
            ],
            [
                'nis' => '2026003',
                'nama_siswa' => 'Siti Aisyah',
                'kelas' => 'XI RPL 2',
                'jurusan_id' => 1,
                'no_hp' => '081234567892',
            ],
            [
                'nis' => '2026004',
                'nama_siswa' => 'Rizky Ramadhan',
                'kelas' => 'XI RPL 2',
                'jurusan_id' => 1,
                'no_hp' => '081234567893',
            ],
            [
                'nis' => '2026005',
                'nama_siswa' => 'Nadia Putri',
                'kelas' => 'XI RPL 1',
                'jurusan_id' => 1,
                'no_hp' => '081234567894',
            ],
        ]);

        // Perusahaan
        DB::table('perusahaans')->insert([
            [
                'id_perusahaan' => 1,
                'nama_perusahaan' => 'PT Teknologi Nusantara',
                'alamat' => 'Jl. Soekarno Hatta No. 100, Bandung',
            ],
            [
                'id_perusahaan' => 2,
                'nama_perusahaan' => 'CV Digital Kreatif',
                'alamat' => 'Jl. Buah Batu No. 25, Bandung',
            ],
            [
                'id_perusahaan' => 3,
                'nama_perusahaan' => 'PT Inovasi Indonesia',
                'alamat' => 'Jl. Asia Afrika No. 50, Bandung',
            ],
        ]);

        // Pembimbing
        DB::table('pembimbings')->insert([
            [
                'id_pembimbing' => 1,
                'nama_pembimbing' => 'Andi Setiawan',
                'no_hp' => '081234560001',
            ],
            [
                'id_pembimbing' => 2,
                'nama_pembimbing' => 'Dewi Lestari',
                'no_hp' => '081234560002',
            ],
            [
                'id_pembimbing' => 3,
                'nama_pembimbing' => 'Fajar Nugraha',
                'no_hp' => '081234560003',
            ],
        ]);

        // PKL
        DB::table('pkls')->insert([
            [
                'id_pkl' => 1,
                'nis' => '2026001',
                'id_perusahaan' => 1,
                'id_pembimbing' => 1,
            ],
            [
                'id_pkl' => 2,
                'nis' => '2026002',
                'id_perusahaan' => 1,
                'id_pembimbing' => 1,
            ],
            [
                'id_pkl' => 3,
                'nis' => '2026003',
                'id_perusahaan' => 2,
                'id_pembimbing' => 2,
            ],
            [
                'id_pkl' => 4,
                'nis' => '2026004',
                'id_perusahaan' => 2,
                'id_pembimbing' => 2,
            ],
            [
                'id_pkl' => 5,
                'nis' => '2026005',
                'id_perusahaan' => 3,
                'id_pembimbing' => 3,
            ],
        ]);

        // Nilai
        DB::table('nilais')->insert([
            [
                'id_nilai' => 1,
                'id_pkl' => 1,
                'nilai_perusahaan' => 88,
            ],
            [
                'id_nilai' => 2,
                'id_pkl' => 2,
                'nilai_perusahaan' => 92,
            ],
            [
                'id_nilai' => 3,
                'id_pkl' => 3,
                'nilai_perusahaan' => 85,
            ],
            [
                'id_nilai' => 4,
                'id_pkl' => 4,
                'nilai_perusahaan' => 90,
            ],
            [
                'id_nilai' => 5,
                'id_pkl' => 5,
                'nilai_perusahaan' => 87,
            ],
        ]);
    }
}