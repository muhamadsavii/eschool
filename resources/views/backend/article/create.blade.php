<style type="text/css">
          .btn-file {
    position: relative;
    overflow: hidden;
  }
  .btn-file input[type=file] {
      position: absolute;
      top: 0;
      right: 0;
      min-width: 100%;
      min-height: 100%;
      font-size: 100px;
      text-align: right;
      filter: alpha(opacity=0);
      opacity: 0;
      outline: none;
      background: white;
      cursor: inherit;
      display: block;
  }

  .img-upload{
      width: 25%;
  }
</style>
<div class="container-fluid">
  <h2>Horizontal form</h2>
  {!! Form::open(array("id"=>"article-create-form", "class" => "form-horizontal", "role" => "form", "files" => true, "enctype" => "multipart/form-data")) !!}
  <!-- <form class="form-horizontal" id="article-create-form" action="{{ route('submit') }}" method="post"> -->
    {{Form::hidden('id','',array('id'=>'id')) }}
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Title:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="title" placeholder="Enter email" name="title">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Kategori:</label>
      <div class="col-sm-10">
        {!! Form::select('category',
          array(
          'cd-icon-blog.png' => 'Blog',
          'cd-icon-picture.svg' => 'Picture',
          'cd-icon-tutorial.svg'  => 'Tutorial'
          )
        , 'cd-icon-blog.png', array('class' => 'form-control', 'id'=> 'category'))  !!} 
      </div>
    </div>

    <div class="form-group" id="form-content">
      <label class="control-label col-sm-2" for="pwd">Article:</label>
      <div class="col-sm-10">          
        <textarea class="form-control" name="description" id="input" rows="10"></textarea>
           
      </div>
    
    </div>

    <div id="form-image" style="display: none;"></div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="button" id="save_article" class="btn btn-default">Submit</button>
      </div>
    </div>
     {{ csrf_field() }}
  </form>
</div>
@include('backend.article.scripts.create_script')
