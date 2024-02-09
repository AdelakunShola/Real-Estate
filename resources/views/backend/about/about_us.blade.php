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

			<form method="POST" action="{{ route('update.about') }}" class="forms-sample" enctype="multipart/form-data">
				@csrf
 
 <input type="hidden" name="id" value="{{ $about->id }}">
 




 <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title"  class="form-control" value="{{ $about->title }}">
            </div>
        </div><!-- Col -->
        <div class="col-sm-6">
            <div class="mb-3">
                <label class="form-label">Years of Experience</label>
                <input type="text" name="yofexperience"  class="form-control" value="{{ $about->yofexperience }}" >
            </div>
        </div><!-- Col -->
        

    </div><!-- Row -->



      <div class="col-sm-12">
            <div class="mb-3">
                <label class="form-label">Long Description</label>

                <textarea name="desc" class="form-control" name="tinymce" id="tinymceExample" rows="10">
 {!! $about->desc !!} 

                </textarea>
                 
            </div>
        </div><!-- Col -->




        <div class="row">

        <div class="col-sm-6">
        <div class="mb-3">
 <label for="exampleInputEmail1" class="form-label">Image   </label>
   <input class="form-control"  name="image" type="file" id="image">
        </div>

  <div class="mb-3">
 <label for="exampleInputEmail1" class="form-label">    </label>
  <img id="showImage" class="wd-80 " src="{{ asset($about->image) }}" alt="profile">
        </div>
        </div>




        </div><!-- Row -->



				 
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