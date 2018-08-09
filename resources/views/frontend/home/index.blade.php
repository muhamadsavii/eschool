
@extends('layout.frontend.master.master')
@section('content')
	<style type="text/css">
		

		.cd-container-before::before{
			display: none;
		}

		.display-none{
			display: none;
		}


	</style>
	<section id="cd-timeline" class="cd-container">
		@foreach($article as $article)
			<div class="cd-timeline-block">
				<div class="cd-timeline-img cd-picture">
					<img src="{{ asset('assets/frontend/images/'.$article->category) }}" alt="Picture">
				</div> 

				<div class="cd-timeline-content">
					<h2 class="title-center mycolor">{{ $article->title }}</h2>
					@if($article->category == 'cd-icon-picture.svg')
						<img class="center-blok margin-img" src="{{ asset('photos/photo-articles/'.$article->title_img) }}">
					@else
						<img class="center-blok margin-img" src="{!!asset($article->title_img)!!}">
					@endif
					<a href="javascript:void(0)" class="cd-read-more mybacground" data-id="{{ $article->id }}" >Read more</a>
                    <input type="text" name="categori" value="{{$article->category}}" id="categori">
					<span class="cd-date">{{ date('d M Y', strtotime($article->created_at)) }}</span>
				</div> 
			</div>
		@endforeach 

		@include('frontend.home.scripts.index_script')
	</section>

	<!-- sementara -->
	
     <div class="product-gallery" style="display:none;">

	 			
				
				  
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




	<section class="cd-container article-content display-none">
		
	</section>

@endsection
