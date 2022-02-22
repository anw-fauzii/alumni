@extends('layouts.app')

@section('title')
    <title>Testimoni, Kritik & Saran</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-gift icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Testimoni, Kesan & Pesan
                    <div class="page-title-subheading">
                        Merupakan Masukan Dari Para Alumni Untuk Lembaga Yang Sifatnya Membangun.
                    </div>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    Silakan masukan "Testimoni, Kesan & Pesan" anda di bawah ini
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <form action="{{route('testimoni.store')}}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            @method('POST')
                            <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="testimoni">Testimoni</label>
                                    <div class="col-sm-10"><textarea style="resize:none;height:150px;" type="text" class="form-control" id="testimoni" name="testimoni" placeholder="Masukan Testimoni">{{$testimoni->testimoni}}</textarea>
                                </div>
                            </div>
                            <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="kritik">Kesan</label>
                                    <div class="col-sm-10"><textarea style="resize:none;height:150px;" type="text" class="form-control" id="kritik" name="kritik" placeholder="Masukan Kesan">{{$testimoni->kritik}}</textarea>
                                </div>
                            </div>
                            <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="saran">Pesan</label>
                                    <div class="col-sm-10"><textarea style="resize:none;height:150px;" type="text" class="form-control" id="saran" name="saran" placeholder="Masukan Pesan">{{$testimoni->saran}}</textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary btn-sm">
                                    <i class="pe-7s-paper-plane"></i> Perbarui
                                </button>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
@endsection