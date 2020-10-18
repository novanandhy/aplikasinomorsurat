<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table pegawai
        DB::table('surat')->insert([
            'id_pengirim' => '1',
            'tujuan_surat' => 'Kepala Kantor Wilayah Kemenkumham Jatim',
            'tujuan_instansi' => 'Kantor Wilayah Kemenkumham Jatim',
            'tanggal_surat' => '2020-10-17',
            'kode_surat' => 'W15.PAS.PAS25-PK.01.04.02',
            'perihal_surat' => 'minta duit dong',
            'created_at' => Carbon::now()
        ]);
    }
}
