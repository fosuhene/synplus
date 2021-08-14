
 @extends('backend.layouts.master')

 @section('content')
  <div class="content-wrapper">
    
    <div class="row">
      <a href="{{route('product.index')}}"> <i class="fa fa-arrow-circle-o-left" aria-hidden="true"> Back</i></a>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Product</h4><hr/>
            <p class="card-description">
              @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                 <h4 class="alert-heading"></h4>
                 <p>
                  <ul>
                    @foreach ($errors -> all()  as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                 </p>
                 <p class="mb-0"></p>
               </div>
              
              @endif
            </p>

            
            <!--Section: Accordion-->
<section class="mb-5">
    <form class="forms-sample" action="{{route('product.store')}}" method="POST">
        @csrf
    <!--Accordion wrapper-->
    <div class="md-accordion accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
  
      <!-- Accordion card -->
      <div class="card">  
        <!-- Card header -->
        <div class="card-header" role="tab" id="headingOne">
          <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h5 class="mb-0">Product Info
                 <i class="fa fa-user-o"></i>
                </h5>
          </a>
        </div>
  
        <!-- Card body -->
        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
          <div class="card-body">
            <div class="form-group">
                <label for="exampleInputUsername1">Product Name<span class="text-danger">*</span>
                  <i data-toggle="tooltip" title="Product name" class="fa fa-info-circle"></i>
                </label>
                <input type="text" class="form-control" id="name" value="{{old('name')}}" placeholder="Product Name" name="name">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Summry <span class="text-danger">*</span>
                  <i data-toggle="tooltip" title="Biref summary of this product for quick review" class="fa fa-info-circle"></i>
                </label>
                <textarea class="form-control"  col="5" rows="3" id="summary" placeholder="Product Summary" name="summary">{{old('summary')}}</textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description
                  <i data-toggle="tooltip" title="Product description is only shown when customer clicks on read more" class="fa fa-info-circle"></i>
                </label>
                <textarea class="form-control" id="description" placeholder="Description" name="description">{{old('description')}}</textarea>
              </div>              
          </div>
        </div>
      </div>
      <!-- Accordion card -->
  
       <!-- Accordion card -->
       <div class="card">  
        <!-- Card header -->
        <div class="card-header" role="tab" id="pStock">
          <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseStock" aria-expanded="true" aria-controls="collapseStock">
                <h5 class="mb-0">Product Stock & Pricing
                 <i class="fa fa-user-o"></i>
                </h5>
          </a>
        </div>
  
        <!-- Card body -->
        <div id="collapseStock" class="collapse" role="tabpanel" aria-labelledby="pStock">
          <div class="card-body">
             <div class="form-group">
                <label for="exampleInputUsername1">Stock<span class="text-danger">*</span>
                  <i data-toggle="tooltip" title="How many of this product you have in store" class="fa fa-info-circle"></i>
                </label>
                <input type="text" step="any" class="form-control" id="available_qty" value="{{old('available_qty')}}" placeholder="Stock" name="available_qty">
              </div>
              <div class="row">
                <div class="form-group col-md-6 col-sm-6 col-lg-6">
                <label for="exampleInputUsername1">Cost Price<span class="text-danger">*</span>
                  <i data-toggle="tooltip" title="How much did you buy this product" class="fa fa-info-circle"></i>
                </label>
                <input type="text" step="any" class="form-control" id="cost_price" value="{{old('cost_price')}}" placeholder="Cost Price" name="cost_price">
              </div>
              <div class="form-group col-md-6 col-sm-6 col-lg-6">
                <label for="exampleInputUsername1">Markup Price<span class="text-danger">*</span>
                  <i data-toggle="tooltip" title="How much do you want to add as profit on this product" class="fa fa-info-circle"></i>
                </label>
                <input type="text" step="any" class="form-control" id="markup_price" value="{{old('markup_price')}}" placeholder="Markup Price" name="markup_price">
              </div>
            </div>
              <div class="row">
              <div class="form-group col-md-6 col-sm-6 col-lg-6">
                <label for="exampleInputUsername1">Unit Cost
                  <i data-toggle="tooltip" title="If this product is sold in units, how much is the cost of item" class="fa fa-info-circle"></i>
                </label>
                <input type="text" step="any" class="form-control" id="unit_cost" value="{{old('unit_cost')}}" placeholder="Unit Cost" name="unit_cost">
              </div>
              <div class="form-group col-md-6 col-sm-6 col-lg-6">
                <label for="exampleInputUsername1">Unit Price
                  <i data-toggle="tooltip" title="If this product is sold in units, how much do you want sell 1 item" class="fa fa-info-circle"></i>
                </label>
                <input type="text" step="any" class="form-control" id="unit_price" value="{{old('unit_price')}}" placeholder="Unit Price" name="unit_price">
              </div>
            </div> 
            <div class="form-group">
              <label for="exampleInputUsername1">Discount<span class="text-danger">*</span>
                <i data-toggle="tooltip" title="How much discount do you want to give on this product?. It should be a percentage value. E.g: 2" class="fa fa-info-circle"></i>
              </label>
              <input type="text" step="any" class="form-control" id="discount" value="{{old('discount')}}" placeholder="Eg: 2" name="discount">
            </div>
          </div>
        </div>
      </div>
      <!-- Accordion card -->

      <!-- Accordion card -->
      <div class="card">
  
        <!-- Card header -->
        <div class="card-header" role="tab" id="headingTwo">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo" aria-expanded="false"
            aria-controls="collapseTwo">
            <h5 class="mb-0">
              Product Photo
              <i class="fa fa-camera"></i>
            </h5>
          </a>
        </div>
  
        <!-- Card body -->
        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="card-body">
            <div class="form-group">
                <label for="exampleInputPassword1">Upload Product Banner</label>
              <div class="input-group">
                <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary btn-xs">
                    <i class="fa fa-picture-o"></i> Choose
                  </a>
                </span>
                <input id="thumbnail" class="form-control input-sm" type="text" name="photo" id="photo">
              </div>
              <div id="holder" style="margin-top:15px;max-height:100px;"></div>
            </div>
            
          </div>
        </div>
      </div>
      <!-- Accordion card -->

       <!-- Accordion card -->
       <div class="card">
  
        <!-- Card header -->
        <div class="card-header" role="tab" id="headingTwo">
          <a class="collapsed" data-toggle="collapse" data-parent="#brandCat" href="#brandCat" aria-expanded="false"
            aria-controls="brandCat">
            <h5 class="mb-0">
              Brand &amp; Category
              <i class="fa fa-info"></i>
            </h5>
          </a>
        </div>
  
        <!-- Card body -->
        <div id="brandCat" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="card-body">
            <div class="row form-group">
              <div class="form-group col-md-6">
                <label for="">Brand </label>
                  <select name="brand_id" id="brand_id" class="form-control show-tick  text-black">
                    <option value="">-- Brands --</option>
                    @foreach (\App\Models\Brand::get() as $brand )
                    <option value="{{$brand->id}}">{{$brand->title}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label for="">Category <span class="text-danger">*</span></label>
                  <select name="cat_id" id="cat_id"  class="form-control show-tick text-black">
                    <option value="">-- Categories --</option>
                    @foreach (\App\Models\Category::where('is_parent', 1)->get() as $cat )
                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="row form-group">
              <div class="form-group col-md-6 d-none" id="child_cat_div">
                <label for="">Child Category <span class="text-danger">*</span></label>
                  <select name="child_cat_id" id="child_cat_id"  class="form-control show-tick text-black">
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label for="">Size <span class="text-danger">*</span></label>
                  <select name="item_size" id="item_size"  class="form-control show-tick text-black">
                    <option value="">-- Size --</option>
                    <option value="S" {{old('size') == 'S' ? 'selected' : ''}}>S</option>
                    <option value="M" {{old('size') == 'M' ? 'selected' : ''}}>M</option>
                    <option value="L" {{old('size') == 'L' ? 'selected' : ''}}>L</option>
                    <option value="XL" {{old('size') == 'XL' ? 'selected' : ''}}>XL</option>
                    <option value="XXL" {{old('size') == 'XXL' ? 'selected' : ''}}>XXL</option>
                  </select>
              </div>
             
            </div>
          </div>
        </div>
      </div>
      <!-- Accordion card -->
  
      <!-- Accordion card -->
      <div class="card">
  
        <!-- Card header -->
        <div class="card-header" role="tab" id="headingThree">
          <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree"
            aria-expanded="false" aria-controls="collapseThree">
            <h5 class="mb-0">
              Product Status
              <i class="fa fa-circle-o-notch"></i>
            </h5>
          </a>
        </div>
  
        <!-- Card body -->
        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="card-body">
            <div class="row form-group">
                <div class="form-group col-md-6">
                  <label for="">Status </label>
                    <select name="status" class="form-control show-tick  text-black">
                      <option value="">Please choose...</option>
                      <option value="active" {{old('status') == 'active' ? 'selected' : ''}}>Active</option>
                      <option value="inactive" {{old('status') == 'inactive' ? 'selected' : ''}}>Inactive</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="">Condition <span class="text-danger">*</span></label>
                    <select name="conditions" class="form-control show-tick text-black">
                      <option value="">Please choose...</option>
                      <option value="new" {{old('new') == 'new' ? 'selected' : ''}}>New</option>
                      <option value="popular" {{old('popular') == 'popular' ? 'selected' : ''}}>Popular</option>
                    </select>
                </div>
              </div>
          </div>
        </div>
      </div>
      <!-- Accordion card -->

         <!-- Accordion card -->
         <div class="card">
  
          <!-- Card header -->
          <div class="card-header" role="tab" id="headingThree">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordionVen" href="#accordionVen"
              aria-expanded="false" aria-controls="accordionVen">
              <h5 class="mb-0">
                Product Vendor
                <i class="fa fa-circle-o-notch"></i>
              </h5>
            </a>
          </div>
    
          <!-- Card body -->
          <div id="accordionVen" class="collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="card-body">
              <div class="row"> 
                  <div class="form-group">
                    <label for="">Vendor </label>
                      <select name="vendor_id" id="vendor_id" class="form-control show-tick  text-black">
                        <option value="">-- Vendor--</option>
                        @foreach (\App\Models\User::where('role', 'vendor')->get() as $vendor )
                        <option value="{{$vendor->id}}">{{$vendor->full_name}}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="">Unit Measure </label>
                      <select name="umeasure_id" id="umeasure_id" class="form-control show-tick  text-black">
                        <option value="">-- Unit Measure--</option>
                        @foreach (\App\Models\Munit::get() as $munit )
                        <option value="{{$munit->id}}">{{$munit->umeasure}}</option>
                        @endforeach
                      </select>
                  </div>
               </div>
            </div>
          </div>
        </div>
    </div>
    <!--/.Accordion wrapper-->
  
              <button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Submit</button>
              <button class="btn btn-danger"> <i class="ti-close"></i> Cancel</button>
            </form>

        </section>
        <!--Section: Accordion-->

          </div>
        </div>
      </div>

      <div class="col-md-6 grid-margin stretch-card"></div>

    </div>
  </div>


 @endsection

 @section('scripts')
 <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
 <script>
   $('#lfm').filemanager('image');
 </script>


   {{---Summernote---}}
   <script src="{{asset('backend/assets/ckeditor/ckeditor.js')}}"></script>
     <script>
        $(document).ready(function() {
          CKEDITOR.replace( 'description',
          {
            customConfig : 'config.js',
            toolbar : 'simple'
          });
          /*
          CKEDITOR.replace( 'summary',
          {
            customConfig : 'config.js',
            toolbar : 'simple'
          }) 
          */   
       });
    </script>
    <script>
      $('#cat_id').change(function(){
        var cat_id = $(this).val();
        //alert(cat_id);
        //console.log(cat_id);
        if(cat_id != null){
           $.ajax({
              url:"/admin/category/"+cat_id+"/child",
              type:"POST",
              data:{
                _token:"{{csrf_token()}}",
                cat_id:cat_id,
              },
              success:function(response){
                var html_option = "<option value=''>----Child Category---</option>";
                //console.log(response);
                if(response.status){
                   $('#child_cat_div').removeClass('d-none');
                   $.each(response.data, function(id, title){
                      html_option += "<option value='"+ id +"'>"+ title +"</option>";
                   })
                }
                else{
                  $('#child_cat_div').addClass('d-none');
                  /*
                  Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Please try again',
                    text: response.msg,
                    showConfirmButton: false,
                    timer: 2000
                    })
                    */
                }
                $('#child_cat_id').html(html_option);
              }
           });
        }
      });
    </script>
 @endsection