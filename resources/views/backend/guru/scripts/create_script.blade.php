<script>
    $(document).ready(function(){
        /*var editor_config = {
            path_absolute : "/",
            selector: "textarea",
            plugins: [
              "advlist autolink lists link image charmap print preview hr anchor pagebreak",
              "searchreplace wordcount visualblocks visualchars code fullscreen",
              "insertdatetime media nonbreaking save table contextmenu directionality",
              "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
              var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
              var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

              var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
              if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
              } else {
                cmsURL = cmsURL + "&type=Files";
              }

              tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
              });
            }
        };
        // tinymce.EditorManager.editors = []; 
        
        
        tinymce.remove();
        
        var content = $('#input').val()
        $('#input').val(content);
        setTimeout(function(){
            tinymce.init(editor_config);
            
        },3);



        //image upload
        getFormImage();


        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);;
        });

        $(document).on('fileselect','.btn-file :file', function(event, label) {            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        
        });

        function getFormImage(){
            var base_url = {!! json_encode(url('/')) !!};
            $.get( base_url +'/article/form_image/1', function( data ) {
              $('#form-image').html(data);
            });
        }

        function readURL(input) {
            var i = $(input).parent().parent().parent().parent().parent().attr('data-id');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload-'+i).attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).on('change','#imgInp',function(){
            
            readURL(this);
        });     
        


            var base_url = {!! json_encode(url('/')) !!};
        $(document).on('click','.add-img',function(){
            var length = $("#form-image > .form-group").length;
            var length2 = $('#form-image .form-group:last-child').attr('data-id');
            var length3 = parseInt(length2) + 1;
            $.get(base_url+'/article/form_image/'+parseInt(length3),function( data ){
                $('[data-id="'+length2+'"]').after(data);
            });
        });

        $(document).on('click','.remove-img',function(){
            $(this).parent().parent().remove();
        })*/

        
       
    });


    $(document).on('click', '#save_guru', function(event){
        //mencegah multiple post -->
        var me = $(this);
        event.preventDefault();
        if ( me.data('requestRunning') ) {
            return;
        }
        me.data('requestRunning', true);
        // <---
        // tinyMCE.triggerSave(); //TinyMCE will now save the data into textarea
        var dataForm = $("#guru-create-form").serializeArray();
        var base_url = {!! json_encode(url('/')) !!};
        $.ajax({
            url: base_url +'/guru/store',
            type: "GET",
            data: dataForm,
            async:true,
            processData: true,
            dataType: 'JSON',
            success:function(data) {
                if(data.success == true){
                    $('.content').html(data.html);
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
    });


    $(document).on('click', '#edit_guru', function(event){
        // alert('tes');
        //mencegah multiple post -->
        var me = $(this);
        event.preventDefault();
        if ( me.data('requestRunning') ) {
            return;
        }
        me.data('requestRunning', true);
        // <---
        // tinyMCE.triggerSave(); //TinyMCE will now save the data into textarea
        var dataForm = $("#guru-create-form").serializeArray();
        var id = $('#id').val();
        var base_url = {!! json_encode(url('/')) !!};
        $.ajax({
            url: base_url +'/guru/update/'+id,
            type: "GET",
            data: dataForm,
            async:true,
            processData: true,
            dataType: 'JSON',
            success:function(data) {
                if(data.success == true){
                    $('.content').html(data.html);
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
    });

    $(document).on('change','#category',function(){
        var category = $(this).val();
        if(category == 'cd-icon-picture.svg'){
            $('#form-content').css('display','none');
            $('#form-image').css('display','');
        }else{
            $('#form-content').css('display','');
            $('#form-image').css('display','none');
        }
        
    })






</script>