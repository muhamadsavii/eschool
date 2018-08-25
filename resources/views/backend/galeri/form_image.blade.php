


      <div class="form-group" data-id="{{$id}}">
        <label class="control-label col-sm-2" for="pwd">Photo {{$id}}</label>
        <div class="col-sm-8 ">          
          <div class="input-group">
              <span class="input-group-btn">
                  <span class="btn btn-default btn-file">
                      Browse… <input type="file" id="imgInp">
                  </span>
              </span>
              <input type="text" name="content[image][]" class="form-control" readonly>
          </div>
          <img id='img-upload-{{$id}}' class="img-upload" />
          <br>
          <div>
              {{ Form::textarea('content[caption][]',null,['size'=>'50x3']) }}
          </div>
        </div>
        <div class="col-sm-2"> 
          <button type="button" class="btn btn-success add-img">
            <span class="glyphicon glyphicon-plus"></span>
          </button>
          &nbsp;  
          <button type="button" class="btn btn-danger remove-img">
            <span class="glyphicon glyphicon-minus"></span>
          </button>
        </div>
      </div>
    