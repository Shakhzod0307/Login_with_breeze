

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
           
            <a href="{{route('admin.export.excel')}}" class="btn btn-inverse-danger" >Download Xlsx</a>&nbsp;&nbsp;&nbsp;
           
        </ol>
</nav>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 style="text-align: center;" class="card-title">Import Xlsx</h1>
                <label for="exampleInputUsername1" class="form-label">import file</label>
                <form class="forms-sample" action="{{url('/admin/store/property')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                       
                        <input type="file" name="file" class="form-control"
                        @error('type_name')
                            is-invalid
                        @enderror
                         id="exampleInputUsername1" 
                         @error('type_name')
                            <span class="text-danger">{{$message}}</span>   
                         @enderror
                       
                    </div>



                    <button type="submit" class="btn btn-inverse-warning my-3">Upload</button>
                 
                </form>

            </div>
        </div>
	</div>
</div>

@endsection
