@extends("layouts._admin")
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="{{route("admin.cate.add")}}" class="btn btn-sm btn-success">
          	<i class="fa fa-plus"></i>
          	Add new
          </a>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
        	@if(count($cateList) > 0)
			<table class="table table-hover">
	          	<thead>
		            <th>ID</th>
		            <th>Category name</th>
		            <th>Parent</th>
		            <th>Image</th>
		            <th></th>
	            </thead>
	            <tbody>
		            @foreach($cateList as $cate)
				         <tr id="cate-{{$cate->id}}">
	                  <td>{{$cate->id}}</td>
	                  <td>{{$cate->cate_name}}</td>
	                  <td>{{$cate->getParentName()}}</td>
	                  <td><img width="50px" src="{{$cate->feature_image}}" alt=""></td>
	                  <td>
	                  	<a href="{{route("admin.cate.update", ['id' => $cate->id])}}" class="btn btn-sm btn-info">Update</a>
	                  	<a href="javascript:;" 
                          class="btn btn-sm btn-danger cate-remove" remove-id="{{$cate->id}}">Remove</a>
	                  </td>
	                </tr>
		            @endforeach
                <tr>
                  <td colspan="5" class="text-center">
                    {{$cateList->links()}}
                  </td>
                </tr>
                
	          	</tbody>
          	</table>
        	@endif
      
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <input type="hidden" value="{{ route('admin.cate.remove') }}" id="remove-cate-url">
@endsection
@section('page-js')
  <script type="text/javascript" src="{{ asset('admin/js/category/index.js') }}"></script>
  <script>
    $(document).ready(function(){
      categoryIndex.init();
    });
  </script>
@endsection



