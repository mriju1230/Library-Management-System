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
            <div class="col-md-10">
                @include("layouts.components.message")
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student</th>
                                        <th>Book</th>
                                        <th>Status</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($borrows as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img style="width:60px; height: 60px;border-radius:5px; object-fit: cover;" 
                                                src="{{ URL::to('/media/student/'.$item->photo) }}" alt="">
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            <img style="width:60px; height: 60px;border-radius:5px; object-fit: cover;" 
                                                src="{{ URL::to('/media/book/'.$item->cover) }}" alt="">
                                            {{ $item->title }}
                                        </td>
                                        <td>
                                            @if($item->status == 'pending')
                                                <span class="badge bg-warning text-dark">{{ ucfirst($item->status) }}</span>
                                            @elseif($item->status == 'returned')
                                                <span class="badge bg-success">{{ ucfirst($item->status) }}</span>
                                            @elseif($item->status == 'overdue')
                                                <span class="badge bg-danger">{{ ucfirst($item->status) }}</span>
                                            @endif
                                        </td>
                                        <td>{{ date('F d, Y', strtotime($item->issue_date)) }}</td>
                                        <td>
                                            @php
                                                $daysDiff = ceil(\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($item->return_date, false)));
                                            @endphp

                                            @if($daysDiff <= 0)
                                                <span class="text-danger">{{ abs($daysDiff) }} Days Delay</span>
                                            @else
                                                <span class="text-success">{{ $daysDiff }} Days</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                        <td>
                                            @if($item->status != "overdue")
                                                <a href="{{ route('borrow.overdue', $item->id) }}" 
                                                onclick="return confirm('Are you sure you want to mark this as overdue?')" 
                                                class="btn btn-sm btn-danger">Make Overdue</a>
                                            @endif
                                            @if($item->status != "returned")
                                                <a href="{{ url('/borrow-returned/'. $item->id. '/'. $item->book_id) }}" 
                                                onclick="return confirm('Confirm book return?')" 
                                                class="btn btn-sm btn-success">Make Return</a>
                                            @endif
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