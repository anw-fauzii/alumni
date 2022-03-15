<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Testimoni;
use App\Models\Siswa;
use App\Models\Tahun;

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
        if(Auth::user()->hasRole('admin')){
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
            return view('dashboard.admin', compact('bulan','laki','perempuan'));
        }else if(Auth::user()->hasRole('user')){
            return view('dashboard.user');
        }
    }

    public function welcome()
    {
        $laki = Siswa::where('jk', 'L')->count();
        $perempuan = Siswa::where('jk', 'P')->count();
        $angkatan = Tahun::all();
        $siswa = Siswa::all();
        $testimoni = Testimoni::where('testimoni','!=', NULL)->where('saran','!=', NULL)->where('kritik','!=', NULL)->get();
        return view('welcome', compact('testimoni','laki','perempuan','angkatan','siswa'));
    }
}
