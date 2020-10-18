<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table pegawai
        DB::table('bagian')->insert([
            'nama_bagian' => 'Pengamanan Rutan',
            'created_at' => Carbon::now()
        ]);

        DB::table('bagian')->insert([
        	'nama_bagian' => 'Tata Usaha',
            'created_at' => Carbon::now()
        ]);

        DB::table('bagian')->insert([
        	'nama_bagian' => 'Sub Seksi Umum dan Kepegawaian',
            'created_at' => Carbon::now()
        ]);

        DB::table('bagian')->insert([
        	'nama_bagian' => 'Sub Seksi Keuangan dan Perlengkapan',
            'created_at' => Carbon::now()
        ]);

        DB::table('bagian')->insert([
        	'nama_bagian' => 'Sub Seksi Administrasi dan Perawatan',
            'created_at' => Carbon::now()
        ]);

        DB::table('bagian')->insert([
        	'nama_bagian' => 'Sub Seksi Bantuan Hukum dan Penyuluhan',
            'created_at' => Carbon::now()
        ]);

        DB::table('bagian')->insert([
        	'nama_bagian' => 'Sub Seksi Bimbingan Kegiatan dan Kerja',
            'created_at' => Carbon::now()
        ]);

    }

        
}
