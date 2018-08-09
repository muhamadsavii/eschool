
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

	
	@foreach($article as $article)
	@endforeach
	
	<div class="container" id="myHeader">
		<button type="button" class="btn btn-default article-back-button">Back</button>
	</div>
	<div class="container content">
		<div class="row mycolor">
			<div class="col-md-12" >
				<!-- <img class="title-img-article img-rounded img-responsive" src="{{-- $article->title_img --}}" alt="Picture"> -->
			</div>
			<div class="col-md-12 title-article">
				<!-- <h1>{{-- $article->title --}}</h1> -->
			</div>
			<div class="col-md-12 content-article">
				<!-- {{--$article->description--}} -->
			</div>
		</div>
		<!-- sementara -->
	
	 <div class="product-gallery">

	 			
				
				  
                <div class="gallery-img">
                    <a>
                        <img src="{{ asset('assets/plugins/Facebook-Like-jQuery-Image-Gallery-Lightbox-Plugin-AM2-Simple-Slider/Images/img1.jpg') }}" alt="img01">
                    </a>
                    <div data-desc="Image1 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.">
                    </div>
                </div>
                <div class="gallery-img">
                    <a>
                        <img src="{{ asset('assets/plugins/Facebook-Like-jQuery-Image-Gallery-Lightbox-Plugin-AM2-Simple-Slider/Images/img2.jpg') }}" alt="img02">
                    </a>
                    <div data-desc="Image2. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry">
                    </div>
                </div>
                <div class="gallery-img">
                    <a>
                        <img src="{{ asset('assets/plugins/Facebook-Like-jQuery-Image-Gallery-Lightbox-Plugin-AM2-Simple-Slider/Images/img3.jpg') }}" alt="img03">
                    </a>
                    <div data-desc="Image3. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry">
                    </div>
                </div>
                <div class="gallery-img">
                    <a>
                        <img src="{{ asset('assets/plugins/Facebook-Like-jQuery-Image-Gallery-Lightbox-Plugin-AM2-Simple-Slider/Images/img4.jpg') }}" alt="img04">
                    </a>
                    <div data-desc="Image4. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry">
                    </div>
                </div>
                <div class="gallery-img">
                    <a>
                        <img src="{{ asset('assets/plugins/Facebook-Like-jQuery-Image-Gallery-Lightbox-Plugin-AM2-Simple-Slider/Images/img5.jpg') }}" alt="img05">
                    </a>
                    <div data-desc="Image5. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry">
                    </div>
                </div>
                <div class="gallery-img">
                    <a>
                        <img src="{{ asset('assets/plugins/Facebook-Like-jQuery-Image-Gallery-Lightbox-Plugin-AM2-Simple-Slider/Images/img6.jpg') }}" alt="img06">
                    </a>
                    <div data-desc="Image6.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry">
                    </div>
                </div>
            </div>
           

     <script type="text/javascript">
         $('.gallery-img').Am2_SimpleSlider();
       </script>

	<!-- sementara -->
				
		
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
