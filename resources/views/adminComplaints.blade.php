@extends('layouts.Adminapp')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-xs-10">
			{{-- {!! Form::open(['action' => 'ComplaintsController@create', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}
				{{-- <div class="form-group">
					{{Form::submit('Create new', ['class' => 'btn btn-primary'])}}

				</div> --}}
			{{-- {!! Form::close() !!} --}}
			{{-- <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-default">
                  Add new complaint
            </button> --}}

			<div class="modal fade" id="modal-default">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="background-color: #306FA0; color:white;">
							<h4 class="modal-title">New Complaint</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>


						{!! Form::open (['route' => 'Complaints_storeControllerURL']) !!}
						@csrf
						<div class="modal-body">
							{{-- <form role="form"> --}}
								<div class="card-body">
									{{-- <div class="form-group">
										<label for="exampleInputEmail1">Full Name</label>
										<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Full Name" name="full_name">
									</div> --}}

									<div class="form-group">
										<label>Ministry</label>
										<select class="form-control" name="ministry">
										@if(count($complaints['complaints']) > 0)
											@foreach($complaints['complaints'] as $complaint1)

												<option>{{ $complaint1->ministry_name }}</option>
											@endforeach
										@endif
										@if(count($complaints['complaints']) == 0)
											<option selected disabled> No Ministries yet! </option>

										@endif
										</select>
										{{-- </select>
											<option selected> {{ $complaint-> ministry}}</option>
											<option>option 1</option>
											<option>option 2</option>
											<option>option 3</option>
											<option>option 4</option>
											<option>option 5</option>
										</select> --}}
									</div>

									<div class="form-group">
										<label for="Complaint">About</label>
										<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Complaint" rows="3" name="title">
									</div>

									<div class="form-group">
										<label for="Complaint">Complaint</label>
										{{-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Complaint" rows="3" name="complaint"> --}}
										<textarea class="form-control" name="complaint" placeholder="Enter Complaint" rows="6" style="resize:none;"></textarea>
									</div>

								</div>
							<!-- /.card-body -->


							{{-- </form> --}}
						{{-- <p>One fine body&hellip;</p> --}}
						</div>

						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							{{Form::submit('Create new', ['class' => 'btn btn-primary', 'type' => 'button'])}}
							{{-- <button type="button" class="btn btn-primary">Submit</button> --}}
						</div>
						{!! Form::close () !!}
					</div>
				<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>

			

			<form class="d-none d-sm-inline-block form-inline ml-auto my-md-0 mw-100 navbar-search" style="border: 2px solid #3490DC; border-radius: 5px;">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="myInput">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <div class="mt-2">@include('inc.messages') </div>
          

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
			<div class="card mt-2">
                <div class="card-header pt-3" style="background-color: #3490DC; color:white;"><h5><i class="fas fa-envelope mr-2"></i>{{ __('Complaints Submitted by Users') }}</h5></div>

                <div class="card-body">
					<table class="table table-responsive table-hover table-striped">
						<thead>
							<tr> <!-- Table Headings -->
								{{-- <th scope="col">#</th> --}}
								<th scope="col"  style="width:25%">Title</th>
								<th scope="col" style="width:25%">Contents</th>
								<th scope="col" style="width:25%">Ministry Concerned</th>
								{{-- <th scope="col">Submitted On</th> --}}
								{{-- <th scope="col" style="width:20%">Comments</th> --}}
								<th scope="col" style="width:5%" class="text-center">Status </th>
								
								<th scope="col" class="text-center float-right"> Details </th>
								
								<th scope="col" style="width:5%" class="text-center">Action </th>

							</tr>
						</thead>

						
						<tbody id="myTable">
						{{--  From the going down --}}

						@if(count($complaints['complaints']) > 0)
							@foreach($complaints['complaints'] as $complaint)
								<tr>
									{{-- <th scope="row">{{ $complaint-> id }}</th> --}}
									<td>{{ $complaint-> title}}</td>
									<td >{{ $complaint-> body}}</td>
									<td >{{ $complaint-> ministry}}</td>
									{{-- <td style="width:20%">{{ $complaint-> created_at}}</td> --}}

									
									{{-- <td ><a href="#" class="btn-sm btn-info" data-toggle="tooltip" title="View Comments for this record"><span style="font-size:13px; color:white"><i class="fas fa-eye mr-1"></i>View</span></a></td> --}}
									
									<td  class="text-center">
										@if ($complaint->status == 0)
											<i class="fa fa-times" aria-hidden="true" style="color:red;" data-toggle="tooltip" title="Not yet resolved"></i>
											{{-- <a href="#" class="btn-sm btn-danger">X</a> --}}

										@endif

										@if ($complaint->status == 1)
											<i class="fas fa-check" style="color: #38C172" data-toggle="tooltip" title="This issue has been resolved"></i>
											{{-- <a href="#" class="btn-sm btn-success">&check;</a> --}}

										@endif

									</td>
									<td >
										<a href="/complaint/{{ $complaint-> id}}/Viewrecord" class="btn-sm btn-secondary float-right" data-toggle="tooltip" title="View all info for this record"> info </a>
									</td>

									<td >
										{!!Form::open(['action' => ['App\Http\Controllers\adminViewComplaints@destroy', $complaint->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
											{{Form::hidden('_method', 'DELETE')}}
											<button type="submit" class="btn btn-sm btn-danger ml-lg-2" data-toggle="tooltip" title="Delete this record!"><i class="fas fa-trash"></i> </button>

									</td>

									
								</tr>

								{{-- {!! Form::open(['action' => ['ComplaintsController@update', $complaint->id], 'enctype' => 'multipart/form-data']) !!} --}}
								{{-- <form {{ route('Complaints_updateControllerURL') }}>  --}}
								{!! Form::open (['action' => ['App\Http\Controllers\ComplaintsController@update', $complaint-> id], 'id' => 'EditForm_submit']) !!}
								<div class="modal fade" id="modal-edit{{ $complaint-> id}}">
									<div class="modal-dialog">
										<div class="modal-content" >
											<div class="modal-header" style="background-color: #6C757D; color:white;">
												<h4 class="modal-title">Edit Complaint</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>

											
											{{-- {{ csrf_field() }} --}}
											<div class="modal-body">
												{{-- <form role="form"> --}}
													<div class="card-body">
														{{-- <div class="form-group">
															<label for="exampleInputEmail1">Your Name</label>
															<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
														</div> --}}

														<div class="form-group">
															<label>Ministry</label>
															<select class="form-control" name="ministry">
															@if(count($complaints['complaints']) > 0)
																@foreach($complaints['complaints'] as $complaint1)

																	<option>{{ $complaint1->ministry_name }}</option>

																@endforeach
															@endif

															{{-- </select>
																<option selected> {{ $complaint-> ministry}}</option>
																<option>option 1</option>
																<option>option 2</option>
																<option>option 3</option>
																<option>option 4</option>
																<option>option 5</option>
															</select> --}}
														</div>

														<div class="form-group">
															<label for="Complaint">About</label>
															<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Complaint" rows="3" name="title" value="{{ $complaint-> title}}">
														</div>

														<div class="form-group">
															<label for="Complaint">Complaint</label>
															<textarea class="form-control" name="body" placeholder="Enter Complaint" rows="6" style="resize:none;">{{ $complaint-> body}}</textarea>
														</div>

													</div>
												<!-- /.card-body -->

												{{-- </form> --}}
											{{-- <p>One fine body&hellip;</p> --}}
											</div>

											<div class="modal-footer justify-content-between">

												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												{{Form::hidden('_method', 'PUT')}}
												{{Form::submit('Update', ['class' => 'btn btn-secondary', 'type' => 'button', 'onclick' => 'EditForm_submit()'])}}
												{{-- <button type="button" class="btn btn-secondary">Update</button> --}}
											</div>

											
										</div>
									<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								{!! Form::close () !!}
								{{-- </form> --}}

								{{-- <form action="dashboard?2" method="POST"> --}}
								{{-- {!! Form::open (['action' => ['App\Http\Controllers\ComplaintsController@destroy', $complaint-> id],'method' => 'POST', 'id' => 'Delete_Form']) !!} --}}
								<div class="modal fade mt-5" id="modal-delete{{ $complaint-> id}}">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header" style="background-color: #E3342F; color:white;">
												<h4 class="modal-title">Delete Complaint</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body">
												<p> Are you sure? </p>
											{{-- <p>One fine body&hellip;</p> --}}
											</div>

											<div class="modal-footer justify-content-between">
												
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-danger">Delete</button>
											</div>
										</div>
									<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								{{-- {!! Form::close() !!} --}}
							</form>

							@endforeach
						@endif
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
	</div></div>
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
