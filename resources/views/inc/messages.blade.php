

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif

@if(session('deleted'))
    <div class="alert alert-danger">
        {{session('deleted')}}
    </div>
@endif