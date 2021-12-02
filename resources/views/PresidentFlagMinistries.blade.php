@extends('layouts.Adminapp')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 col-xs-10">
			{{-- {!! Form::open(['action' => 'ComplaintsController@create', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}
				{{-- <div class="form-group">
					{{Form::submit('Create new', ['class' => 'btn btn-primary'])}}

				</div> --}}
			{{-- {!! Form::close() !!} --}}
			{{-- <div class=""> xd </div> --}}
			{{-- <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-default">
                  Add Ministry
            </button> --}}

			

			<div class="row mr-lg-1 mb-lg-2">
			<form class="d-none d-sm-inline-block form-inline ml-auto my-md-0 mw-100 navbar-search float-right" style="border: 2px solid #3490DC; border-radius: 5px;">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="myInput">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
          </div>

          @include('inc.messages')

          <script type="text/javascript">
				$(document).ready(function(){
					$("#myInput").on("keyup", function() {
						var value = $(this).val().toLowerCase();
						$("#myTable tr").filter(function() {
							$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
						});
					});
				});

          </script>


			{{-- <p> ABC </p> --}}
			<div class="card">
                <div class="card-header" style="background-color: #3490DC; color:white;"><h4>{{ __('Ministry Flag count') }}</h4></div>

                <div class="card-body">
					<table class="table table-responsive table-hover table-striped">
						<thead>
							<tr> <!-- Table Headings -->
								{{-- <th scope="col">#</th> --}}
								<th scope="col" style="width:50%">Ministry</th>
								<th scope="col" style="width:90%">Count</th>
								{{-- <th scope="col">Contents</th>
								<th scope="col">Ministry Concerned</th>
								<th scope="col">Comments</th>
								<th scope="col" class="text-center">Status </th> --}}
								<th scope="col" class="text-center" style="width:10%">Action </th>
						{{--  From the going down --}}
							</tr>
						</thead>

						<tbody id="myTable">
							
						@if(count($flags) > 0)
							@foreach($flags as $users)
								<tr>
									{{-- <th scope="row">{{ $complaint-> id }}</th> --}}
									<td >{{ $users-> ministry_id}}</td>
									<td >{{ $users-> min_count}}</td>
									<td class="text-center" >
										{!!Form::open(['action' => ['App\Http\Controllers\PresidentMinistryInfo@destroy', $users->ministry_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
											{{Form::hidden('_method', 'DELETE')}}
											<button type="submit" class="btn btn-sm btn-danger ml-lg-2"> <i class="fas fa-trash"></i>  </button>

											{{-- <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{ $complaint-> id}}"> Delete </button> --}}

											{!! Form::close() !!}


									{{-- <a href="#" class="btn-sm btn-danger"> Delete </a></td> --}}
								</tr>



								{{-- {!! Form::open(['action' => ['ComplaintsController@update', $complaint->id], 'enctype' => 'multipart/form-data']) !!} --}}
								{{-- <form {{ route('Complaints_updateControllerURL') }}>  --}}
								
									
								{{-- </form> --}}

								{{-- <form action="dashboard?2" method="POST"> --}}
								{{-- {!! Form::open (['action' => ['App\Http\Controllers\ComplaintsController@destroy', $complaint-> id],'method' => 'POST', 'id' => 'Delete_Form']) !!} --}}
								
								{{-- {!! Form::close() !!} --}}
							{{-- </form> --}}

							@endforeach
						@endif

						{{-- @if(count($users) < 1)
							<div class="alert alert warning"> No Users </div>
						@endif --}}
						</tbody>


					<script type="text/javascript">
						// $(document).ready(function(){	
						// 	$("#Delete_Form").submit(function(event){
						// 		submitForm();
						// 		return false;
						// 	});
						// });

						// function submitForm(){
						// 	 $.ajax({
						// 		type: "POST",
						// 		url: "saveContact.php",
						// 		cache:false,
						// 		data: $('form#contactForm').serialize(),
						// 		success: function(response){
						// 			$("#contact").html(response)
						// 			$("#contact-modal").modal('hide');
						// 		},
						// 		error: function(){
						// 			alert("Error");
						// 		}
						// 	});
						// }
						// var request;
						// var form = $("EditForm_submit");

						// var data = {
						//     'ministry': form.find('input[name="ministry"]').val(),
						//     'title': form.find('input[name="title"]').val(),
						//     'body': form.find('input[name="body"]').val()
						// };
						// var headers = {
						//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						// }
						// request = $.ajax({
						//     url: "/update",
						//     type: "post",
						//     headers: headers,
						//     data: data
						// });
						// request.done(function (){
						//     console.log("It works!");
						// });

						function EditForm_submit(){
							document.getElementById("EditForm_submit").submit();
						// 	alert("clicked");
						// }

					</script>
							
							
					</table>


                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    
                   
                </div>
            </div>



</div>
		</div>
	</div>

</div>
@endsection

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
