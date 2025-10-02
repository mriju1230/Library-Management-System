@extends('layouts.app')
@section('main')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Search Students</h3>
                </div>
            </div>
        </div>
        <!-- /Page Header -->    
        <a href="{{ route('borrow.index') }}" class="btn btn-primary">Back</a>
        <br>
        <br>
        <div class="row">
            <div class="col-xl-10">

                @include('layouts.components.message')

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Form</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('borrow.student') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Student ID</label>
                                <div class="col-lg-9">
                                    <input type="text" name="student_id" class="form-control">
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
                                                      
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
        <div class="row">
            @foreach ($students as $student)
            <div class="col-12 col-md-2 col-lg-4 d-flex">
                <div class="card flex-fill">
                    <img style="with:160px; object-fit:cover" alt="Card Image" src="{{ URL::to('/media/student/' . $student->photo) }}" class="card-img-top">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $student->name }}</h5>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="#">Assign Book</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection