@extends('layouts.app')

@section('title')
    <title>Detail Alumni</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-user icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Detail Alumni
                    <div class="page-title-subheading">
                        Merupakan rincian data alumni                            
                    </div>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                    <a class="btn btn-success" href="{{route('siswa.edit', Crypt::encrypt($data->id))}}"><i class="metismenu-icon pe-7s-note"></i> Perbarui Profil</a>&nbsp;
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-md-3 mb-3 text-center">
                                @if($data->user->foto)
                                <img width="80%" src="{{asset('storage/'. $data->user->foto)}}" alt="First slide"><br>
                                @else
                                <img width="80%" src="{{asset('storage/user.png')}}" alt=""><br>
                                @endif
                                <strong>{{ $data->user->name }}</strong><br>
                                <td>NIS : {{ $data->user->email }}</td>
                            </div>
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table table-striped" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="20%">TTL</td>
                                                <td width="5%">:</td>
                                                <td width="75%" colspan="4">{{ $data->tempat }}, {{ date('d/m/Y', strtotime($data->tgl_lahir)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>JK</td>
                                                <td>:</td>
                                                <td colspan="4">{{ $data->jk }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td colspan="4">{{ $data->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <td>Telp</td>
                                                <td>:</td>
                                                <td colspan="4">{{ $data->telp }}</td>
                                            </tr>
                                            <tr>
                                                <td>Angkatan</td>
                                                <td>:</td>
                                                <td colspan="4">{{ $data->tahun->tahun }}</td>
                                            </tr>
                                            <tr>
                                                <td>Sekolah</td>
                                                <td>:</td>
                                                <td colspan="4">{{ $data->sekolah }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div>
@endsection