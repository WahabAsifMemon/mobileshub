@extends('admin/layout/master')
@section('page-title')
  Create Brand
@endsection
@section('main-content')


    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
       <form name="formCreate" id="formCreate" method="POST" action="/admin/brand" enctype="multipart/form-data">
        @csrf
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <!-- row start -->
          <div class="row"> 
                <div class="col-xs-6">
                  
                  <div class="form-group  @error('title') has-error @enderror">
                    <label for="title">Title <span class="text text-red">*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                      @error('title')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
 
                    <div class="form-group @error('slug') has-error @enderror">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug">
                       @error('slug')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group  @error('brand_type') has-error @enderror">
                      <label>Brand Type <span class="text text-red">*</span></label>
                      <select name="brand_type" id="brand_type" class="form-control" style="width: 100%;">
                        <option value="none">-- Select Brand Type --</option>
                        <option value="newer">Newer</option>
                        <option value="older">Older</option>
                        <option value="slider">Slider</option>
                        <option value="brand">Brand</option>


                      </select>
                    </div>
                     @error('brand_type')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                  </div>
                 
                <div class="col-xs-6">
                  <div class="form-group">
                      <label for="brand_img">Brand Image <span class="text text-red">*</span></label>
                      <input type="file" name="brand_img" class="form-control" id="brand_img">
                       @error('brand_img')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                     </div>
                  </div>
            </div>

              <!-- row end -->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/admin/brand" class="btn btn-danger">Cancel</a>
          </div>
      </div>
      </form>
      <!-- /.box -->

      <!-- form end -->

    </section>
   @endsection