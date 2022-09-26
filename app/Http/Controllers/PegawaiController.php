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
}
