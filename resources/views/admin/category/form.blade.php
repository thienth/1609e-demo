@extends("layouts._admin")
@section('content')
<div class="row">
  
  <div class="box box-info">
    <!-- form start -->
    <form class="form-horizontal">
      <div class="box-body row">
        <div class="col-md-8 col-md-offset-2">
          <div class="form-group">
            <label for="cate-name" class="col-sm-2 control-label">Category name:</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="cate-name" placeholder="Category name">
            </div>
          </div>
          <div class="form-group">
            <label for="parent-id" class="col-sm-2 control-label">Parent:</label>

            <div class="col-sm-10">
              <select name="" id="parent-id" class="form-control">
                <option value="">Danh mục cha</option>
                @foreach ($cateList as $element)
                  <option value="{{$element->id}}">{{$element->cate_name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="feature-image" class="col-sm-2 control-label">Feature image:</label>

            <div class="col-sm-10">
              <input type="file" name="" value="" class="form-control" id="feature-image" placeholder="Feature image">
            </div>
          </div>
          <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Feature image:</label>

            <div class="col-sm-10">
              <textarea name="" rows="6" placeholder="category description" class="form-control" id="description"></textarea>
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