<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Validator;

class TestimoniController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','revalidate']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if(Auth::user()->hasRole('admin')){
            if ($request->ajax()) {
                $data = Testimoni::where('testimoni','!=', NULL)->where('saran','!=', NULL)->where('kritik','!=', NULL)->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn ='<a href="#" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit"><i class="metismenu-icon pe-7s-pen"></i></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="metismenu-icon pe-7s-trash"></i></a>';
                        return $btn;
                    })
                    ->addColumn('nama', function($data){
                        return $data->user->name;
                    })
                    ->addColumn('testimoni', function($data){
                        return strip_tags($data->testimoni);
                    })
                    ->addColumn('kritik', function($data){
                        return strip_tags($data->kritik);
                    })
                    ->addColumn('saran', function($data){
                        return strip_tags($data->saran);
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
            return view('testimoni.index');
        }else if(Auth::user()->hasRole('user')){
            $testimoni = Testimoni::where('user_id', Auth::user()->id)->firstOrFail();
            return view('testimoni.edit', compact('testimoni'));
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
        if(Auth::user()->hasRole('user')){
            $testimoni = Testimoni::where('user_id', Auth::user()->id)->firstOrFail();
            //Testimoni
            if($request->testimoni){
                $testimoni->testimoni = $request->testimoni;
            }else{
                $testimoni->testimoni = "-";
            }
            //Kritik
            if($request->kritik){   
                $testimoni->kritik = $request->kritik;
            }else{
                $testimoni->kritik = "-";
            }
            //Saran
            if($request->saran){
                $testimoni->saran = $request->saran;
            }else{
                $testimoni->saran = "-";
            }
            $testimoni->save();
            return redirect()->back()->with('sukses','Berhasil Disimpan');  
        }else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function show(Testimoni $testimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimoni $testimoni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {
        //
    }
}
