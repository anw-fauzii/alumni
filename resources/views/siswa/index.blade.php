@extends('layouts.app')

@section('title')
    <title>Data Alumni</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Data Alumni Angkatan {{$angkatan}}
                    <div class="page-title-subheading">Merupakan Rekap Data Alumni Semua Angkatan
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
                        <button class="btn btn-info dropdown" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="metismenu-icon pe-7s-refresh-2"></i> Angkatan
                        </button> &nbsp;
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            @foreach($tahun as $p)
                            <li><a href="{{route('periode', $p->id)}}" class="dropdown-item">{{$p->tahun}}</a></li>
                            @endforeach
                        </ul> 
                        <a class="btn btn-success" href="javascript:void(0)" id="import"><i class="metismenu-icon pe-7s-upload"></i> Import Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-siswa">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>L/P</th>
                                        <th>Sekolah Lanjutan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div> 
@include('siswa.import')
<script src="{{asset('js/crud/siswa.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
@endsection