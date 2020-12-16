<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Bagian;

class BagianController extends Controller
{
    public function index()
    {
    	// mengambil data dari table bagian
        $bagian = Bagian::all();
        
        // mengirim data surat ke view user_aplikasi
    	return view('user_aplikasi',['bagian' => $bagian]);
 
    }
}
