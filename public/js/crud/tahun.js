$(function () {
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  
//Tabel tahun
    var table = $('.table-tahun').DataTable({
        destroy: true,
        "lengthMenu": [
            [ 25, 50, 100, 1000, -1 ],
            [ '25', '50', '100', '1000', 'All' ]
        ],
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        retrieve: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id', name: 'id'},
            {data: 'tahun', name: 'tahun'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

//CREATE tahun
    $('#create').click(function () {
        $('#saveBtn').val("create-tahun");
        $('#id').val('');
        $('#formCreate').trigger("reset");
        $('#modelHeading').html("Tambah Angkatan");
        $('#modalCreate').modal('show');
        $('#modalCreate').appendTo('body');
        $('#formCreate').find('.help-block').remove();
        $('#formCreate').find('.col-sm-9').removeClass('.has-error');
    });

//EDIT tahun
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        $.get("/angkatan" +'/' + id +'/edit', function (data) {
            $('#modelHeading').html("Edit tahun");
                $('#saveBtn').val("edit-tahun");
                $('#modalCreate').modal('show');
                $('#modalCreate').appendTo('body');
                $('#formCreate').find('.help-block').remove();
                $('#formCreate').find('.col-sm-9').removeClass('.has-error');
                $('#id').val(data.id);
                $('#angkatan').val(data.tahun);
        })
    });


//SAVE & UPDATE tahun
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $('#formCreate').find('.help-block').remove();
        $('#formCreate').find('.col-sm-9').removeClass('.has-error');
        $(this).html('Menyimpan..');
        $.ajax({
            data: $('#formCreate').serialize(),
            url: "/angkatan",
            type: "POST",
            dataType: 'json',
            success: function (data) {
            console.log(data.error)
                if($.isEmptyObject(data.error)){
                    $('#formCreate').trigger("reset");
                    $('#modalCreate').modal('hide');
                    $('#saveBtn').html('<i class="metismenu-icon pe-7s-paper-plane"></i> Simpan');
                    table.draw();
                    Swal.fire("Sukes!", "Angkatan Berhasil Disimpan!", "success");
                }else{
                    printErrorMsg(data.error);
                }
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Simpan');
            }
        });
    });

//DELETE tahun
    $('body').on('click', '.delete', function (){
        var id = $(this).data("id");
        var result = Swal.fire({
            title: 'Peringatan!', 
            text: 'Apakah anda yakin?', 
            icon: 'warning',
            showCancelButton: true,
        }).then((result) =>{
                if (result.isConfirmed){
                    $.ajax({
                        type: "GET",
                        url: "/hapus-angkatan"+'/'+id,
                    success: function (data) {
                        table.draw();
                        Swal.fire("Sukes!", "Angkatan Berhasil Dihapus!", "success");
                        $('#formCreate').find('.help-block').remove();
                        $('#formCreate').find('.col-sm-9').removeClass('.has-error');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    });
});

function printErrorMsg (msg) {
    $.each( msg, function( key, value ) {
    console.log(key);
      $('#' +key)
      .closest('.col-sm-9')
      .addClass('has-error')
      .append('<span class="help-block text-danger">'+ value +'</span>');
    });
    $('#saveBtn').html('<i class="metismenu-icon pe-7s-paper-plane"></i> Simpan')
}