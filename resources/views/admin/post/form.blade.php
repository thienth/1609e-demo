@extends("layouts._admin")
@section('content')
  @if(count($errors) > 0 )
      <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
              {{ $error }}<br>        
          @endforeach
      </div>
  @endif
  <div class="box box-info">
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{route('admin.cate.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$model->id}}" />
      <div class="box-body row">
        <div class="col-md-8 col-md-offset-2">
          <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title:</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="title" name="title" placeholder="Post title" value="{{$model->title}}">
            </div>
          </div>
          <div class="form-group">
            <label for="cate-id" class="col-sm-2 control-label">Category:</label>

            <div class="col-sm-10">
              <select name="cate_id" value="{{$model->cate_id}}" id="cate-id" class="form-control">
                <option value="">Danh mục cha</option>
                @foreach ($categories as $element)
                  @if($element->id == $model->cate_id)

                    <option value="{{$element->id}}" selected>{{$element->cate_name}}</option>
                  @else

                    <option value="{{$element->id}}">{{$element->cate_name}}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="feature-image" class="col-sm-2 control-label">Feature image:</label>

            <div class="col-sm-10">
              <input type="file" name="imageFile" value="" class="form-control" id="feature-image" placeholder="Feature image">
            </div>
          </div>
          <div class="form-group">
            <label for="content" class="col-sm-2 control-label">Description:</label>

            <div class="col-sm-10">
              <textarea name="content" rows="6" placeholder="Post Content" class="form-control" id="content">{{$model->content}}</textarea>
            </div>
          </div>
          
        </div>
        </div>
        
      <!-- /.box-body -->
      <div class="box-footer text-center">
        <button type="submit" class="btn btn-success ">Save</button>
        <button type="submit" class="btn btn-default">Cancel</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</div>
@endsection