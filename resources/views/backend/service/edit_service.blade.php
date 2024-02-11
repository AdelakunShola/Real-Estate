@extends('admin.admin_dashboard')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="page-content">

       
        <div class="row profile-body">
          <!-- left wrapper start -->
          
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
             <div class="card">
              <div class="card-body">

			<h6 class="card-title">Edit Post   </h6>


     
        <form method="POST" action="{{ route('update.services', ['id' => $service->id]) }}" class="forms-sample">
        @csrf
 
        
    <!-- Some content here -->
    <input type="hidden" name="id" value="{{ $service->id }}">
    <!-- Some more content here -->


    <div class="form-group mb-3">
 <label for="exampleInputEmail1" class="form-label">Icon </label>
        <input type="text" name="icon" class="form-control" value="{{ $service->icon }}" >
           
        </div> 

        <div class="form-group mb-3">
 <label for="exampleInputEmail1" class="form-label">Title </label>
        <input type="text" name="title" class="form-control" value="{{ $service->title }}" >
           
        </div> 

        <div class="form-group mb-3">
 <label for="exampleInputEmail1" class="form-label">Short_desc </label>
        <input type="text" name="short_desc" class="form-control" value="{{ $service->short_desc }}">
           
        </div> 

   
     

      </div> 
      <div class="modal-footer">
        
    <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
   </form>


   

              </div>
            </div>




            </div>
          </div>
          <!-- middle wrapper end -->
          <!-- right wrapper start -->
         
          <!-- right wrapper end -->
        </div>

			
 


@endsection