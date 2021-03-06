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
  {!! Form::open(array("id"=>"ekstrakulikuler-create-form", "class" => "form-horizontal", "role" => "form", "files" => true, "enctype" => "multipart/form-data")) !!}
  <!-- <form class="form-horizontal" id="article-create-form" action="{{ route('submit') }}" method="post"> -->
    {{Form::hidden('id','',array('id'=>'id')) }}
    <div class="form-group">
      <label class="control-label col-sm-2" for="nama">Nama:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" placeholder="Masukan Nama" name="nama">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="guru">Guru Pembimbing:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="guru" placeholder="Masukan Guru Pembimbing" name="guru">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="button" id="save_ekstrakulikuler" class="btn btn-default">Submit</button>
      </div>
    </div>
     {{ csrf_field() }}
  </form>
</div>
@include('backend.ekstrakulikuler.scripts.create_script')
