<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

	// validasi form isian
	public function simpan(Request $request){
		$message = [
			'required' => ':attribute wajib diisi',
			'min' => ':attribute diisi minimal :min karakter',
			'max' => ':attribute diisi maksimal :max karakter'
		];

		$this->validate($request,[
			'tujuanSurat' => 'required|min:7',
			'tujuanInstansi' => 'required|min:7',
			'tanggalSurat' => 'required|min:10|max:10',
			'kodeSurat' => 'required|min:15',
			'perihalSurat' => 'required|min:7'
		], $message);

		$exist = Surat::where('id_pengirim', $request->get('idPengirim'))->where('tujuan_surat', $request->get('tujuanSurat'))->where('tujuan_instansi', $request->get('tujuanInstansi'))->where('tanggal_surat', $request->get('tanggalSurat'))->where('kode_surat', $request->get('kodeSurat'))->where('perihal_surat', $request->get('perihalSurat'))->first();

		if($exist === null){
			$surat = new Surat([
				'id_pengirim' => $request->get('idPengirim'),
				'tujuan_surat' => $request->get('tujuanSurat'),
				'tujuan_instansi' => $request->get('tujuanInstansi'),
				'tanggal_surat' => $request->get('tanggalSurat'),
				'kode_surat' => $request->get('kodeSurat'),
				'perihal_surat' => $request->get('perihalSurat'),
				'created_at' => Carbon::now()
			]);
	
			$surat->save();
			
			$data = Surat::where('tujuan_surat', $surat['tujuan_surat'])->where('id_pengirim', $surat['id_pengirim'])->where('perihal_surat', $surat['perihal_surat'])->first();
	
			return view('user_cetaknomor',['data' => $data]);
		}else{
			return redirect('/')->with(['error' => 'Data surat telah ada']);
		}
	
	}
}
