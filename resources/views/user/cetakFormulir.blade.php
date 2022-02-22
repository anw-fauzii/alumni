<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran</title>
</head>
<body>
<img src="{{ public_path('kop.png') }}" width="760px" height="100px" style="margin: -5px -20px 0px -20px;">
    <h4 style="text-align:center;margin: -15px 0px 15px 0px;">FORMULIR PENERIMAAN PESERTA DIDIK BARU TAHUN 2022
</h4>
    <table width="100%">
        <tr>
            <td colspan="3"><strong>A. DATA PENDAFTAR</strong></td>
        </tr> 
        <tr>
            <td width="20%">Nomor Pendaftaran</td>
            <td width="1%">:</td>
            <td width="50%">{{$data->id}}</td>
        </tr> 
        <tr>
            <td>Tanggal Pendaftaran</td>
            <td>:</td>
            <td>{{$data->updated_at}}</td>
        </tr> 
        <tr>
            <td>Tingkat Sekolah</td>
            <td>:</td>
            <td>{{$data->tingkat}}</td>
        </tr>
    </table>
    <div style="margin: 10px 0px 0px 0px;">
        <table width="100%">
            <tr>
                <td colspan="3"><strong>B. BIODATA PESERTA DIDIK</strong></td>
            </tr>  
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{$data->user->asal}}</td>
            </tr>      
            <tr>
                <td width="20%">Nama Lengkap</td>
                <td width="1%">:</td>
                <td width="50%">{{strtoupper($data->nama)}}</td>
            </tr> 
            <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td>{{$data->asal_sekolah}}</td>
            </tr>         
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{$data->jk}}</td>
            </tr>  
            <tr>
                <td>Tempat, Tgl Lahir</td>
                <td>:</td>
                <td>{{$data->tempat}}, {{$data->tanggal}}</td>
            </tr> 
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{$data->agama}}</td>
            </tr> 
            <tr>
                <td>Berkebutuhan Khusus</td>
                <td>:</td>
                <td>{{$data->kebutuhan}}</td>
            </tr>   
        </table>
    </div>

    <br/>
    <br/>
    <div>9172</div>
    <br/>
    <br/>
    <div style="text-align:center;margin-left: 290px;">
    Garut, 8a0sa <br/><br/><br/><br/>
    Wakil Ketua Yayasan <br/>
    Prima Insani
    </div>
</body>
</html>