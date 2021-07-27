
 @extends('backend.layouts.master')

 @section('content')
  <div class="content-wrapper">
    
    <div class="row">
      <a href="{{route('brand.index')}}"> <i class="fa fa-arrow-circle-o-left" aria-hidden="true"> Back</i></a>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Brand</h4><hr/>
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
            <form class="forms-sample" action="{{route('brand.store')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleInputUsername1">Title<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" value="{{old('title')}}" placeholder="Title" name="title">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="form-control" id="description" placeholder="Description" name="description">{{old('description')}}</textarea>
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


              <div class="row form-group">
              <div class="form-group col-md-6">
                <label for="">Status </label>
                  <select name="status" class="form-control show-tick  text-black">
                    <option value="">Please choose...</option>
                    <option value="active" {{old('status') == 'active' ? 'selected' : ''}}>Active</option>
                    <option value="inactive" {{old('status') == 'inactive' ? 'selected' : ''}}>Inactive</option>
                  </select>
              </div>
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


   {{---Summernote---}}
   <script src="{{asset('backend/assets/ckeditor/ckeditor.js')}}"></script>
     <script>
        $(document).ready(function() {
          CKEDITOR.replace( 'description',
          {
            customConfig : 'config.js',
            toolbar : 'simple'
          })   
       });
    </script>
 @endsection