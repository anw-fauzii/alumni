<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FirstSheetImport;
use Illuminate\Support\Facades\Crypt;
use DataTables;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','revalidate']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $p = Tahun::latest()->first();
        $angkatan = $p->tahun;
        if(Auth::user()->hasRole('admin')){
            $tahun = Tahun::all();
            if ($request->ajax()) {
                $bulan = Tahun::latest()->first();
                $data = Siswa::where('tahun_id', $bulan->id)->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('siswa.show', $row->id).'" data-toggle="tooltip" title="Detail" data-id="'.$row->id.'" data-original-title="Detail" class="btn btn-info btn-sm detail"><i class="metismenu-icon pe-7s-info"></i></a>';
                        $btn = $btn.' <a href="'.route('siswa.edit', $row->id).'" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit"><i class="metismenu-icon pe-7s-pen"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="metismenu-icon pe-7s-trash"></i></a>';
                        return $btn;
                    })
                    ->addColumn('nis', function($data){
                        return $data->user->email;
                    })
                    ->addColumn('nama', function($data){
                        return $data->user->name;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
            return view('siswa.index', compact('tahun','angkatan'));
        }else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    public function Periode(Request $request, $id)
    {
        if(Auth::user()->hasRole('admin')){
            $tahun = Tahun::all();
            $p = Tahun::findOrFail($id);
            $angkatan = $p->tahun;
            if ($request->ajax()) {
                $data = Siswa::where('tahun_id', $id)->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('siswa.show', $row->id).'" data-toggle="tooltip" title="Detail" data-id="'.$row->id.'" data-original-title="Detail" class="btn btn-info btn-sm detail"><i class="metismenu-icon pe-7s-info"></i></a>';
                        $btn = $btn.' <a href="'.route('siswa.edit', $row->id).'" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit"><i class="metismenu-icon pe-7s-pen"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="metismenu-icon pe-7s-trash"></i></a>';
                        return $btn;
                    })
                    ->addColumn('nis', function($data){
                        return $data->user->email;
                    })
                    ->addColumn('nama', function($data){
                        return $data->user->name;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
                return view('siswa.index', compact('tahun','angkatan'));
        }else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    public function import_excel(Request $request)
    {
        if(Auth::user()->hasAnyRole('admin')){
            $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
            ]);
            $file = $request->file('file')->store('File Penerima', 'public');
            $s = Excel::import(new FirstSheetImport, public_path('storage/'.$file));
            return redirect()->back()->with('sukses','Data Berhasil Berhasil Diimport');
        }else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->hasRole('admin')){
            $validator = Validator::make($request->all(), [
                'angkatan' => 'required',
            ], $messages = [
                'required' => 'Kolom Angkatan Wajib Diisi',
            ]);
            if($validator->passes()) {
                $tahun = tahun::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'tahun' => $request->angkatan,
                    ]
                );
                return response()->json($tahun);
            }
            return response()->json(['error'=>$validator->errors()]);
        }else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->hasAnyRole('admin')){
            $data = Siswa::findOrFail($id);
            return view('siswa.show', compact('data'));
        }else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    public function profil()
    {
        if(Auth::user()->hasAnyRole('user')){
            $data = Siswa::where('user_id', Auth::user()->id)->firstOrFail();
            return view('siswa.show', compact('data'));
        }else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->hasAnyRole('admin|user')){
            $decrypted = Crypt::decrypt($id);
            $data = Siswa::findOrFail($decrypted);
            $tahun = Tahun::all();
            return view('siswa.edit', compact('data','tahun'));
        }else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->hasAnyRole('admin|user')){
            $decrypted = Crypt::decrypt($id);
            $user = User::findOrFail($request->get('user_id'));
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            if($request->file('foto')){
                if($user->foto && file_exists(storage_path('app/public/' . $user->foto))){
                    \Storage::delete('public/'.$user->foto);
                    }
                $file = $request->file('foto')->store('Foto', 'public');
                $user->foto = $file;
            }
            $user->save();
            $siswa = Siswa::findOrFail($decrypted);
            $siswa->tempat = $request->get('tempat');
            $siswa->tanggal = $request->get('tgl_lahir');
            $siswa->jk = $request->get('jk');
            $siswa->tahun_id = $request->get('tahun_id');
            $siswa->telp = $request->get('telp');
            $siswa->sekolah = $request->get('sekolah');
            $siswa->save();
            return redirect()->back()->with('sukses','Data Berhasil Berhasil Diupdate');
        }else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tahun  $tahun
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        if(Auth::user()->hasRole('admin')){
            $tahun = Tahun::find($id);
            $tahun->delete();
            return response()->json($tahun);
        }else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }
}