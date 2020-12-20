<?php
    namespace App\Traits;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    use App\Models\Surat;

    /**
     * CRUD Surat
     */
    trait SuratApi
    {
        public function getAllSurat(){
            return Surat::all();
        }

        public function getSuratBy($id){
            $surat = Surat::find($id);

            return $surat;
        }

        public function createSurat(request $request)
        {
            if ($this.checkSuratExist($request) === NULL) {
                
                $surat = new Surat([
                    'id_pengirim' => $request->get('pengirim'),
                    'tujuan_surat' => $request->get('tujuanSurat'),
                    'tujuan_instansi' => $request->get('tujuanInstansi'),
                    'tanggal_surat' => $request->get('tanggalSurat'),
                    'kode_surat' => $request->get('kodeSurat'),
                    'perihal_surat' => $request->get('perihalSurat')
                ]);
        
                $surat->save();

                $data = Surat::where('tujuan_surat', $surat['tujuan_surat'])->where('id_pengirim', $surat['id_pengirim'])->where('perihal_surat', $surat['perihal_surat'])->first();

                return $data;
            }else{
                return null;
            }
        }

        public function updateSurat(request $request, $id)
        {
            $surat = Surat::find($id);

            $surat->id_pengirim = $request->get('pengirim');
            $surat->tujuan_surat = $request->get('tujuanSurat');
            $surat->tujuan_instansi = $request->get('tujuanInstansi');
            $surat->tanggal_surat = $request->get('tanggalSurat');
            $surat->kode_surat = $request->get('kodeSurat');
            $surat->perihal_surat = $request->get('perihalSurat');

            $surat->save();

            return $surat;

        }

        public function deleteSurat($id)
        {
            $surat = Surat::find($id);
            $surat->delete();

            return "berhasil dihapus";
        }

        public function checkSuratExist(request $request)
        {
            $exist = Surat::where('id_pengirim', $request->get('pengirim'))->where('tujuan_surat', $request->get('tujuanSurat'))->where('tujuan_instansi', $request->get('tujuanInstansi'))->where('tanggal_surat', $request->get('tanggalSurat'))->where('kode_surat', $request->get('kodeSurat'))->where('perihal_surat', $request->get('perihalSurat'))->first();

            return $exist;
        }
    }
    

?>