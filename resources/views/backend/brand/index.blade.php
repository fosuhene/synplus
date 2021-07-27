@extends('backend.layouts.master')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p>
           <a href="{{route('admin')}}"> <i class="fa fa-arrow-circle-o-left" aria-hidden="true"> Back</i></a>
            <h4 class="card-title">Brand List <a href="{{route('brand.create')}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus-circle"></i> Create Brand </a><span class="badge bg-primary pull-right" style="background:#4B49AC!important">Total Brands: {{\App\Models\Brand::count()}}</span></h4>
            
        </p>        
          @include('backend.layouts.notification')
        <div class="table-responsive">
          <table class="table table-striped" id="brandtbl" style="width:100%">
            <thead class="table-dark">
              <tr>
                <th>No.</th>
                <th>Photo</th>
                <th>Title</th>                
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($brands as $brand)
              <tr>
                <td> {{$loop->iteration}} </td>
                <td class="py-1">
                  <img src="{{$brand->photo}}" alt="{{$brand->title}}" title="{{$brand->title}}" style="max-height:90px; max-width: 120px"/>
                </td>
                <td>{!! html_entity_decode(substr($brand->title, 0, 50))!!}</td>
                <td>{!! html_entity_decode(substr($brand->description, 0, 30))!!}</td>
                <td>
                  <input type="checkbox" data-toggle="switchbutton" name="toggle" value="{{$brand->id}}" {{$brand->status == 'active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                </td>
                <td>
                  <a href="{{route('brand.edit', $brand->id)}}" data-toggle="tooltip" title="edit" class="float-left btn btn-outline-warning btn-sm"  data-placement="bottom"><i class="fa fa-edit"></i></a>
                  <form class="float-left ml-1" action="{{route('brand.destroy', $brand->id)}}" method="post">
                      @csrf
                      @method('delete')
                     <a href="" data-toggle="tooltip" title="delete"  data-id = "{{$brand->id}}" class="dlbtn btn btn-outline-danger btn-sm"  data-placement="bottom"><i class="fa fa-trash"></i></a>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
  <script>
    $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
     }); 
     $('.dlbtn').click(function(e){
        var form = $(this).closest('form');
        var dataID = $(this).data('id');

        e.preventDefault();
          swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this record!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                 form.submit();
                swal("Poof! Your record has been deleted!", {
                  icon: "success",
                });
              } else {
                swal("Your record is safe!");
              }
            });
     });
  </script>
 <script>
   $('input[name=toggle]').change(function(){
     var mode = $(this).prop('checked');
     var id = $(this).val();
     //run test to validate working
     //alert(id);
     //alert(mode)
     //ajax to control update mechanism
     $.ajax({
        url:"{{route('brand.status')}}",
        type:"POST",
        data:{
            _token:'{{csrf_token()}}',
            mode:mode,
            id:id,
        },
        success:function(response){
          console.log(response.status);
          if(response.status){
           // alert(response.msg);
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: response.msg,
                showConfirmButton: false,
                timer: 2500
				   })
          }else{
            //alert('Please try again');
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'Please try again',
              showConfirmButton: false,
              timer: 7500
              })
          }
        }

     });
   });
 </script>
 <script>
    $(document).ready( function () {
        $('#brandtbl').DataTable();
    } );
</script>
@endsection