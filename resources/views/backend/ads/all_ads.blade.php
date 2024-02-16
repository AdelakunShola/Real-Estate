@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
	  
    <button type="button" class="btn btn-inverse-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Category
</button>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Blog Category All </h6>
               
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>Sl </th>
                        <th>Type </th>
                        <th>Image</th>
                        <th>Title </th>
                        <th>Url</th>
                        <th>Duration </th>
                        <th>status </th>
                        <th>Action </th> 
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($allAds as $key => $item)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->type }}</td>
                        <td><img src="{{ asset($item->image) }}" style="width:70px;height: 40px; border-radius: 0;"> </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->url }}</td>
                        <td>{{ $item->duration }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
         
       <a href="" class="btn btn-inverse-danger" id="edit"> Edit  </a>
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









@endsection