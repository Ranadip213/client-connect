@extends('admin.admin_master')
@section('admin')

<main>
<div class="container-fluid px-4">

    <h1 class="mt-4">All Orders</h1>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Order List
        </div>

        <div class="card-body">

            @if($orders->count() > 0)

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Category</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $item)
                    <tr>

                        <td>{{ $item->user->name }}</td>

                        <td>{{ $item->category->category_name }}</td>

                        <td>{{ $item->message }}</td>

                        <td>
                            @if($item->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($item->status == 'approved')
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>

                        <td>
                            @if($item->status == 'pending')

                                <a href="" 
                                   class="btn btn-sm btn-success">Approve</a>

                                <a href="" 
                                   class="btn btn-sm btn-danger">Reject</a>

                            @endif

                            @if($item->status == 'approved')
                                <a href="" 
                                   class="btn btn-sm btn-primary">Chat</a>
                            @endif
                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>

            @else
                <p class="text-danger text-center">No Orders Found</p>
            @endif

        </div>
    </div>

</div>
</main>

@endsection