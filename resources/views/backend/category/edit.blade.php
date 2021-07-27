
 @extends('backend.layouts.master')

 @section('content')
      
  <div class="content-wrapper">
    
    <div class="row">
      <a href="{{route('category.index')}}"> <i class="fa fa-arrow-circle-o-left" aria-hidden="true"> Back</i></a>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Category</h4><hr/>
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
            <form class="forms-sample" action="{{route('category.update', $category->id)}}" method="POST">
              @csrf
              @method('patch')
              <div class="form-group">
                <label for="exampleInputUsername1">Title<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" value="{{$category->title}}" placeholder="Title" name="title">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="form-control" id="summary" placeholder="Description" name="summary">{{$category->summary}}</textarea>
              </div>

                <div class="form-group">
                  <label for="">Is Parent </label>
                  <input id = "is_parent" type="checkbox" value="{{$category->is_parent}}" name="is_parent" {{$category->is_parent == 1 ? 'checked' : ''}}> Yes 
              </div>
              <div class="form-group d-none" {{$category->is_parent == 1 ? : 'd-none'}} id="parent_cat_div">
                <label for="">Parent Category </label>
                  <select name="parent_id" class="form-control show-tick input-sm text-black">
                    <option value="">Please choose...</option>
                     @foreach ($parent_cats as $pcats)
                       <option value="{{$pcats->id}}" {{$pcats->id == $category->is_parent ? 'selected' : ''}}>{{$pcats->title}}</option>
                     @endforeach
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
                    <input id="thumbnail" class="form-control input-sm" type="text" name="photo" id="photo" value="{{$category->photo}}">
                  </div>
                 <div id="holder" style="margin-top:15px;max-height:100px;"></div>
              </div>
              <button type="submit" class="btn btn-success mr-2"><i class="ti-pencil-alt"></i> Update</button>
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