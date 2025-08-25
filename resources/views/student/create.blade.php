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
        <!-- /Page Header -->    
        <a href="{{ route('students.index') }}" class="btn btn-primary">All Student</a>
        <br>
        <br>
        {{-- form --}}
        <div class="row">
            <div class="col-xl-6">

                @include('layouts.components.message')

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Student</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Full Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Phone</label>
                                <div class="col-lg-9">
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Student ID</label>
                                <div class="col-lg-9">
                                    <input type="text" name="student_id" class="form-control">
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Address</label>
                                <div class="col-lg-9">
                                    <input type="name" name="address" class="form-control">
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Photo</label>
                                <div class="col-lg-9">
                                    <input type="file" name="photo" class="form-control">
                                </div>
                            </div>                            
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection