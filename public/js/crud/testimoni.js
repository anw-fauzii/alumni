$(function () {
 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  
    
//Tabel karyawan
    var tableTestimoni = $('.table-testimoni').DataTable({
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
            {data: 'nama', name: 'nama'},
            {data: 'testimoni', name: 'testimoni'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    var tableKritik = $('.table-kritik').DataTable({
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
            {data: 'nama', name: 'nama'},
            {data: 'kritik', name: 'kritik'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    var tableSaran = $('.table-saran').DataTable({
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
            {data: 'nama', name: 'nama'},
            {data: 'saran', name: 'saran'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('#import').click(function () {
        $('#saveBtn').val("create-karyawan");
        $('#formImport').trigger("reset");
        $('#modalImport').modal('show');
        $('#modalImport').appendTo('body');
    });

//DELETE Karyawan
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
                    type: "DELETE",
                    url: "/karyawan"+'/'+id,
                    success: function (data) {
                        table.draw();
                        Swal.fire("Sukes!", "Karyawan Berhasil Dihapus!", "success");
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
        })
    });
});