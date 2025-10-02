@extends('layouts.app')

@section('main')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">All Books</h3>
                </div>
            </div>
        </div>
        <!-- /Page Header -->    
        
        {{-- form --}}
        <div class="row">
            <div class="col-xl-10">

                @include('layouts.components.message')

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Book</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Book Title</label>
                                <div class="col-lg-9">
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Author Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="author" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Copy</label>
                                <div class="col-lg-9">
                                    <input type="text" name="copy" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">ISBN</label>
                                <div class="col-lg-9">
                                    <input type="text" name="isbn" class="form-control">
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Book Cover</label>
                                <div class="col-lg-9">
                                    <input type="file" name="cover" class="form-control">
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