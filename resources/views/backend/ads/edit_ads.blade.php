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

			<h6 class="card-title">Add Post   </h6>

			<form method="POST" action="{{ route('update.ads', ['id' => $ads->id]) }}" class="forms-sample" enctype="multipart/form-data">
				@csrf

                <input type="hidden" name="id" value="{{ $ads->id }}">
 
 
<div class="row">
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="form-label">Ad Title   </label>
                <input type="text" name="title" class="form-control" value="{{ $ads->title }}" >
            </div>
        </div><!-- Col -->

        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="form-label">Ads Type</label>
               <select name="type" class="form-select" id="exampleFormControlSelect1">
               
                
                <option value="{{ $ads->type }}">{{ $ads->type }}</option>
               
            </select>
            </div>
        </div><!-- Col -->
</div>


<div class="row">
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="form-label">Ad URL   </label>
                <input type="text" name="url" class="form-control" value="{{ $ads->url }}"  >
            </div>
        </div><!-- Col -->


    


        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="form-label">Image Dimension</label>
               <select name="image_dimension" class="form-select" id="exampleFormControlSelect2">
               
                
                <option value="{{ $ads->Image_dimension }}">{{ $ads->Image_dimension }}</option>
               
            </select>
            </div>
        </div><!-- Col -->
</div>




  



<div class="row">
<div class="col-sm-6">
<div class="mb-3">
 <label for="exampleInputEmail1" class="form-label">Post Photo   </label>
   <input class="form-control"  name="post_image" type="file" id="image">
        </div>

  <div class="mb-3">
 <label for="exampleInputEmail1" class="form-label">    </label>
  <img id="showImage" class="wd-80 rounded-circle" src="{{ asset($ads->image) }}" alt="profile">
        </div>
</div>

<div class="col-sm-6">
<div class="form-group mb-3">
                <label class="form-label">Status  </label>
                <input type="text" name="status" class="form-control" value="{{ $ads->status }}"  >
            </div>
</div>

</div>


				 
	 <button type="submit" class="btn btn-primary me-2">Save Changes </button>
			 
			</form>

              </div>
            </div>




            </div>
          </div>
          <!-- middle wrapper end -->
          <!-- right wrapper start -->
         
          <!-- right wrapper end -->
        </div>

			</div>
 
            <script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });


</script>

@endsection