@extends('layouts.app')

@section('main')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">All Borrowing</h3>                    
                </div>
            </div>
        </div>
        <a href="{{ route('borrow.search') }}" class="btn btn-primary">Add New Borrowing</a>
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
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Copy</th>
                                        <th>ISBN</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                      
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