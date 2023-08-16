@extends('admin.admin_dashboard')

@section('content')

<div class="page-content">
            @if(session('success'))
                <div style="text-align: center;" class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{route('admin.add.amenity')}}" class="btn btn-inverse-info" >Add New Amenity</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Amenity All Table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>N</th>
                                <th>Amenity Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($types as $type)                                                                   
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$type->amenities_name}}</td>
     
                                    <td>
                                        <a href="{{route('admin.edit.amenity',$type->id)}}"
                                          class="btn btn-inverse-warning" >Edit</a>
                                        <a onclick="return confirm('Are You sure to delete this Amenity?')"
                                         href="{{url('/admin/delete/'.$type->id.'/amenity')}}" class="btn btn-inverse-danger" >Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
