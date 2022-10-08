<?php
/* Import Model */
namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
        //get posts
        $pegawai = Pegawai::paginate(5);
        //render view with posts
        return view('pegawai.index', compact('pegawai'));
    }

        public function create() {
            return view('pegawai.create');
        }
    
        /**
    * store
    *
    * @param Request $request
    * @return void
    */
    
    
       
        public function store(Request $request) {
            //Validasi Formulir
            $this->validate($request, [ 'nomor_induk_pegawai'=> 'required',
                'nama_pegawai'=> 'required',
                'id_departemen'=> 'required',
                'email'=> 'unique:App\Models\Pegawai|email|required',
                'telepon' => 'required|regex:/^([0-9]{10,13}$)/i',
                'gender'=> 'required',
                'status'=> 'required'
                ]);
            //Fungsi Post ke Database
            Pegawai::create([ 'nomor_induk_pegawai'=> $request->nomor_induk_pegawai,
                    'nama_pegawai'=> $request->nama_pegawai,
                    'id_departemen'=> $request->id_departemen,
                    'email'=> $request->email,
                    'telepon'=> $request->telepon,
                    'gender'=> $request->gender,
                    'status'=> $request->status]);
    
            try {
                //Mengisi variabel yang akan ditampilkan pada view mail
                $content=[ 'body'=>$request->nomor_induk_pegawai,
                ];
                //Mengirim email ke emailtujuan@gmail.com
                
                //Redirect jika berhasil mengirim email
                return redirect()->route('pegawai.index')->with(['success'
                    => 'Data Berhasil Disimpan, email telah terkirim!']);
            }
    
            catch(Exception $e) {
                //Redirect jika gagal mengirim email
                return redirect()->route('pegawai.index')->with(['success'
                    => 'Data Berhasil Disimpan, namun gagal mengirim email!']);
            }
        }
    
        public function destroy($id){
            $pegawai = Pegawai::where('id', $id)->firstorfail()->delete();
            echo ("Pegawai Berhasil Dihapus");
            return redirect()->route('pegawai.index')->with((['success' => 'Data berhasil Dihapus']));
        }
    
        public function edit($id){
            $pegawai = Pegawai::find($id);
            return view('pegawai.edit', compact('pegawai'));
        }
    
        public function update(Request $request, $id){
            $this->validate($request, [ 'nomor_induk_pegawai'=> 'required',
            'nama_pegawai'=> 'required',
            'id_departemen'=> 'required',
            'email'=> 'unique:App\Models\Pegawai|email|required',
            'telepon' => 'required|regex:/^([0-9]{10,13}$)/i',
            'gender'=> 'required',
            'status'=> 'required',
            ]);
        //Fungsi Post ke Database
        Pegawai::find($id)->update(['nomor_induk_pegawai'=> $request->nomor_induk_pegawai,
        'nama_pegawai'=> $request->nama_pegawai,
        'id_departemen'=> $request->id_departemen,
        'email'=> $request->email,
        'telepon'=> $request->telepon,
        'gender'=> $request->gender,
        'status'=> $request->status]);
    
        try {
            //Mengisi variabel yang akan ditampilkan pada view mail
            $content=[ 'body'=>$request->nomor_induk_pegawai,
            ];
            //Mengirim email ke emailtujuan@gmail.com
            
            //Redirect jika berhasil mengirim email
            return redirect()->route('pegawai.index')->with(['success'
                => 'Data Berhasil Diubah, email telah terkirim!']);
        }
    
        catch(Exception $e) {
            //Redirect jika gagal mengirim email
            return redirect()->route('pegawai.index')->with(['success'
                => 'Data Berhasil Diubah, namun gagal mengirim email!']);
        }
    }
}
