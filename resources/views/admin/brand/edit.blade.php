@extends('admin/layout/master')
@section('page-title')
  Edit Brand
@endsection
@section('main-content')


    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
       <form name="formAdd" id="formAdd" method="POST" action="/admin/brand/{{  $brand->id  }}" enctype="multipart/form-data">
        @csrf
        @method('put');
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <!-- row start -->
          <div class="row"> 
                <div class="col-xs-6">
                  
                  <div class="form-group">
                    <label for="title">Title <span class="text text-red">*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title"  value="{{ $brand->title }}">
                    </div>
 
                    <div class="form-group">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" value="{{ $brand->slug }}">
                    </div>
                    <div class="form-group">
                      <label>Brand Type <span class="text text-red">*</span></label>
                      <select name="brand_type" id="brand_type" class="form-control" style="width: 100%;">
                        <option value="none">-- Select Brand Type --</option>
                        <option value="newer">Newer</option>
                        <option value="older">Older</option>
                        <option value="slider">Slider</option>
                        <option value="brand">Brand</option>


                      </select>
                    </div>
            
                  </div>
                 
                <div class="col-xs-6">
                   <div class="form-group">
                      <label for="Brand_img">Brand Image <span class="text text-red">*</span></label>
                      <input type="file" name="brand_img" id="brand_img">
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ...">{{ $brand->description}}</textarea>
                     </div>
                  </div>
            </div>

              <!-- row end -->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
          </div>
      </div>
    </form>
      <!-- /.box -->

      <!-- form end -->

    </section>
  @endsection