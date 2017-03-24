@extends("layouts._admin")
@section('content')
<div class="row">
  
  <div class="box box-info">
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{route('admin.cate.store')}}" enctype="multipart/form-data">
      <input type="hidden" name="id" value="{{$model->id}}" />
      <div class="box-body row">
        <div class="col-md-8 col-md-offset-2">
          <div class="form-group">
            <label for="cate-name" class="col-sm-2 control-label">Category name:</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="cate-name" name="cate_name" placeholder="Category name" value="{{$model->cate_name}}">
            </div>
          </div>
          <div class="form-group">
            <label for="parent-id" class="col-sm-2 control-label">Parent:</label>

            <div class="col-sm-10">
              <select name="parent_id" value="{{$model->parent_id}}" id="parent-id" class="form-control">
                <option value="">Danh mục cha</option>
                @foreach ($cateList as $element)
                  @if($element->id == $model->parent_id)

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
            <label for="description" class="col-sm-2 control-label">Description:</label>

            <div class="col-sm-10">
              <textarea name="description" rows="6" placeholder="category description" class="form-control" id="description">{{$model->description}}</textarea>
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