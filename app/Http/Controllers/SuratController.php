<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Traits\SuratApi;
use App\Traits\BagianApi;

use App\Models\Surat;
use App\Models\Bagian;

class SuratController extends Controller
{
	use SuratApi;
	use BagianApi;

	// menampilkan halaman utama pengguna
	public function index()
	{
		// mengambil data dari table bagian
    	$bagian = $this->getAllBagian();
 
    	// mengirim data bagian ke view user_aplikasi
    	return view('user_aplikasi', compact('bagian'));
	}

	// menyimpan data surat
	public function store(Request $request)
	{
		// cek validasi form
		$this->validateForm($request);
		
		// memanggil method createSurat
		$data = $this->createSurat($request);

		// cek apakah data telah ada
		if($data === null){

			//jika tidak terkirim data, maka akan kembali ke halaman awal aplikasi
			return redirect()->route('surat.index')->with('error','data surat telah ada');
			
		}else{

			//jika data terkirim, maka akan masuk ke halaman tampilan data nomor surat
			return view('user_cetaknomor', compact('data'));
		}
	}

	// menuju ke halaman edit
	public function edit($id)
	{
		$surat = $this->getSuratBy($id);

		$bagian = $this->getAllBagian();

		$data = array();

		$data['surat'] = $surat;
		$data['bagian'] = $bagian;

		return view('admin_editsurat', ['data'=>$data]);
	}

	//  memperbarui alamat
	public function update(Request $request, $id)
	{
		// cek validasi form
		$this->validateForm($request);

		// memanggil method updateSurat
		$this->updateSurat($request, $id);

		return redirect('/admin');
	}

	// menghapus data
	public function destroy($id)
	{
		//memanggil method deleteSurat
		$this->deleteSurat($id);

		return redirect()->route('surat.admin')->with('success','data surat berhasil dihapus');
	}

	// menampilkan halaman utama admin
	public function admin()
	{
		// mengambil data dari table surat
    	$surat = $this->getAllSurat();
 
    	// mengirim data bagian ke view admin_daftarsurat
    	return view('admin_daftarsurat', compact('surat'));
	}
	
	// menampilkan autocomplete tujuan surat
	public function autocomplete_tujuan(Request $request)
	{
		return $this->tujuanSurat($request);
	}

	// menampilkan autocomplete tujuan instansi surat
	public function autocomplete_instansi(Request $request)
	{
		return $this->instansiSurat($request);
	}

	//melakukan validasi form
	public function validateForm(Request $request)
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
	}
}
