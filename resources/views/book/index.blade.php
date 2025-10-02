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
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
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
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $key=>$book)
                                        <tr>
                                            <td>{{ $key+1}}</td>
                                            <td>{{ $book->title}}</td>
                                            <td>{{ $book->author}}</td>
                                            <td>{{ $book->copy}}</td>                                            
                                            <td>{{ $book->isbn}}</td>
                                            <td>{{ \Carbon\Carbon::parse($book->created_at)->diffForHumans()}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href=""> <i class="fa fa-eye"></i></a>
                                                <a class="btn btn-sm btn-warning" href=""> <i class="fa fa-edit"></i></a>
                                                <a class="btn btn-sm btn-danger" href=""> <i class="fa fa-trash"></i></a>
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