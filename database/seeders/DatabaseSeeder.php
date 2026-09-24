<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pkls')->delete();
        DB::table('perusahaans')->delete();
        DB::table('siswas')->delete();
        DB::table('jurusans')->delete();
        DB::table('users')->where('role', 'pic')->delete();

        DB::table('users')->insert([
            [
                'name' => 'PIC RPL',
                'email' => 'rpl@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pic',
                'no_hp' => '081234560001',
            ],
            [
                'name' => 'PIC TKJ',
                'email' => 'tkj@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pic',
                'no_hp' => '081234560002',
            ],
            [
                'name' => 'PIC Tekstil',
                'email' => 'tekstil@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pic',
                'no_hp' => '081234560003',
            ],
            [
                'name' => 'PIC TKR',
                'email' => 'tkr@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pic',
                'no_hp' => '081234560004',
            ],
            [
                'name' => 'PIC Mesin',
                'email' => 'mesin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pic',
                'no_hp' => '081234560004',
            ],
            [
                'name' => 'PIC DGM',
                'email' => 'dgm@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pic',
                'no_hp' => '081234560004',
            ],
            [
                'name' => 'PIC Elektrnoka',
                'email' => 'elektro@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pic',
                'no_hp' => '081234560004',
            ],
            [
                'name' => 'PIC Mekatronika',
                'email' => 'meka@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pic',
                'no_hp' => '081234560004',
            ],
            [
                'name' => 'PIC PSPT',
                'email' => 'pspt@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'pic',
                'no_hp' => '081234560004',
            ],
        ]);

        $picIds = DB::table('users')->where('role', 'pic')->pluck('id')->all();

        DB::table('jurusans')->insert([
            ['id' => 1, 'jurusan' => 'Rekayasa Perangkat Lunak'],
            ['id' => 2, 'jurusan' => 'Teknik Komputer dan Jaringan'],
            ['id' => 3, 'jurusan' => 'Broadcasting dan perfilman'],
            ['id' => 4, 'jurusan' => 'Teknik Penyempurnaan Tekstil'],
            ['id' => 5, 'jurusan' => 'Teknik Kendaraan Ringan'],
            ['id' => 6, 'jurusan' => 'Mesin'],
            ['id' => 7, 'jurusan' => 'Design Gambar Mesin'],
            ['id' => 8, 'jurusan' => 'Elektronika'],
            ['id' => 9, 'jurusan' => 'Mekatronika'],
        ]);

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
                'kelas' => 'XI TKJ 1',
                'jurusan_id' => 2,
                'no_hp' => '081234567893',
            ],
        ]);

        DB::table('perusahaans')->insert([
            [
                'id_pic' => $picIds[0],
                'nama_perusahaan' => 'PT Teknologi Nusantara',
                'alamat' => 'Jl. Soekarno Hatta No. 100, Bandung',
            ],
            [
                'id_pic' => $picIds[1],
                'nama_perusahaan' => 'CV Digital Kreatif',
                'alamat' => 'Jl. Buah Batu No. 25, Bandung',
            ],
            [
                'id_pic' => $picIds[2],
                'nama_perusahaan' => 'PT Inovasi Indonesia',
                'alamat' => 'Jl. Asia Afrika No. 50, Bandung',
            ],
            [
                'id_pic' => $picIds[3],
                'nama_perusahaan' => 'PT Citra Solusi',
                'alamat' => 'Jl. Diponegoro No. 88, Bandung',
            ],
        ]);

        $perusahaanIds = DB::table('perusahaans')->pluck('id_perusahaan')->all();

        DB::table('pkls')->insert([
            [
                'nis' => '2026001',
                'id_perusahaan' => $perusahaanIds[0],
                'id_pic' => $picIds[0],
                'tgl_mulai' => '2026-01-05',
                'tgl_selesai' => '2026-04-05',
                'status' => 'Mengajukan',
            ],
            [
                'nis' => '2026002',
                'id_perusahaan' => $perusahaanIds[1],
                'id_pic' => $picIds[1],
                'tgl_mulai' => '2026-01-10',
                'tgl_selesai' => '2026-04-10',
                'status' => 'Mengajukan',
            ],
            [
                'nis' => '2026003',
                'id_perusahaan' => $perusahaanIds[0],
                'id_pic' => $picIds[0],
                'tgl_mulai' => '2026-02-01',
                'tgl_selesai' => '2026-05-01',
                'status' => 'Mengajukan',
            ],
            [
                'nis' => '2026004',
                'id_perusahaan' => $perusahaanIds[2],
                'id_pic' => $picIds[2],
                'tgl_mulai' => '2026-02-15',
                'tgl_selesai' => '2026-05-15',
                'status' => 'Mengajukan',
            ],
            [
                'nis' => '2026001',
                'id_perusahaan' => $perusahaanIds[3],
                'id_pic' => $picIds[3],
                'tgl_mulai' => '2026-03-01',
                'tgl_selesai' => '2026-06-01',
                'status' => 'Mengajukan',
            ],
            [
                'nis' => '2026002',
                'id_perusahaan' => $perusahaanIds[2],
                'id_pic' => $picIds[2],
                'tgl_mulai' => '2026-01-05',
                'tgl_selesai' => '2026-04-05',
                'status' => 'Diterima',
            ],
            [
                'nis' => '2026003',
                'id_perusahaan' => $perusahaanIds[3],
                'id_pic' => $picIds[3],
                'tgl_mulai' => '2026-02-01',
                'tgl_selesai' => '2026-05-01',
                'status' => 'Diterima',
            ],
        ]);
    }
}
