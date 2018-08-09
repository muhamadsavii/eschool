
	<style type="text/css">
		.content{
			background-color: white;
			border-radius: 15px;
			padding: 50px;
			width: 75%;
		}
		.title-article{
			margin-bottom: 20px;
		    text-align: center;
		    font-size: 25px;
		}
		.title-img-article{
			min-width: 80%;
		}
		img {
		    display: block;
		    margin-left: auto;
		    margin-right: auto;
		}
		.content-article{
			font-size: 20px;
		}

		.content {
		  padding: 16px;
		}

		.sticky {
		  position: fixed;
		  top: 0;
		  width: 100%;
		}

		.sticky + .content {
		  padding-top: 102px;
		}
		#myHeader{
			padding-left: 5%;
		}
	</style>
	
	<div class="container" id="myHeader">
		<button type="button" class="btn btn-default article-back-button">Back</button>
	</div>
	<div class="container content">
		<div class="row mycolor">
			<div class="col-md-12" >
				<!-- <img class="title-img-article img-rounded img-responsive" src="{{ $article->title_img }}" alt="Picture"> -->
			</div>
			<div class="col-md-12 title-article">
				<h1>{{ $article->title }}</h1>
			</div>
			<div class="col-md-12 content-article">
				{!! $article->description !!}
			</div>
		</div>
				
		
	</div> 


	<script>
		$(document).ready(function(){
			window.onscroll = function() {myFunction()};

		});
		var header = document.getElementById("myHeader");
		var sticky = header.offsetTop;
		function myFunction() {
		  if (window.pageYOffset >= sticky) {
		    header.classList.add("sticky");
		  } else {
		    header.classList.remove("sticky");
		  }
		}

		$(document).on('click', '.article-back-button', function(){
			$('#cd-timeline').removeClass('cd-container-before');
	    	$('#cd-timeline').removeClass('display-none');
	    	$('.article-content').addClass('display-none');
	    	$('.article-content').html('');
		});

	</script>

	 
	

