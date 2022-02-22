@extends('layouts.app')

@section('title')
    <title>Formulir</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-note2 icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Folmulir Pendaftaran
                    <div class="page-title-subheading">Formulir ini memuat daftar isian mengenai data calon siswa sebagai persyaratan yang diperlukan untuk proses PPDB
                    </div>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-body">
                    <div class="tab-content">
                        <form action="{{route('formulir.update', Auth::user()->id)}}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            @method('PUT')
                            <h5 class="card-title text-center mb-4">Jenjang Pendidikan</h5>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="tingkat">Tingkat Sekolah</label>
                                        <select name="tingkat" class="form-control @error('tingkat') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Tigkat Sekolah ---</option>
                                            <option value="PG">PG</option>
                                            <option value="TK A">TK A</option>
                                            <option value="TK B">TK B</option>
                                            <option value="SD (EKSTERNAL)">SD (EKSTERNAL)</option>
                                            <option value="SD (INTERNAL TKPI)">SD (INTERNAL TKPI)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title text-center mb-4">Biodata Peserta Didik</h5>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="nama">Nama Lengkap*</label>
                                        <input name="nama" id="nama" value="{{$siswa->nama}}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="nik">NIK*</label>
                                        <input name="nik" id="nik" value="" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="asal_sekolah">Asal Sekolah</label>
                                        <input name="asal_sekolah" id="asal_sekolah" placeholder="Masukan Asal Sekolah" type="text" class="form-control @if($errors->has('asal_sekolah')) is-invalid @endif">
                                            @if($errors->has('asal_sekolah'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('asal_sekolah') }} </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="jk">Jenis Kelamin*</label>
                                        <select name="jk" class="form-control @error('jk') is-invalid @enderror" required>
                                            <option disable="true" selected="true" disabled value="">--- Pilih Jenis Kelamin ---</option>
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="tempat">Tempat Lahir*</label>
                                        <input name="tempat" id="tempat" required placeholder="Masukan Tempat Lahir" type="text" class="form-control @if($errors->has('tempat')) is-invalid @endif">
                                            @if($errors->has('tempat'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('tempat') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="tanggal">Tanggal Lahir*</label>
                                        <input name="tanggal" id="tanggal" required placeholder="Masukan Tanggal Lahir" type="date" class="form-control @if($errors->has('tanggal')) is-invalid @endif">
                                            @if($errors->has('tanggal'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('tanggal') }} </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="agama">Agama*</label>
                                        <select name="agama" required class="form-control @error('agama') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Agama ---</option>
                                            <option value="ISLAM">ISLAM</option>
                                            <option value="KRISTEN">KRISTEN</option>
                                            <option value="KATOLIK">KATOLIK</option>
                                            <option value="HINDU">HINDU</option>
                                            <option value="BUDHA">BUDHA</option>
                                            <option value="KONGHUCHU">KONGHUCHU</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="kebutuhan">Berkebutuhan Khusus*</label>
                                        <select name="kebutuhan" required class="form-control @error('kebutuhan') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Jenis ---</option>
                                            <option value="Tidak">Tidak</option>
                                            <option value="Netra (A)">Netra (A)</option>
                                            <option value="Rungu (B)">Rungu (B)</option>
                                            <option value="Grahita Ringan (C)">Grahita Ringan (C)</option>
                                            <option value="Grahita Sedang (C1)">Grahita Sedang (C1)</option>
                                            <option value="Daksa Ringan (D)">Daksa Ringan (D)</option>
                                            <option value="Daksa Sedang (D1)">Daksa Sedang (D1)</option>
                                            <option value="Laras (E)">Laras (E)</option>
                                            <option value="Wicara (F)">Wicara (F)</option>
                                            <option value="Tuna Ganda (G)">Tuna Ganda (G)</option>
                                            <option value="Hiper Aktif (H)">Hiper Aktif (H)</option>
                                            <option value="Cerdas Istimewa (J)">Cerdas Istimewa (J)</option>
                                            <option value="Bakat Istimewa (J)">Bakat Istimewa (J)</option>
                                            <option value="Kesulitan Belajar (K)">Kesulitan Belajar (K)</option>
                                            <option value="Narkoba (N)">Narkoba (N)</option>
                                            <option value="Indigo (O)">Indigo (O)</option>
                                            <option value="Down Sindrom (P)">Down Sindrom (P)</option>
                                            <option value="Autis (Q)">Autis (Q)</option>
                                            <option value="Terpencil / Terbelakang (Bencana Alam / Sosial)">Terpencil / Terbelakang (Bencana Alam / Sosial)</option>
                                            <option value="Tidak Mampu Ekonomi">Tidak Mampu Ekonomi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group">
                                        <label for="alamat">Alamat Tempat Tinggal*</label>
                                        <input name="alamat" id="alamat" required placeholder="Masukan Tempat Lahir" type="text" class="form-control @if($errors->has('alamat')) is-invalid @endif">
                                            @if($errors->has('alamat'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('alamat') }} </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="rt">RT*</label>
                                        <input name="rt" id="rt" placeholder="Masukan RT" required type="number" class="form-control @if($errors->has('rt')) is-invalid @endif">
                                            @if($errors->has('rt'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('rt') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="rw">RW*</label>
                                        <input name="rw" id="rw" placeholder="Masukan RW" required type="number" class="form-control @if($errors->has('rw')) is-invalid @endif">
                                            @if($errors->has('rw'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('rw') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="dusun">Dusun*</label>
                                        <input name="dusun" id="dusun" placeholder="Masukan Nama Dusun" required type="text" class="form-control @if($errors->has('dusun')) is-invalid @endif">
                                            @if($errors->has('dusun'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('dusun') }} </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="desa">Kelurahan/Desa*</label>
                                        <input name="desa" id="desa" placeholder="Masukan Kelurahan/Desa" required type="text" class="form-control @if($errors->has('desa')) is-invalid @endif">
                                            @if($errors->has('desa'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('desa') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="kecamatan">Kecamatan*</label>
                                        <input name="kecamatan" id="Kecamatan" placeholder="Masukan Kecamatan" required type="text" class="form-control @if($errors->has('kecamatan')) is-invalid @endif">
                                            @if($errors->has('kecamatan'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('kecamatan') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="kodpos">Kode Pos*</label>
                                        <input name="kodpos" id="kodpos" placeholder="Masukan Nama Kode Pos" required type="number" class="form-control @if($errors->has('kodpos')) is-invalid @endif">
                                            @if($errors->has('kodpos'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('kodpos') }} </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="jenis_tinggal">Jenis Tinggal*</label>
                                        <select name="jenis_tinggal" required class="form-control @error('jenis_tinggal') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Jenis Tinggal ---</option>
                                            <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                                            <option value="Wali">Wali</option>
                                            <option value="Kos">Kos</option>
                                            <option value="Asrama">Asrama</option>
                                            <option value="Panti Asuhan">Panti Asuhan</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="transportasi">Alat Transportasi*</label>
                                        <select name="transportasi" required class="form-control @error('transportasi') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Jenis ---</option>
                                            <option value="Jalan Kaki">Jalan Kaki</option>
                                            <option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
                                            <option value="Kendaraan Umum">Kendaraan Umum</option>
                                            <option value="Jemputan Sekolah">Jemputan Sekolah</option>
                                            <option value="Kereta Api">Kereta Api</option>
                                            <option value="Perahu">Perahu</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="pks">Menerima PKS*</label>
                                        <select name="pks" required class="form-control @error('pks') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Jenis ---</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="telepon">No Telepon / Whatsapp*</label>
                                        <input name="telepon" id="telepon" placeholder="Masukan Telepon / Whatsapp" required type="number" class="form-control @if($errors->has('telepon')) is-invalid @endif">
                                            @if($errors->has('telepon'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('telepon') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="email">E-mail</label>
                                        <input name="email" id="email" placeholder="Masukan E-mail" type="text" class="form-control @if($errors->has('email')) is-invalid @endif">
                                            @if($errors->has('email'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('email') }} </small>
                                            @endif
                                    </div>
                                </div><div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="kewarganegaraan">Kewarganegaraan*</label>
                                        <select name="kewarganegaraan" required class="form-control @error('kewarganegaraan') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Jenis ---</option>
                                            <option value="WNI">WNI</option>
                                            <option value="WNA">WNA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title text-center mb-4">Identitas Orang Tua / Wali</h5>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="ayah"><strong>Nama Ayah*</strong></label>
                                        <input name="ayah" id="ayah" required placeholder="Masukan Nama Ayah" type="text" class="form-control @if($errors->has('ayah')) is-invalid @endif">
                                            @if($errors->has('ayah'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('ayah') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="tahun_ayah">Tahun Lahir Ayah</label>
                                        <input name="tahun_ayah" id="tahun_ayah" required placeholder="Masukan Tahun Lahir Ayah" type="number" class="form-control @if($errors->has('tahun_ayah')) is-invalid @endif">
                                            @if($errors->has('tahun_ayah'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('tahun_ayah') }} </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="pendidikan_ayah">Pendidikan Terakhir Ayah*</label>
                                        <select name="pendidikan_ayah" required class="form-control @error('pendidikan_ayah') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Jenis ---</option>
                                            <option value="SD">SD</option>
                                            <option value="SLTP">SLTP</option>
                                            <option value="D1">D1</option>
                                            <option value="SLTA">SLTA</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                            <option value="-">-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="pekerjaan_ayah">Pekerjaan Ayah*</label>
                                        <select name="pekerjaan_ayah" required class="form-control @error('pekerjaan_ayah') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Pekerjaan ---</option>
                                            <option value="PNS">PNS</option>
                                            <option value="Pegawai BUMN">Pegawai BUMN</option>
                                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                                            <option value="Guru">Guru</option>
                                            <option value="Dosen">Dosen</option>
                                            <option value="TNI">TNI</option>
                                            <option value="Polri">Polri</option>
                                            <option value="Dokter">Dokter</option>
                                            <option value="Bidan">Bidan</option>
                                            <option value="Perawat">Perawat</option>
                                            <option value="Wiraswasta/Pengusaha">Wiraswasta/Pengusaha</option>
                                            <option value="Buruh">Buruh</option>
                                            <option value="Sopir">Sopir</option>
                                            <option value="Ibu Rumah Tangga (IRT)">Ibu Rumah Tangga (IRT)</option>
                                            <option value="Honorer">Honorer</option>
                                            <option value="Tidak Bekerja">Tidak Bekerja</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="penghasilan_ayah">Penghasilan Ayah</label>
                                        <select name="penghasilan_ayah" required class="form-control @error('penghasilan_ayah') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Penghasilan ---</option>
                                            <option value="Kurang Dari Rp. 1.000.000">Kurang Dari Rp. 1.000.000</option>
                                            <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                            <option value="Lebih Rp. 3.000.000">Lebih Rp. 3.000.000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="ibu"><strong>Nama Ibu*</strong></label>
                                        <input name="ibu" id="ibu" required placeholder="Masukan Nama ibu" type="text" class="form-control @if($errors->has('ibu')) is-invalid @endif">
                                            @if($errors->has('ibu'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('ibu') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="tahun_ibu">Tahun Lahir Ibu</label>
                                        <input name="tahun_ibu" id="tahun_ibu" required placeholder="Masukan Tahun Lahir Ibu" type="number" class="form-control @if($errors->has('tahun_ibu')) is-invalid @endif">
                                            @if($errors->has('tahun_ibu'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('tahun_ibu') }} </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="pendidikan_ibu">Pendidikan Terakhir Ibu*</label>
                                        <select name="pendidikan_ibu" required class="form-control @error('pendidikan_ibu') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Jenis ---</option>
                                            <option value="SD">SD</option>
                                            <option value="SLTP">SLTP</option>
                                            <option value="D1">D1</option>
                                            <option value="SLTA">SLTA</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                            <option value="-">-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="pekerjaan_ibu">Pekerjaan Ibu*</label>
                                        <select name="pekerjaan_ibu" required class="form-control @error('pekerjaan_ibu') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Pekerjaan ---</option>
                                            <option value="PNS">PNS</option>
                                            <option value="Pegawai BUMN">Pegawai BUMN</option>
                                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                                            <option value="Guru">Guru</option>
                                            <option value="Dosen">Dosen</option>
                                            <option value="TNI">TNI</option>
                                            <option value="Polri">Polri</option>
                                            <option value="Dokter">Dokter</option>
                                            <option value="Bidan">Bidan</option>
                                            <option value="Perawat">Perawat</option>
                                            <option value="Wiraswasta/Pengusaha">Wiraswasta/Pengusaha</option>
                                            <option value="Buruh">Buruh</option>
                                            <option value="Sopir">Sopir</option>
                                            <option value="Ibu Rumah Tangga (IRT)">Ibu Rumah Tangga (IRT)</option>
                                            <option value="Honorer">Honorer</option>
                                            <option value="Tidak Bekerja">Tidak Bekerja</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="penghasilan_ibu">Penghasilan Ibu</label>
                                        <select name="penghasilan_ibu" required class="form-control @error('penghasilan_ibu') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Penghasilan ---</option>
                                            <option value="Kurang Dari Rp. 1.000.000">Kurang Dari Rp. 1.000.000</option>
                                            <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                            <option value="Lebih Rp. 3.000.000">Lebih Rp. 3.000.000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="wali"><strong>Nama wali</strong></label>
                                        <input name="wali" id="wali" placeholder="Masukan Nama Wali" type="text" class="form-control @if($errors->has('wali')) is-invalid @endif">
                                            @if($errors->has('wali'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('wali') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="tahun_wali">Tahun Lahir Wali</label>
                                        <input name="tahun_wali" id="tahun_wali" placeholder="Masukan Tahun Lahir Wali" type="number" class="form-control @if($errors->has('tahun_wali')) is-invalid @endif">
                                            @if($errors->has('tahun_wali'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('tahun_wali') }} </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="pendidikan_wali">Pendidikan Terakhir Wali*</label>
                                        <select name="pendidikan_wali" class="form-control @error('pendidikan_wali') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Jenis ---</option>
                                            <option value="SD">SD</option>
                                            <option value="SLTP">SLTP</option>
                                            <option value="D1">D1</option>
                                            <option value="SLTA">SLTA</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                            <option value="-">-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="pekerjaaan_wali">Pekerjaan Wali*</label>
                                        <select name="pekerjaaan_wali" class="form-control @error('pekerjaaan_wali') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Pekerjaan ---</option>
                                            <option value="PNS">PNS</option>
                                            <option value="Pegawai BUMN">Pegawai BUMN</option>
                                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                                            <option value="Guru">Guru</option>
                                            <option value="Dosen">Dosen</option>
                                            <option value="TNI">TNI</option>
                                            <option value="Polri">Polri</option>
                                            <option value="Dokter">Dokter</option>
                                            <option value="Bidan">Bidan</option>
                                            <option value="Perawat">Perawat</option>
                                            <option value="Wiraswasta/Pengusaha">Wiraswasta/Pengusaha</option>
                                            <option value="Buruh">Buruh</option>
                                            <option value="Sopir">Sopir</option>
                                            <option value="Ibu Rumah Tangga (IRT)">Ibu Rumah Tangga (IRT)</option>
                                            <option value="Honorer">Honorer</option>
                                            <option value="Tidak Bekerja">Tidak Bekerja</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="penghasilan_wali">Penghasilan Wali</label>
                                        <select name="penghasilan_wali" class="form-control @error('penghasilan_wali') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Penghasilan ---</option>
                                            <option value="Kurang Dari Rp. 1.000.000">Kurang Dari Rp. 1.000.000</option>
                                            <option value="Rp. 1.000.000 - Rp. 2.000.000">Rp. 1.000.000 - Rp. 2.000.000</option>
                                            <option value="Lebih Rp. 3.000.000">Lebih Rp. 3.000.000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title text-center mb-4">Data Rincian Calon Siswa</h5>
                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="tinggi">Tinggi Badan</label>
                                        <div class="input-group">
                                            <input name="tinggi" id="tinggi" placeholder="Masukan Tinggi Badan" type="number" class="form-control @if($errors->has('tinggi')) is-invalid @endif">
                                                @if($errors->has('tinggi'))
                                                    <small class="form-text text-muted error-msg"> {{ $errors->first('tinggi') }} </small>
                                                @endif
                                            <div class="input-group-append">
                                                <span class="input-group-text">CM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="berat">Berat Badan</label>
                                        <div class="input-group">
                                            <input name="berat" id="berat" placeholder="Masukan Berat Badan" type="number" class="form-control @if($errors->has('berat')) is-invalid @endif">
                                                @if($errors->has('berat'))
                                                    <small class="form-text text-muted error-msg"> {{ $errors->first('berat') }} </small>
                                                @endif
                                            <div class="input-group-append">
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="jarak">Jarak Tempuh</label>
                                        <div class="input-group">
                                            <input name="jarak" id="jarak" placeholder="Masukan Jarak Tempuh" type="number" class="form-control @if($errors->has('jarak')) is-invalid @endif">
                                                @if($errors->has('jarak'))
                                                    <small class="form-text text-muted error-msg"> {{ $errors->first('jarak') }} </small>
                                                @endif
                                            <div class="input-group-append">
                                                <span class="input-group-text">KM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="waktu">Waktu Tempuh</label>
                                        <div class="input-group">
                                            <input name="waktu" id="waktu" placeholder="Masukan Waktu Tempuh" type="number" class="form-control @if($errors->has('waktu')) is-invalid @endif">
                                                @if($errors->has('waktu'))
                                                    <small class="form-text text-muted error-msg"> {{ $errors->first('waktu') }} </small>
                                                @endif
                                            <div class="input-group-append">
                                                <span class="input-group-text">Menit</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="hobi">Hobi*</label>
                                        <input name="hobi" id="hobi" placeholder="Masukan Hobi" type="text" class="form-control @if($errors->has('hobi')) is-invalid @endif">
                                            @if($errors->has('hobi'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('hobi') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="cita2">Cita - Cita</label>
                                        <input name="cita2" id="cita2" placeholder="Masukan Cita - Cita" type="text" class="form-control @if($errors->has('cita2')) is-invalid @endif">
                                            @if($errors->has('cita2'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('cita2') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="saudara">Jumlah Saudara Kandung</label>
                                        <input name="saudara" id="saudara" placeholder="Masukan Jumlah Saudara Kandung" type="number" class="form-control @if($errors->has('saudara')) is-invalid @endif">
                                            @if($errors->has('saudara'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('saudara') }} </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title text-center mb-4">Riwayat Prestasi</h5>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="jenis_pres">Jenis Prestasi</label>
                                        <select name="jenis_pres" required class="form-control @error('jenis_pres') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Prestasi ---</option>
                                            <option value="Sain">Sain</option>
                                            <option value="Seni">Seni</option>
                                            <option value="Olahraga">Olahraga</option>
                                            <option value="Lain-Lain">Lain-Lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="tingkat_pres">Tingkat Prestasi</label>
                                        <select name="tingkat_pres" required class="form-control @error('tingkat_pres') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Tingkat Prestasi ---</option>
                                            <option value="Sekolah">Sekolah</option>
                                            <option value="Kecamatan">Kecamatan</option>
                                            <option value="Kabupaten">Kabupaten</option>
                                            <option value="Provinsi">Provinsi</option>
                                            <option value="Nasional">Nasional</option>
                                            <option value="Internasional">Internasional</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="nama_pres">Nama Prestasi</label>
                                        <input name="nama_pres" id="nama_pres" placeholder="Masukan Nama Prestasi" type="text" class="form-control @if($errors->has('nama_pres')) is-invalid @endif">
                                            @if($errors->has('nama_pres'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('nama_pres') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="tahun_pres">Tahun</label>
                                        <input name="tahun_pres" id="tahun_pres" placeholder="Masukan Tahun" type="number" class="form-control @if($errors->has('tahun_pres')) is-invalid @endif">
                                            @if($errors->has('tahun_pres'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('tahun_pres') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="penyelenggara_pres">Penyelenggara</label>
                                        <input name="penyelenggara_pres" id="penyelenggara_pres" placeholder="Masukan Penyelengggara" type="text" class="form-control @if($errors->has('penyelenggara_pres')) is-invalid @endif">
                                            @if($errors->has('penyelenggara_pres'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('penyelenggara_pres') }} </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title text-center mb-4">Riwayat Beasiswa</h5>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="beasiswa">Jenis Beasiswa</label>
                                        <select name="beasiswa" required class="form-control @error('beasiswa') is-invalid @enderror">
                                            <option disable="true" selected="true" disabled>--- Pilih Jenis ---</option>
                                            <option value="Anak Berprestasi">Anak Berprestasi</option>
                                            <option value="Anak Miskin">Anak Miskin</option>
                                            <option value="Pendidikan">Pendidikan</option>
                                            <option value="Unggulan">Unggulan</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="position-relative form-group">
                                        <label for="ket_beasiswa">Keterangan</label>
                                        <input name="ket_beasiswa" id="ket_beasiswa" placeholder="Masukan Keterangan Beasiswa" type="text" class="form-control @if($errors->has('ket_beasiswa')) is-invalid @endif">
                                            @if($errors->has('ket_beasiswa'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('ket_beasiswa') }} </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="beasiswa_mulai">Tahun Mulai</label>
                                        <input name="beasiswa_mulai" id="beasiswa_mulai" placeholder="Masukan Tahun Mulai" type="text" class="form-control @if($errors->has('beasiswa_mulai')) is-invalid @endif">
                                            @if($errors->has('beasiswa_mulai'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('beasiswa_mulai') }} </small>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="beasiswa_akhir">Tahun Selesai</label>
                                        <input name="beasiswa_akhir" id="beasiswa_akhir" placeholder="Masukan Tahun Selesai" type="text" class="form-control @if($errors->has('beasiswa_akhir')) is-invalid @endif">
                                            @if($errors->has('beasiswa_akhir'))
                                                <small class="form-text text-muted error-msg"> {{ $errors->first('beasiswa_akhir') }} </small>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary btn-sm">
                                    <i class="pe-7s-paper-plane"></i> Simpan
                                </button>
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