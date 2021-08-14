@extends('backend.layouts.master')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p>
           <a href="{{route('admin')}}"> <i class="fa fa-arrow-circle-o-left" aria-hidden="true"> Back</i></a>
            <h4 class="card-title">Product List <a href="{{route('product.create')}}" class="btn btn-sm btn-outline-primary"><i class="fa fa-plus-circle"></i> Create Product </a><span class="badge bg-primary pull-right" style="background:#4B49AC!important">Total Products: {{\App\Models\Product::count()}}</span></h4>
            
        </p>        
          @include('backend.layouts.notification')
        <div class="table-responsive">
          <table class="table table-striped display" id="productbl" style="width:100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>Product Name</th>                
                <th>Photo</th>                
                <th>Price</th>                
                <th>Discount</th>
                <th>Size</th>
                <th>Condition</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                 <td> {{$loop->iteration}} </td>                
                 <td>{{$product->name}}</td>
                  <td> <img src="{{$product->photo}}" alt="{{$product->name}}" title="{{$product->name}}" class="w-80 shadow-1-strong rounded mb-4"/></td>
                  <td>GHS {{number_format($product->cost_price + $product->markup_price, 2)}}</td>
                  <td>GHS {{number_format($product->discount, 2)}}</td>
                  <td>{{$product->item_size}}</td>
                <td>
                  @if ($product->conditions == 'new')
                    <span class="badge badge-success">{{$product->conditions}}</span>
                    @else
                    <span class="badge badge-primary">{{$product->conditions}}</span>
                  @endif
                </td>
                <td>
                  <input type="checkbox" data-toggle="switchbutton" name="toggle" value="{{$product->id}}" {{$product->status == 'active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                </td>
                <td>
                  <a href="javascript:void(0);" data-toggle="modal" data-target="#productID{{$product->id}}" data-toggle="tooltip" title="view details" class="float-left btn btn-outline-secondary btn-sm"  data-placement="bottom"><i class="fa fa-eye"></i></a>
                  <a href="{{route('product.edit', $product->id)}}" data-toggle="tooltip" title="edit" class="float-left btn btn-outline-warning btn-sm"  data-placement="bottom"><i class="fa fa-edit"></i></a>
                  <form class="float-left ml-1" action="{{route('product.destroy', $product->id)}}" method="post">
                      @csrf
                      @method('delete')
                     <a href="" data-toggle="tooltip" title="delete"  data-id = "{{$product->id}}" class="dlbtn btn btn-outline-danger btn-sm"  data-placement="bottom"><i class="fa fa-trash"></i></a>
                  </form>
                </td>


                <!-- modal to show product details---->
                  <!-- Button trigger modal -->
                      <!-- Modal -->
                      <div class="modal fade bd-example-modal-lg" id="productID{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            @php
                              $product = \App\Models\Product::where('id', $product->id)->first();
                            @endphp
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">{{$product->name}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <strong>Summary:</strong>
                              <p>{!! html_entity_decode($product->summary) !!}</p>
                              <strong>Description:</strong>
                              <p>{!! html_entity_decode($product->description) !!}</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                <!-- end of modal to show product details--->
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
        url:"{{route('product.status')}}",
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
      $('#productbl').DataTable();
  } );
</script>
@endsection