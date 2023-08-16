@extends('admin.admin_dashboard')

@section('content')

<div class="page-content">


<nav class="page-breadcrumb">
    
            @if(session('success'))
                <div style="text-align: center;" class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
   
        <ol class="breadcrumb">
            <a href="{{route('admin.all.property')}}" class="btn btn-inverse-info" >Back</a>
        </ol>
    
</nav>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 style="text-align: center;" class="card-title">Edit Property</h1>

                <form class="forms-sample" action="{{url('/admin/update/'.$types->id.'/property')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Property Name</label>
                        <input type="text" name="type_name" class="form-control"
                        @error('type_name')
                            is-invalid
                        @enderror
                         id="exampleInputUsername1"  value="{{$types->type_name}}">
                         @error('type_name')
                            <span class="text-danger">{{$message}}</span>   
                         @enderror
                       
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">Property Icon Name</label>
                        <input type="text" name="type_icon" class="form-control"
                        @error('type_icon')
                            is-invalid
                        @enderror
                        id="icon" value="{{$types->type_icon}}">
                        @error('type_icon')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                 
                </form>

            </div>
        </div>
	</div>
</div>

@endsection
