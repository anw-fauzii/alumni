@extends('layouts.app')

@section('title')
    <title>Dokumen Pelengkap</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-photo icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Dokumen Pelengkap
                    <div class="page-title-subheading">Formulir ini memuat daftar dokumen pelengkap untuk proses PPDB
                    </div>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title text-center mb-4">KTP Bunda</h5>
                <div class="col-md-12 mb-2 text-center">
                    <img id="preview-ktp_ibu" src="{{asset('storage/preview.png')}}"
                        alt="preview image" style="max-height: 150px;">
                </div>
                <div class="position-relative row form-group">
                        <div class="col-sm-8"><input name="ktp_ibu" id="ktp_ibu" type="file" class="form-control-file">
                            </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>  
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
     
$(document).ready(function (e) {
   
   $('#ktp_ayah').change(function(){       
    let reader = new FileReader();
    reader.onload = (e) => { 
        $('#preview-ktp_ayah').attr('src', e.target.result); 
    }
        reader.readAsDataURL(this.files[0]);  
   });
   $('#ktp_ibu').change(function(){       
    let reader = new FileReader();
    reader.onload = (e) => { 
        $('#preview-ktp_ibu').attr('src', e.target.result); 
    }
        reader.readAsDataURL(this.files[0]);  
   });
   $('#kk').change(function(){       
    let reader = new FileReader();
    reader.onload = (e) => { 
        $('#preview-kk').attr('src', e.target.result); 
    }
        reader.readAsDataURL(this.files[0]);  
   });
   $('#akta').change(function(){       
    let reader = new FileReader();
    reader.onload = (e) => { 
        $('#preview-akta').attr('src', e.target.result); 
    }
        reader.readAsDataURL(this.files[0]);  
   });
   $('#pas_foto').change(function(){       
    let reader = new FileReader();
    reader.onload = (e) => { 
        $('#preview-pas_foto').attr('src', e.target.result); 
    }
        reader.readAsDataURL(this.files[0]);  
   });
   $('#pembayaran').change(function(){       
    let reader = new FileReader();
    reader.onload = (e) => { 
        $('#preview-pembayaran').attr('src', e.target.result); 
    }
        reader.readAsDataURL(this.files[0]);  
   });
});
 
</script>
@endsection