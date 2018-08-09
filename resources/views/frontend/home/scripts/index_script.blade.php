<script type="text/javascript">
	$( document ).ready(function(e) {
		
		$(document).on('click', '.cd-read-more', function(){
			var id = $(this).attr('data-id');
			var base_url = {!! json_encode(url('/')) !!};
			if($('#categori').val() == 'cd-icon-picture.svg'){
				var url = base_url +'/content_article_image/'+ id;
			}else{
				var url = base_url +'/content_article/'+ id;
			}

			$.ajax({
			    url: url,
			    type: "GET",
			    async:true,
			    processData: true,
			    complete:function() {
			    },
			    success: function (data) {
			    	$('#cd-timeline').addClass('cd-container-before');
			    	$('#cd-timeline').addClass('display-none');
			    	$('.article-content').removeClass('display-none');
			    	$('.article-content').html(data);
			    },
			    error: function(response) {
			    }
			});
		})
	
	})
	
</script>