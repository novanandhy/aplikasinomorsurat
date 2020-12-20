<?php
    namespace App\Traits;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    use App\Models\Bagian;

    /**
     * CRUD Surat
     */
    trait BagianApi
    {
        public function getAllBagian(){
            return Bagian::all();
        }

        public function getBagiantBy($id){
            $bagian = Bagian::find($id);

            return $bagian;
        }

        public function createBagian(request $request)
        {
            if ($this.checkBagianExist($request) === NULL) {
                
                $bagian = new Bagian([
                    'nama_bagian' => $request->get('namaBagian')
                ]);
        
                $bagian->save();

                return $bagian;
            }else{
                return null;
            }
        }

        public function updateBagian(request $request, $id)
        {
            $bagian = Bagian::find($id);

            $bagian->nama_bagian = $request->get('namaBagian');

            $bagian->save();

            return $bagian;

        }

        public function deleteBagian($id)
        {
            $bagian = Bagian::find($id);
            $bagian->delete();

            return "berhasil dihapus";
        }

        public function checkBagianExist(request $request)
        {
            $exist = Bagian::where('nama_bagian', $request->get('namaBagian'))->first();

            return $exist;
        }
        
    }
    

?>