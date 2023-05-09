@extends('admin/layout/master')
@section('page-title')
  Edit Product
@endsection
@section('main-content')
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
       <form name="formAdd" id="formAdd" method="POST" action="/admin/product/{{ $product->id }}" enctype="multipart/form-data">
        @csrf
        @method('put')
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <!-- row start -->
          <div class="row"> 
                <div class="col-xs-6">
                  
                 <div class="form-group">
                    <label for="title">Title <span class="text text-red">*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $product->title }}">
                    </div>

                     <div class="form-group">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="slug" value="{{ $product->slug }}">
                    </div>
 
                    <div class="form-group">
                    <label for="designation">Designation <span class="text text-red">*</span></label>
                      <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation"
                       value="{{ $product->designation}}">
                    </div>
                   

                    <div class="form-group">
                      <label for="availability">Availability <span class="text text-red">*</span></label>
                      <input type="text" class="form-control" name="availability" id="availability" placeholder="Availability" value="{{ $product->availability }}">
                    </div>
                    
                    <div class="form-group">
                      <label for="model_number">Model Number</label>
                      <input type="text" class="form-control" name="edition_number" id="edition_number" placeholder="Model Number" value="{{ $product->edition_number }}">
                    </div>
                    <div class="form-group">
                      <label for="camera">Camera</label>
                      <input type="text" class="form-control" name="camera" id="camera" placeholder="Camera" value="{{ $product->camera }}">
                    </div>

                     <div class="form-group @error('variation') has-error @enderror">
                      <label>Variation <span class="text text-red">*</span></label>
                      <select class="form-control" name="category_id" id="category_id" style="width: 100%;">
                        <option value="0">-- Select variation --</option>
                         @foreach($variations as $variation)
                         <option value="{{ $variation->id }}"  {{ ($variation->id == $product->variation) ? 'selected' : null }}> {{ $variation->ram }}/{{ $variation->rom }}</option>
                         @endforeach
                      </select>
                         @error('variation')        
                          <div class="label label-danger">{{ $message }}</div>        
                       @enderror
                    </div>
                </div>
                    <div class="col-xs-6">
                    <div class="form-group">
                      <label for="mobile_img">Mobile Image</label>
                      <input type="file" class="form-control" name="mobile_img" id="mobile_img" >
                    </div>

                    <div class="form-group">
                      <label for="variation">Variation</label>
                      <input type="text" class="form-control" name="variation" id="variation"   placeholder="Variation" value="{{ $product->variation }}">
                    </div>

                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" name="price" id="price" placeholder="price" value="{{ $product->price }}">
                    </div>

                    <div class="form-group">
                      <label for="battery_mah">Battery Mah</label>
                      <input type="teaxt" class="form-control" name="battery_mah" id="battery_mah"   placeholder="Battery Mah"  value="{{ $product->battery_mah }}">
                    </div>


                    

                    <div class="form-group">
                      <label for="description">Description <span class="text text-red">*</span></label>
                      <textarea class="form-control" name="description" rows="5" id="description" placeholder="Description">{{ $product->description}}</textarea>
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