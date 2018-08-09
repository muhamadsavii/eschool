<script type="text/javascript">
  $(document).on('click', '#btn_siswa', function(){
    var base_url = {!! json_encode(url('/')) !!};
    $.ajax({
        url: base_url +'/siswa',
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
  }),

  $(document).on('click', '#btn_home', function(){
    var base_url = {!! json_encode(url('/')) !!};
    // alert(base_url+'/home');
    $.ajax({
        url: base_url +'/home',
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
    
  
</script>