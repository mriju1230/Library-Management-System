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
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="User Image" src="{{ URL::to('media/student/'. $student->photo) }}">
                            </a>
                        </div>
                        <div class="col ml-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{ $student->name }}</h4>
                            <h6 class="text-muted">{{ $student->email }}</h6>
                            <div class="user-Location"><i class="fa fa-map-marker"></i> {{ $student->address }}</div>
                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <div class="row">
                    <div class="col-md-10 col-lg-6">
                        <h5 class="card-title">Borrowing Book</h5>
						@include("layouts.components.message")
                        <form action="{{ route('borrow.store') }}" method="post">
							@csrf
                            <div class="form-group">
                                <label>Select Book</label>
                                <select name="book_id" class="form-control" id="">
                                    <option value="">Choose Now</option>
									@foreach($books as $book)
									<option value="{{ $book->id }}">
										{{ $book->title }}
									</option>
									@endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Return Date</label>
                                <input type="date" name="return_date" class="form-control">
								<input type="hidden" name="student_id" value="{{ $student->id }}">
                            </div>
                            <button class="btn btn-primary" type="submit">Create Borrow</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection