@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
	  
    <button type="button" class="btn btn-inverse-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Partner
</button>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">All Partner </h6>
               
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Sl </th>
                        <th>Image </th>
                        
                        <th>Action </th> 
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($partners as $key => $item)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td><img src="{{ asset($item->image) }}" style="width:70px; height:40px;"></td>
                        
                        <td>
         
        

       <a href="{{ route('delete.partner',$item->id) }}" class="btn btn-inverse-danger" id="delete"> Delete  </a>
                        </td> 
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
					</div>
				</div>

			</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Partner</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">

        <form method="POST" action="{{ route('store.partner') }}" class="forms-sample" enctype="multipart/form-data">
        @csrf
 

        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="form-label">Partner Logo </label>
                <input type="file" name="image" class="form-control" onChange="mainImageUrl(this)"  >

                <img src="" id="mainImage">

            </div>
        </div><!-- Col -->
     

      </div> 
      <div class="modal-footer">
        
    <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
   </form>

    </div>
  </div>
</div>






<script type="text/javascript">
    function mainImageUrl(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
              $('#mainImage').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    } 
 </script>



@endsection