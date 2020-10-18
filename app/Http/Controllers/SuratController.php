<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Surat;

class SuratController extends Controller
{
    public function index()
    {
    	// mengambil data dari table surat
    	$surat = Surat::all();
 
    	// mengirim data surat ke view admin_daftarsurat
    	return view('admin_daftarsurat',['surat' => $surat]);
 
    }
}
