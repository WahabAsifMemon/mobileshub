@extends('admin/layout/master')
@section('page-title')
  Create Product
@endsection
@section('main-content')

    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
      <form name="formCreate" id="formCreate" method="POST" action="/admin/product" enctype="multipart/form-data">
        @csrf
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <!-- row start -->
          <div class="row"> 
                <div class="col-xs-6">
                  
                 <div class="form-group @error('title') has-error @enderror" >
                    <label for="title">Title <span class="text text-red">*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                       @error('title')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>

                     <div class="form-group  @error('slug') has-error @enderror">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" readonly>
                       @error('slug')
                        <div class="label label-danger">{{ $message }}</div>
                      @enderror
                    </div>
 
                    <div class="form-group">
                    <label for="designation">Designation <span class="text text-red">*</span></label>
                      <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation">
                    </div>
                    
                    <div class="form-group">
                      <label for="availability">Availability <span class="text text-red">*</span></label>
                      <input type="text" class="form-control" name="availability" id="availability" placeholder="Availability">
                    </div>
                    
                    <div class="form-group">
                      <label for="edition_number">Model Number</label>
                      <input type="text" class="form-control" name="edition_number" id="edition_number" placeholder="Model Number">
                    </div>

                    <div class="form-group">
                      <label for="camera">Camera</label>
                      <input type="text" class="form-control" name="camera" id="camera" placeholder="Camera">
                    </div>

                    <div class="form-group @error('variation') has-error @enderror">
                      <label>variation <span class="text text-red">*</span></label>
                      <select class="form-control" name="category_id" id="category_id" style="width: 100%;">
                        <option value="0">-- Select variation --</option>
                         @foreach($variations as $variation)
                         <option value="{{ $variation->id }}"> {{ $variation->ram }}/{{ $variation->rom }}</option>
                         @endforeach
                      </select>
                         @error('variation')        
                          <div class="label label-danger">{{ $message }}</div>        
                       @enderror
                    </div>
                  </div>

                <div class="col-xs-6" >

                   <div class="form-group">
                      <label for="mobile_img">Mobile Image <span class="text text-red">*</span></label>
                      <input type="file" class="form-control" name="mobile_img" id="mobile_img" >
                    </div>

                    <div class="form-group">
                      <label for="variation">Variation</label>
                      <input type="text" class="form-control" name="variation" id="variation"   placeholder="Variation">
                    </div>

                    <div class="form-group">
                      <label for="variation">Price</label>
                      <input type="text" class="form-control" name="price" id="price"   placeholder="Price">
                    </div>

                    <div class="form-group">
                      <label for="battery_mah">Battery Mah</label>
                      <input type="teaxt" class="form-control" name="battery_mah" id="battery_mah"   placeholder="Battery Mah">
                    </div>
                 

                    <div class="form-group">
                      <label for="description">Description <span class="text text-red">*</span></label>
                       <textarea name="description" class="summernote" id="summernote" class="form-control" ></textarea>

                    </div>
                </div>
            </div>

              <!-- row end -->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/admin/product" class="btn btn-danger">Cancel</a>
          </div>
      </div>
    </form>
      <!-- /.box -->

      <!-- form end -->

    </section>
    @endsection

    @section("scripts")
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
          $('.summernote').summernote();
        });
      </script>
      <script type="text/javascript">
        $("#title").keyup(function() {
          var Text = $(this).val();
          Text = Text.toLowerCase();
          Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
          $("#slug").val(Text);  
        });
      </script>
    @endsection