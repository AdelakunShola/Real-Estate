@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
	  
    <button type="button" class="btn btn-inverse-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Service
</button>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">All Services </h6>
               
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Sl </th>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Short_desc</th>
                        <th>Action </th> 
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($services as $key => $item)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->icon }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->short_desc }}</td>
                        <td>
         


       <a href="{{ route('edit.services',$item->id) }}" class="btn btn-inverse-danger"> Edit  </a>

       <a href="" class="btn btn-inverse-danger" id="delete"> Delete  </a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">

        <form method="POST" action="{{ route('store.services') }}" class="forms-sample">
        @csrf
 

        <div class="form-group mb-3">
 <label for="exampleInputEmail1" class="form-label">Icon </label>
        <input type="text" name="icon" class="form-control" >
           
        </div> 

        <div class="form-group mb-3">
 <label for="exampleInputEmail1" class="form-label">Title </label>
        <input type="text" name="title" class="form-control" >
           
        </div> 

        <div class="form-group mb-3">
 <label for="exampleInputEmail1" class="form-label">Short_desc </label>
        <input type="text" name="short_desc" class="form-control" >
           
        </div> 
     

      </div> 
      <div class="modal-footer">
        
    <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
   </form>

    </div>
  </div>
</div>










@endsection