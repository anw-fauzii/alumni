@extends('layouts.app')

@section('title')
    <title>Perbarui Alumni</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Perbarui Alumni
                    <div class="page-title-subheading">
                        Halaman Untuk Memperbarui Data Alumni
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
                        Perbarui Alumni
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <form action="{{ route('siswa.update', $data->id) }}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                          <input type="hidden" name="id" value="{{$data->id}}">
                                          <input type="hidden" name="user_id" value="{{$data->user_id}}">
                                          <h5 class="card-title text-center mb-4">Foto Alumni</h5>
                                            <div class="col-md-12 mb-2 text-center">
                                                @if($data->user->foto)
                                                <img id="preview-image-before-upload" src="{{asset('storage/'. $data->user->foto)}}"
                                                    alt="preview image" style="max-height: 150px;">
                                                @else
                                                <img id="preview-image-before-upload" src="{{asset('storage/preview.png')}}"
                                                    alt="preview image" style="max-height: 150px;">
                                                @endif
                                            </div>
                                            <div class="position-relative row form-group">
                                                    <div class="col-sm-8"><input name="foto" id="foto" type="file" class="form-control-file">
                                                        </div>
                                                </div>
                                                <h5 class="card-title text-center mb-4">Informasi Dasar</h5>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="name">Nama</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Nama Siswa" type="text" name="name" value="{{$data->user->name}}" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">NIS</label>
                                                <div class="col-sm-9"><input placeholder="Masukan NIS" type="text" name="email"value="{{$data->user->email}}" class="form-control">
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title text-center mb-4">Biodata Alumni</h5>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Tempat Lahir</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Tempat Lahir" type="text" name="tempat" value="{{$data->tempat}}" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Tanggal Lahir</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Tanggal Lahir" type="date" name="tgl_lahir" value="{{ date('Y-m-d', strtotime($data->tanggal)) }}" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">JK</label>
                                                <div class="col-sm-9">
                                                    <div>
                                                        <div class="custom-radio custom-control custom-control-inline jk"><input type="radio" {{ $data->jk == "L" ? 'checked' : '' }} id="Laki-Laki" value="L" name="jk" id="jk" class="custom-control-input"><label class="custom-control-label"
                                                            for="Laki-Laki">Laki-Laki</label></div>
                                                        <div class="custom-radio custom-control custom-control-inline jk"><input type="radio" {{ $data->jk == "P" ? 'checked' : '' }} id="Perempuan" Value="P" name="jk" id="jk" class="custom-control-input"><label class="custom-control-label"
                                                            for="Perempuan">Perempuan</label></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="tahun_Id">Jurusan</label>
                                                <div class="col-sm-9">
                                                    <select name="tahun_id" id="tahun_id" class="form-control">
                                                        <option disable="true" selected="true" disabled>--- Pilih Angkatan ---</option>
                                                        @foreach ($tahun as $row)
                                                            <option value="{{ $row->id }}" {{ $row->id == $data->tahun_id ? 'selected':'' }}>{{ ucfirst($row->tahun) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Alamat</label>
                                                <div class="col-sm-9"><input placeholder="Masukan No Telepon" type="number" name="telp" value="{{$data->telp}}" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Sekolah Lanjutan</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Sekolah Lanjutan" type="text" name="sekolah" value="{{$data->sekolah}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="pe-7s-paper-plane"></i> Simpan
                                                </button>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript"> 
    $(document).ready(function (e) {
        $('#foto').change(function(){        
            let reader = new FileReader();
            reader.onload = (e) => { 
            $('#preview-image-before-upload').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
        });
    });
</script>
@endsection