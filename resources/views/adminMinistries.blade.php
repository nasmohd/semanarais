@extends('layouts.Adminapp')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-7 col-xs-10">
			{{-- {!! Form::open(['action' => 'ComplaintsController@create', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}
				{{-- <div class="form-group">
					{{Form::submit('Create new', ['class' => 'btn btn-primary'])}}

				</div> --}}
			{{-- {!! Form::close() !!} --}}
			<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-default">
                  Add Ministry
            </button>


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

									{{-- <div class="form-group">
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
										 
									</div> --}}

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
                <div class="card-header" style="background-color: #3490DC; color:white;"><h4>{{ __('Ministries Registered') }}</h4></div>

                <div class="card-body">
					<table class="table table-responsive table-hover table-striped">
						<thead>
							<tr> <!-- Table Headings -->
								{{-- <th scope="col">#</th> --}}
								<th scope="col" style="width:30%">Ministry Name</th>
								<th scope="col" style="width:40%">Ministry Login Email</th>
								<th scope="col" style="width:25%">Ministry PIN</th>
								{{-- <th scope="col">Contents</th>
								<th scope="col">Ministry Concerned</th>
								<th scope="col">Comments</th>
								<th scope="col" class="text-center">Status </th> --}}
								<th scope="col" class="text-center" style="width:5%">Action </th>
						{{--  From the going down --}}
							</tr>
						</thead>

						<tbody id="myTable">
							
						@if(count($ministries) > 0)
							@foreach($ministries as $ministry)
						
						
								<tr>
									{{-- <th scope="row">{{ $complaint-> id }}</th> --}}
									<td>{{ $ministry-> name}}</td>
									<td>{{ $ministry-> email}} </td>
									<td> {{ $ministry-> pin}} </td>
									<td class="text-center" >
										{!!Form::open(['action' => ['App\Http\Controllers\AdminViewMinistries@destroy', $ministry->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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

						@if(count($ministries) == 0)
							<div class="alert alert-danger"> <i class="fas fa-exclamation-circle"></i>No Ministries Registered </div>
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
