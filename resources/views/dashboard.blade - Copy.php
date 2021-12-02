@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-xs-10">
			{{-- {!! Form::open(['action' => 'ComplaintsController@create', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}
				{{-- <div class="form-group">
					{{Form::submit('Create new', ['class' => 'btn btn-primary'])}}

				</div> --}}
			{{-- {!! Form::close() !!} --}}
			<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-default">
                  Add new complaint
            </button>

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
										@if(count($complaints['ministries']) > 0)
											@foreach($complaints['ministries'] as $complaint1)

												<option>{{ $complaint1->ministry_name }}</option>
											@endforeach
										@endif
										@if(count($complaints['ministries']) == 0)
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

			

			

			{{-- <p> ABC </p> --}}
			<div class="card">
                <div class="card-header" style="background-color: #3490DC; color:white;">{{ __('Complaints') }}</div>

                <div class="card-body">
					<table class="table table-responsive table-hover">
						<thead>
							<tr> <!-- Table Headings -->
								<th scope="col">#</th>
								<th scope="col">Title</th>
								<th scope="col">Contents</th>
								<th scope="col">Ministry Concerned</th>
								<th scope="col">Submitted On</th>
								<th scope="col">Comments</th>
								<th scope="col">Action</th>
								<th scope="col">Status </th>
							</tr>
						</thead>
						<tbody>
						{{--  From the going down --}}

						@if(count($complaints['complaints']) > 0)
							@foreach($complaints['complaints'] as $complaint)
								<tr>
									<th scope="row">{{ $complaint-> id }}</th>
									<td>{{ $complaint-> title}}</td>
									<td style="width:25%">{{ $complaint-> body}}</td>
									<td style="width:22%">{{ $complaint-> ministry}}</td>
									<td style="width:15%">{{ $complaint-> created_at}}</td>
									<td>{{ $complaint-> title}}</td>
									<td style="width:20%;">
										{{-- <form> --}}
											{{-- <a type="button" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-edit{{ $complaint-> id}}"> Edit </a> --}}
										
										<div class="col">
										<div class="row">
											<a href="/complaint/{{ $complaint-> id}}/edit" type="button" class="btn btn-sm btn-secondary"> Edit </a>

											{!!Form::open(['action' => ['App\Http\Controllers\ComplaintsController@destroy', $complaint->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
											{{Form::hidden('_method', 'DELETE')}}
											<button type="submit" class="btn btn-sm btn-danger ml-lg-2"> Delete </button>

											{{-- <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{ $complaint-> id}}"> Delete </button> --}}

											{!! Form::close() !!}
										{{-- </form> --}}
										</div>
										</div>
									</td>
									<td style="width:20%">XY</td>
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
															@if(count($complaints['ministries']) > 0)
																@foreach($complaints['ministries'] as $complaint1)

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
