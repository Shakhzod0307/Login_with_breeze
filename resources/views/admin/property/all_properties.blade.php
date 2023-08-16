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
            <a href="{{route('admin.add.property')}}" class="btn btn-inverse-info" >Add Property Type</a>&nbsp;&nbsp;&nbsp;
            <a href="{{route('admin.import.excel')}}" class="btn btn-inverse-danger" >Import</a>&nbsp;&nbsp;&nbsp;
            <a href="{{route('admin.export.excel')}}" class="btn btn-inverse-warning" >Export</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Property All Table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>N</th>
                                <th>Type Name</th>
                                <th>Type Icon</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($types as $type)                                                                   
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$type->type_name}}</td>
                                    <td>{{$type->type_icon}}</td>
                                    <td>
                                        <a href="{{route('admin.edit.property',$type->id)}}"
                                          class="btn btn-inverse-warning" >Edit</a>
                                        <a onclick="return confirm('Are You sure to delete this Property?')"
                                         href="{{route('admin.delete.property',$type->id)}}" class="btn btn-inverse-danger" >Delete</a>
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
