<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Surat;
use App\Models\Bagian;

class SuratController extends Controller
{
	// menampilkan halaman utama pengguna
	public function index()
	{
		// mengambil data dari table bagian
    	$bagian = Bagian::all();
 
    	// mengirim data bagian ke view user_aplikasi
    	return view('user_aplikasi', compact('bagian'));
	}

	// menyimpan data surat
	public function store(Request $request)
	{
		$message = [
			'required' => ':attribute wajib diisi',
			'min' => ':attribute diisi minimal :min karakter',
			'max' => ':attribute diisi maksimal :max karakter'
		];

		$this->validate($request,[
			'pengirim' => 'required',
			'tujuanSurat' => 'required|min:7',
			'tujuanInstansi' => 'required|min:7',
			'tanggalSurat' => 'required|min:10|max:10',
			'kodeSurat' => 'required|min:15',
			'perihalSurat' => 'required|min:7'
		], $message);

		$exist = Surat::where('id_pengirim', $request->get('pengirim'))->where('tujuan_surat', $request->get('tujuanSurat'))->where('tujuan_instansi', $request->get('tujuanInstansi'))->where('tanggal_surat', $request->get('tanggalSurat'))->where('kode_surat', $request->get('kodeSurat'))->where('perihal_surat', $request->get('perihalSurat'))->first();

		if($exist === null){
			$surat = new Surat([
				'id_pengirim' => $request->get('pengirim'),
				'tujuan_surat' => $request->get('tujuanSurat'),
				'tujuan_instansi' => $request->get('tujuanInstansi'),
				'tanggal_surat' => $request->get('tanggalSurat'),
				'kode_surat' => $request->get('kodeSurat'),
				'perihal_surat' => $request->get('perihalSurat'),
				'created_at' => Carbon::now()
			]);
	
			$surat->save();
			
			$data = Surat::where('tujuan_surat', $surat['tujuan_surat'])->where('id_pengirim', $surat['id_pengirim'])->where('perihal_surat', $surat['perihal_surat'])->first();
	
			return view('user_cetaknomor', compact('data'));
		}else{
			return redirect()->route('aplikasi.index')->with('error','data surat telah ada');
		}
	}

	// menuju ke halaman edit
	public function edit(Request $request)
	{
		return view('admin_editsurat', compact('request'));
	}

	//  memperbarui alamat
	public function update(Request $request, Surat $surat)
	{
		$message = [
			'required' => ':attribute wajib diisi',
			'min' => ':attribute diisi minimal :min karakter',
			'max' => ':attribute diisi maksimal :max karakter'
		];

		$this->validate($request,[
			'pengirim' => 'required',
			'tujuanSurat' => 'required|min:7',
			'tujuanInstansi' => 'required|min:7',
			'tanggalSurat' => 'required|min:10|max:10',
			'kodeSurat' => 'required|min:15',
			'perihalSurat' => 'required|min:7'
		], $message);

		$surat->update(['id_pengirim' => $request->get('pengirim'),
		'tujuan_surat' => $request->get('tujuanSurat'),
		'tujuan_instansi' => $request->get('tujuanInstansi'),
		'tanggal_surat' => $request->get('tanggalSurat'),
		'kode_surat' => $request->get('kodeSurat'),
		'perihal_surat' => $request->get('perihalSurat'),
		'updated_at' => Carbon::now()]);

		return redirect()->route('aplikasi.admin')->with('success','data surat berhasil diperbarui');
	}

	// menghapus data
	public function destroy(Surat $surat)
	{
		$surat -> delete();

		return redirect()->route('aplikasi.admin')->with('success','data surat berhasil dihapus');
	}

	// menampilkan halaman utama admin
	public function admin()
	{
		// mengambil data dari table surat
    	$surat = Surat::all();
 
    	// mengirim data bagian ke view admin_daftarsurat
    	return view('admin_daftarsurat', compact('surat'));
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
