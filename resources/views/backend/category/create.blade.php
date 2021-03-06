
 @extends('backend.layouts.master')

 @section('content')
  <div class="content-wrapper">
    
    <div class="row">
      <a href="{{route('category.index')}}"> <i class="fa fa-arrow-circle-o-left" aria-hidden="true"> Back</i></a>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Category</h4><hr/>
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
            <form class="forms-sample" action="{{route('category.store')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleInputUsername1">Title<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" value="{{old('title')}}" placeholder="Title" name="title">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Summary</label>
                <textarea class="form-control" id="summary" placeholder="Description" name="summary">{{old('summary')}}</textarea>
              </div>            
             <div class="form-group">
                  <label for="">Is Parent <span class="text-danger">*</span></label>
                  <input id = "is_parent" type="checkbox" value="true" name="is_parent" checked> Yes 
              </div>
              <div class="form-group d-none" id="parent_cat_div">
                <label for="">Parent Category </label>
                  <select name="parent_id" class="form-control show-tick input-sm text-black">
                    <option value="">Please choose...</option>
                     @foreach ($parent_cats as $pcats)
                       <option value="{{$pcats->id}}" {{old('parent_id') == $pcats->id ? 'selected' : ''}}>{{$pcats->title}}</option>
                     @endforeach
                  </select>
              </div>
              <div class="form-group col-md-6">
                <label for="">Status <span class="text-danger">*</span></label>
                  <select name="status" class="form-control show-tick text-black">
                    <option value="">choose...</option>
                    <option value="active" {{old('status') == 'active' ? 'selected' : ''}}>Active</option>
                    <option value="inactive" {{old('status') == 'inactive' ? 'selected' : ''}}>Inactive</option>
                  </select>
              </div>
              
              <div class="form-group">
                <label for="exampleInputPassword1">Upload Photo</label>
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
              <button type="submit" class="btn btn-primary mr-2"><i class="ti-save"></i> Submit</button>
              <button class="btn btn-danger"> <i class="ti-close"></i> Cancel</button>
            </form>
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


   {{---ckeditor---}}
   <script src="{{asset('backend/assets/ckeditor/ckeditor.js')}}"></script>
     <script>
        $(document).ready(function() {
          CKEDITOR.replace( 'summary',
          {
            customConfig : 'config.js',
            toolbar : 'simple'
          })  
          

          $('#is_parent').change(function(e){
          e.preventDefault();
          var is_checked = $('#is_parent').prop('checked');
          //alert(is_checked);

          if(is_checked){
            $('#parent_cat_div').addClass('d-none');
            $('#parent_cat_div').val();
          }else{
            $('#parent_cat_div').removeClass('d-none');

          }
       });

          
       });
    </script>
 @endsection