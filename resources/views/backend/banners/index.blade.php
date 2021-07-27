@extends('backend.layouts.master')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p>
           <a href="{{route('admin')}}"> <i class="fa fa-arrow-circle-o-left" aria-hidden="true"> Back</i></a>
            <h4 class="card-title">Banner List <a href="{{route('banner.create')}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus-circle"></i> Create Banner </a><span class="badge bg-primary pull-right" style="background:#4B49AC!important">Total Banners: {{\App\Models\Banner::count()}}</span></h4>
            
        </p>        
          @include('backend.layouts.notification')
        <div class="table-responsive">
          <table class="table table-striped display" id="bannertbl" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Description</th>
                <th>Condition</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($banners as $banner)
              <tr>
                <td> {{$loop->iteration}} </td>
                <td class="py-1">
                  <img src="{{$banner->photo}}" alt="{{$banner->title}}" title="{{$banner->title}}" style="max-height:90px; max-width: 120px"/>
                </td>
                <td>{{$banner->title}}</td>
                <td>{!! html_entity_decode($banner->description)!!}</td>
                <td>
                  @if ($banner->conditions == 'banner')
                    <span class="badge badge-success">{{$banner->conditions}}</span>
                    @else
                    <span class="badge badge-primary">{{$banner->conditions}}</span>
                  @endif
                </td>
                <td>
                  <input type="checkbox" data-toggle="switchbutton" name="toggle" value="{{$banner->id}}" {{$banner->status == 'active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                </td>
                <td>
                  <a href="{{route('banner.edit', $banner->id)}}" data-toggle="tooltip" title="edit" class="float-left btn btn-outline-warning btn-sm"  data-placement="bottom"><i class="fa fa-edit"></i></a>
                  <form class="float-left ml-1" action="{{route('banner.destroy', $banner->id)}}" method="post">
                      @csrf
                      @method('delete')
                     <a href="" data-toggle="tooltip" title="delete"  data-id = "{{$banner->id}}" class="dlbtn btn btn-outline-danger btn-sm"  data-placement="bottom"><i class="fa fa-trash"></i></a>
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
        url:"{{route('banner.status')}}",
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
      $('#bannerbl').DataTable();
  } );
</script>
@endsection