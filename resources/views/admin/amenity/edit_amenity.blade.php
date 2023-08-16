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
            <a href="{{route('admin.all.amenity')}}" class="btn btn-inverse-info" >Back</a>
        </ol>
    
</nav>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 style="text-align: center;" class="card-title">Edit Amenity</h1>

                <form class="forms-sample" action="{{url('/admin/update/'.$types->id.'/amenity')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Amenity Name</label>
                        <input type="text" name="amenities_name" class="form-control"
                        @error('type_name')
                            is-invalid
                        @enderror
                         id="exampleInputUsername1"  value="{{$types->amenities_name}}">
                         @error('type_name')
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
