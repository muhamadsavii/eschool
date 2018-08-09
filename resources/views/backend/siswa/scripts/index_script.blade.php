<script>
$( document ).ready(function(e) {

    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route("datatables-data") !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'nama', name: 'nama' },
                { data: 'alamat', name: 'alamat' },
                { data: 'kelas', name: 'kelas' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    }),

    $(document).on('click', '#create_siswa', function(){
        var base_url = {!! json_encode(url('/')) !!};
        $.ajax({
            url: base_url +'/siswa/create',
            type: "GET",
            async:true,
            processData: true,
            complete:function() {
            },
            success: function (data) {
                $('.content').html(data);
            },
            error: function(response) {
            }
        });
    })

    $(document).on('click', '.delete-siswa', function(e){
        //mencegah multiple post -->
        var me = $(this);
        e.preventDefault();
        if ( me.data('requestRunning') ) {
            return;
        }
        me.data('requestRunning', true);
        // <---
        var base_url = {!! json_encode(url('/')) !!}
        var id = $(this).data('id');
        var token = $("input[name=_token]").val();
        $.ajax({
            url: base_url + '/siswa/delete/'+id,
            type: "DELETE",
            data: {"_token":"{{ csrf_token() }}"},
            async:true,
            proccessData: true,
            
            success:function(data) {
                if(data.success == true){
                    $('.content').html(data.html);
                    return false;
                }else{
                    alert('Proses teu sukses bray!!');
                }
            },
            complete: function() {
               me.data('requestRunning', false);
            },
            error: function(response) {
                alert('Aya nu salah bray!!');
            }
        });

    })


    $(document).on('click', '.edit-siswa', function(e){
        //mencegah multiple post -->
        var me = $(this);
        e.preventDefault();
        if ( me.data('requestRunning') ) {
            return;
        }
        me.data('requestRunning', true);
        // <---
        var base_url = {!! json_encode(url('/')) !!}
        var id = $(this).data('id');
        
        $.ajax({
            url: base_url + '/siswa/edit/'+id,
            type: "GET" ,
            async:true,
            proccessData: true,
            
            success:function(data) {

                if(data.success == true){
                    
                    $('.content').html(data.html);
                    $('#nama').val(data.data.nama);
                    $('#id').val(data.data.id);
                    $('#alamat').val(data.data.alamat);
                    $('#kelas').val(data.data.kelas);
                    

                    $('#save_siswa').attr('id','edit_siswa')
                    // return false;
                }else{
                    alert('Proses teu sukses bray!!');
                }
            },
            complete: function() {
               me.data('requestRunning', false);
            },
            error: function(response) { 
                alert('Aya nu salah bray!!');
            }
        });

    })





})  



</script>