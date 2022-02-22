<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Siswa;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $angkatan = Siswa::select('tahun_id')->distinct('tahun_id')->get();
            $bulan =[];
            foreach($angkatan as $p){
                $bulan[] = $p->tahun->tahun;
                $laki[] = [
                    Siswa::where('jk', 'L')->where('tahun_id', $p->tahun_id)->count(),
                ];
                $perempuan[] = [
                    Siswa::where('jk', 'P')->where('tahun_id', $p->tahun_id)->count(),
                ];
            }
            return view('user.home', compact('bulan','laki','perempuan'));
    }

    public function welcome()
    {
        $testimoni = Testimoni::where('testimoni','!=', NULL)->where('saran','!=', NULL)->where('kritik','!=', NULL)->get();
        return view('welcome', compact('testimoni'));
    }
}
