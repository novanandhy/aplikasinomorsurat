<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Surat;

class SuratController extends Controller
{
	// menampilkan halaman awal
    public function index()
    {
    	// mengambil data dari table surat
    	$surat = Surat::all();
 
    	// mengirim data surat ke view admin_daftarsurat
    	return view('admin_daftarsurat',['surat' => $surat]);
 
	}
	
	// menampilkan autocomplete tujuan surat
	public function autocomplete_tujuan(Request $request)
	{
		$search = $request->get('query');
		$result = Surat::select('tujuan_surat')->where('tujuan_surat', 'LIKE','%'.$search.'%')->get();

		$data = array();
		foreach ($result as $result) {
			$data[]=$result->tujuan_surat;
		}

		return response()->json($data);
	}

	// menampilkan autocomplete tujuan instansi surat
	public function autocomplete_instansi(Request $request)
	{
		$search = $request->get('query');
		$result = Surat::select('tujuan_instansi')->where('tujuan_instansi', 'LIKE','%'.$search.'%')->get();

		$data = array();
		foreach ($result as $result) {
			$data[]=$result->tujuan_instansi;
		}

		return response()->json($data);
	}
}
