@extends('layouts.Adminapp')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-11 col-12">
			{{-- {!! Form::open(['action' => 'ComplaintsController@create', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}
				{{-- <div class="form-group">
					{{Form::submit('Create new', ['class' => 'btn btn-primary'])}}

				</div> --}}
			{{-- {!! Form::close() !!} --}}
			


            <div class="row alert alert-success pb-4">
            	{{-- <div class="col-12 ml-lg-2 pb-2"> --}}
					{{-- <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-default">
		                  Add User
		            </button> --}}
        		{{-- </div> --}}

        		<div class="col-md-4 col-12 mt-2">
        			<div class="card bg-info text-white">
						<h5 class="card-header">Registered Users</h5>
						<div class="card-body">
							<h5 class="card-title" style="font-size:20px; font-weight: 700;">{{ $data['UserCount'] }} Users <i class="fas fa-user float-right fa-lg"></i></h5>
							{{-- <p class="card-text text-white">With supporting text below as a natural lead-in to additional content.</p> --}}
							{{-- <hr --}}
							{{-- <a href="#" class="">Add User</a> --}}
						</div>
						<div class="card-body btn" style="background-color: #186EB4; color:white;">
							<a href="/AdminViewUsers" class=""><i class="fas fa-arrow-right mr-2"></i>View Users</a>
							{{-- <a href="#" class="float-left"><i class="fas fa-plus mr-2"></i>Add User</a>
							<a href="#1" class="float-right"><i class="fas fa-minus mr-2"></i>Remove User</a> --}}
						</div>

					</div>
        		</div>

        		<style type="text/css">
        			.fas:hover{
        				transform: scale(1.2);
        			}

        			.c-info:hover{
        				background-color: #127887;
        			}

        		</style>

				
            	<div class="col-md-4 col-12 mt-2">
        			<div class="card bg-danger text-white">
						<h5 class="card-header">Complaints</h5>
						<div class="card-body">
							<h5 class="card-title" style="font-size:20px; font-weight: 700;">{{ $data['ComplaintCount'] }} Complaints<i class="fas fa-envelope float-right fa-lg"></i></h5>
							{{-- <p class="card-text text-white">With supporting text below as a natural lead-in to additional content.</p> --}}
							{{-- <hr> --}}
							{{-- <a href="#" class="btn btn-primary">View Complaints</a> --}}
						</div>
						<div class="card-body c-info btn" style="background-color: #B41E18; color:white;">
							<a href="/complaints/view" class=""><i class="fas fa-arrow-right mr-2"></i>View Complaints</a>
						</div>
						{{-- <div class="card-body">
							<a href="#" class="btn btn-primary">Add User</a>
						</div> --}}
					</div>
        		</div>

        		<div class="col-md-4 col-12 mt-2">
        			<div class="card text-white" style="background-color: #5C6670">
						<h5 class="card-header">Ministries</h5>
						<div class="card-body">
							<h5 class="card-title" style="font-size:20px; font-weight: 700;">{{ $data['MinistryCount'] }} Ministries<i class="fas fa-building fa-lg float-right"></i></h5>
							{{-- <p class="card-text text-white">With supporting text below as a natural lead-in to additional content.</p> --}}
							{{-- <hr> --}}
							{{-- <a href="#" class="">Add Ministry</a> --}}
						</div>

						<div class="card-body c-info btn" style="background-color: #343A40; color:white;">
							<a href="/AdminViewMinistries" class=""><i class="fas fa-arrow-right mr-2"></i>View Ministries</a>
							{{-- <a href="#" class="float-left" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus mr-2"></i>Add Ministry</a>
							<a href="#1" class="float-right"><i class="fas fa-minus mr-2"></i>Remove Ministry</a> --}}
						</div>

						<div class="modal fade" id="modal-default">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="background-color: #5C6670; color:white;">
							<h4 class="modal-title">New Ministry</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>

						
						{!! Form::open (['route' => 'AdminAddMinistryControllerURL']) !!}
						@csrf
						<div class="modal-body" style="color:black;" id="modal-body1">
							{{-- <form role="form"> --}}
								<div class="card-body">
									{{-- <div class="form-group">
										<label for="exampleInputEmail1">Full Name</label>
										<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Full Name" name="full_name">
									</div> --}}

									<div class="form-group">
										<label>Ministry Name</label>
										<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Ministry" rows="3" name="ministry_name" required>
										{{-- <select class="form-control" name="ministry">
										<option>Ministry of Work</option>
										<option>Ministry of Education</option>
										</select> --}}
									</div>

									<div class="form-group">
										<label for="Complaint">Ministry Code</label>
										<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ministry Code" name="ministry_code"> 
									</div>

									<div class="form-group">
										<label for="Complaint" id="minpin">Ministry PIN</label>

										<div class="container">
											<div class="row">
												<div class="col-xs-6"><input type="text" class="form-control" id="ministry_pin" placeholder="Ministry PIN" name="ministry_pin"></div>

												<div class="col-xs-6 mt-2 ml-2"><a href="javascript:gfg_Run()" id="linkx" style="color: #306FA0">Generate PIN </a></div>
											</div>
										</div>
										 
									</div>

									<script type="text/javascript">
										var modal = document.getElementById("modal-default");
										modal.modal('show');


								        var ministry_pin = document.getElementById("ministry_pin");
								  
								        /* Function to generate combination of password */
								        function generateP() {
								            var pass = '';
								            var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' + 'abcdefghijklmnopqrstuvwxyz0123456789@#$';
								              
								            for (i = 1; i <= 8; i++) {
								                var char = Math.floor(Math.random()
								                            * str.length + 1);
								                  
								                pass += str.charAt(char)
								            }
								            alert(pass);
								            return pass;
								        }
								  
								        function gfg_Run() {
								            ministry_pin.value = generateP();
								        }
								    </script>

									<style type="text/css">
										div #linkx{
											color: red;
										}


									</style>

									{{-- <div class="form-group">
										<label for="Complaint">Complaint</label>
										<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Complaint" rows="3" name="complaint">
										<textarea class="form-control" name="complaint" placeholder="Enter Complaint" rows="6" style="resize:none;"></textarea>
									</div> --}}

								</div>
							<!-- /.card-body -->


							{{-- </form> --}}
						{{-- <p>One fine body&hellip;</p> --}}
						</div>

						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							{{Form::submit('Create new', ['class' => 'btn btn-dark', 'type' => 'button'])}}
							{{-- <button type="button" class="btn btn-primary">Submit</button> --}}
						</div>
						{!! Form::close () !!}
					</div>
				<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
						{{-- <div class="card-body">
							<a href="#" class="btn btn-primary">Add User</a>
						</div> --}}
					</div>
        		</div>

			</div>


			

			

			


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
