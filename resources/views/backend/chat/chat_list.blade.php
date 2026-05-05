@extends('admin.admin_master')
@section('admin')

<div class="container-fluid px-4 mt-4">

    <h4>Chat List (Approved Orders)</h4>

    @if($orders->count() > 0)

    <table class="table table-bordered mt-3">

        <thead>
            <tr>
                <th>Customer</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $item)
            <tr>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->category->category_name }}</td>
                <td>
                    <a href="{{ route('chat.view', $item->id) }}" 
                       class="btn btn-primary btn-sm">
                        Open Chat
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    @else
        <p class="text-danger text-center mt-3">No approved chats available</p>
    @endif

</div>

@endsection