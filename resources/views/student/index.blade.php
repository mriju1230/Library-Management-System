@extends('layouts.app')

@section('main')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">All Students</h3>                    
                </div>
            </div>
        </div>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add New Student</a>
        <br>
        <br>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Emial</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Create At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                      @foreach ($students as $key => $student)
                                        <tr class="align-middle">
                                            <td>{{ $key+1}}</td>
                                            <td><img style="width:60px;height:60px;" src="/media/student/{{$student->photo}}" alt=""></td>                                
                                            <td>{{$student->student_id}}</td>                                
                                            <td>{{$student->name}}</td>                                
                                            <td>{{$student->email}}</td>                                   
                                            <td>{{$student->phone}}</td>                                   
                                            <td>{{$student->address}}</td>
                                            <td>{{ \Carbon\Carbon::parse($student->created_at)->diffForHumans()}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="" > <i class="fa fa-eye"></i> </a>
                                                <a class="btn btn-sm btn-warning" href="" > <i class="fa fa-edit"></i> </a>
                                                <a class="btn btn-sm btn-danger" href="" > <i class="fa fa-trash"></i> </a>
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
</div>
<!-- /Page Wrapper -->
@endsection