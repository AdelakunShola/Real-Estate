@extends('agent.agent_dashboard')
@section('agent')
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

			<form method="POST" action="{{  route('store.agent.ad') }}" class="forms-sample" enctype="multipart/form-data">
				@csrf
 
 
<div class="row">
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="form-label">Ad Title   </label>
                <input type="text" name="title" class="form-control"  >
            </div>
        </div><!-- Col -->

        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="form-label">Ads Type</label>
               <select name="type" class="form-select" id="exampleFormControlSelect1">
                <option selected="" disabled="">Select Status</option>
                <option value="VideoAds">VideoAds</option>
                <option value="ImageAds">ImageAds</option>
               
            </select>
            </div>
        </div><!-- Col -->
</div>




<div class="row">
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="form-label">Ad URL   </label>
                <input type="text" name="url" class="form-control"  >
            </div>
        </div><!-- Col -->


    


        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="form-label">Image Ads Dimension</label>
               <select name="image_dimension" class="form-select" id="exampleFormControlSelect1">
                <option selected="" disabled="">Select Status</option>
                <option value="Vertical 370 x 580">Vertical 370 x 580</option>
                <option value="Square 370 x 275">Square 370 x 275</option>
                <option value="Square 370 x 275">Square 370 x 275</option>
                <option value="Horizontal 770 x 275">Horizontal 770 x 275</option>
            </select>
            </div>
        </div><!-- Col -->
</div>


  



<div class="row">
<div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="form-label">Main Thambnail </label>
                <input type="file" name="image" class="form-control" onChange="mainThamUrl(this)"  required>

                <img src="" id="mainThmb">

            </div>
        </div><!-- Col -->

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
    function mainThamUrl(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
              $('#mainThmb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    } 
 </script>

@endsection