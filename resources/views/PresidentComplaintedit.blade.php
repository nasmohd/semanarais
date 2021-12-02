@extends('layouts.Presidentapp')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-xs-10">
			{{-- {!! Form::open(['action' => 'ComplaintsController@create', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}
				{{-- <div class="form-group">
					{{Form::submit('Create new', ['class' => 'btn btn-primary'])}}

				</div> --}}
			{{-- {!! Form::close() !!} --}}
			{{-- <form action="/complaint/{{$complaint-> id}}/update" method="POST"> --}}
				{{-- @csrf --}}
{!! Form::open (['action' => ['App\Http\Controllers\ComplaintsController@update', $complaint['complaints']->id],'method' => 'POST']) !!}

		<div class="modal-header" style="background-color: #306FA0; color:white;">
			<h4 class="modal-title pl-3 ml-1">Complaint Details</h4>
			{{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> --}}
			{{-- <span aria-hidden="true">&times;</span> --}}
			</button>
		</div>



		
		{{-- {{ csrf_field() }} --}}
		<div class="modal-body mb-5" style="background-color: #EBF3F9;">
			{{-- <form role="form"> --}}
				<div class="card-body">
					{{-- <div class="form-group">
						<label for="exampleInputEmail1">Your Name</label>
						<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
					</div> --}}


					<div class="form-group">
						<label for="Complaint">Ministry</label>
						<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Complaint" rows="3" name="title" value="{{ $complaint['complaints']-> ministry}}">
					</div>

					<div class="form-group">
						<label for="Complaint">Title (About)</label>
						<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Complaint" rows="3" name="title" value="{{ $complaint['complaints']-> title}}">
					</div>

					<div class="form-group">
						<label for="Complaint">Complaint details</label>
						<textarea class="form-control" name="body" placeholder="Enter Complaint" rows="6" style="resize:none;">{{ $complaint['complaints']-> body}}</textarea>
					</div>

				</div>
			<!-- /.card-body -->

			{{-- </form> --}}
		{{-- <p>One fine body&hellip;</p> --}}
		</div>
		

	<script type="text/javascript">
		var tx = document.getElementById("footr");
		// tx.style.position="";

		// $(document).ready(function () {
		// 	$('#text1').css({"background-color": "red"});
            // $('#sidebarCollapse').on('click', function () {
            //     $('#sidebar').addClass('active');
            //     $('.overlay').addClass('active');
            // });

            // $('#dismiss, #dismissClick, .dismissClick').on('click', function () {
            //     $('#sidebar').removeClass('active');
            //     $('.overlay').removeClass('active');
            // });
            
        // });

	</script>

	<style>
		#footr{
			position: relative !important;
		}

	</style>
		
</form>
{{-- {!! Form::close () !!} --}}

		</div></div>
	</div>
</div>
@endsection
