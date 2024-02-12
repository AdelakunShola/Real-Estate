@extends('agent.agent_dashboard')
@section('agent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@php
$id = Auth::user()->id;
$agentId = App\Models\User::find($id);
$status = $agentId->status;
$totalProperty = App\Models\Property::where('agent_id', $id)->latest()->get();
$sRequest = App\Models\Schedule::where('agent_id',$id)->latest()->get();
$usermsg = App\Models\Schedule::where('agent_id',$id)->get();
$property = App\Models\Property::where('agent_id',$id)->latest()->get();
@endphp

 <div class="page-content">


    @if($status === 'active')
    <h4>Agent Account Is <span class="text-success">Active </span> </h4>

    @else
 <h4>Agent Account Is <span class="text-danger">Inactive </span> </h4>
 <p class="text-danger"><b> Plz wait admin will check and approve your account</b></p>
    @endif


        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
              <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
              <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
            </div>
            <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="printer"></i>
              Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="download-cloud"></i>
              Download Report
            </button>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Total Property</h6>
                     
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{ count($totalProperty) }}</h3>
                        
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Schedule Request</h6>
                    
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">{{ count($sRequest) }}</h3>
                        
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Page Views</h6>
                      
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2">%</h3>
                        
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                      </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- row -->

        
        <div class="row">
          <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Monthly SCHEDULED REQUEST</h6>
                 
                </div>
                <p class="text-muted">Sales are activities related to selling or the number of goods or services sold in a given time period.</p>
                <canvas id="monthlySalesChart"></canvas>
              </div> 
            </div>
          </div>
          
        </div> <!-- row -->

        

        <div class="row">
          <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Live Chat</h6>
                  
                </div>
                <div class="d-flex flex-column">
                  
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-xl-8 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Recent Scheduled Request</h6>
                  
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th class="pt-0">#</th>
                        <th class="pt-0">User</th>
                        <th class="pt-0">Property</th>
                        <th class="pt-0">Date</th>
                        <th class="pt-0">Time</th>
                        <th class="pt-0">Status</th>
                        <th class="pt-0">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($usermsg as $key => $item)
                      <tr>
                        <td>{{ $key+1 }}</td> 
                        <td>{{ $item['user']['name'] }}</td> 
                        <td>{{ $item['property']['property_name'] }}</td> 
                        <td>{{ $item->tour_date }}</td> 
                        <td>{{ $item->tour_time }}</td> 
                        <td> 
                      @if($item->status == 1)
                <span class="badge rounded-pill bg-success">Confirm</span>
                      @else
               <span class="badge rounded-pill bg-danger">Pending</span>
                      @endif

                        </td> 
                        <td>

        <a href="{{ route('agent.details.schedule',$item->id) }}" class="btn btn-inverse-info" title="Details"> <i data-feather="eye"></i> </a>
  
       <a href="{{ route('agent.delete.property',$item->id) }}" class="btn btn-inverse-danger" id="delete" title="Delete"> <i data-feather="trash-2"></i>  </a>
                        </td> 
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>
              </div> 
            </div>
          </div>
        </div> <!-- row -->






        <br/><hr/>







        <div class="col-lg-7 col-xl-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Recent Properties</h6>
                  
                </div>
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                  <thead>
                      <tr>
                        <th>Sl </th>
                        <th>Image </th> 
                        <th>Name </th> 
                        <th>P Type </th> 
                        <th>Status Type </th> 
                        <th>City </th> 
                        <th>Code </th> 
                        <th>Status </th>  
                        <th>Action </th> 
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($property as $key => $item)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td><img src="{{ asset($item->property_thambnail) }}" style="width:70px; height:40px; border-radius: 0;"> </td> 
                        <td>{{ $item->property_name }}</td> 
                        <td>{{ $item['type']['type_name'] }}</td> 
                        <td>{{ $item->property_status }}</td> 
                        <td>{{ $item->city }}</td> 
                        <td>{{ $item->property_code }}</td> 
                        <td> 
                      @if($item->status == 1)
                <span class="badge rounded-pill bg-success">Active</span>
                      @else
               <span class="badge rounded-pill bg-danger">InActive</span>
                      @endif

                        </td> 
                        <td>

        <a href="{{ route('agent.details.property',$item->id) }}" class="btn btn-inverse-info" title="Details"> <i data-feather="eye"></i> </a>

       <a href="{{ route('agent.edit.property',$item->id) }}" class="btn btn-inverse-warning" title="Edit"> <i data-feather="edit"></i> </a>

       <a href="{{ route('agent.delete.property',$item->id) }}" class="btn btn-inverse-danger" id="delete" title="Delete"> <i data-feather="trash-2"></i>  </a>
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


      <script>
    // Get the data for the Monthly Sales chart
    var monthlySalesChartData = {
        labels: {!! json_encode($sRequest->pluck('tour_date')->map(function($date) {
            return \Carbon\Carbon::parse($date)->format('M');
        })) !!},
        datasets: [{
            label: 'Number of Scheduled Requests',
            data: {!! json_encode($sRequest->groupBy(function($item) {
                return \Carbon\Carbon::parse($item->tour_date)->format('M');
            })->map->count()->values()) !!},
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    // Chart configuration for Monthly Sales chart
    var monthlySalesChartConfig = {
        type: 'bar',
        data: monthlySalesChartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    };

    // Create the Monthly Sales chart
    var monthlySalesChartCtx = document.getElementById('monthlySalesChart').getContext('2d');
    var monthlySalesChart = new Chart(monthlySalesChartCtx, monthlySalesChartConfig);
</script>








@endsection