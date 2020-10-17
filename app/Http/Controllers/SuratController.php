<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    public function index()
    {
    	// mengambil data dari table surat
    	$surat = DB::table('surat')->get();
 
    	// mengirim data surat ke view admin_daftarsurat
    	return view('admin_daftarsurat',['surat' => $surat]);
 
    }
}
