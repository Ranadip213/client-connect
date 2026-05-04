@extends('admin.admin_master')
@section('admin')

    <main>

        <div class="container-fluid px-4">

            <h1 class="mt-4">All Categories</h1>

            <div class="mb-3">

                <a href="{{ route('add.category') }}" class="btn btn-primary">

                    Add Category

                </a>

            </div>

            <div class="card mb-4">

                <div class="card-header">

                    <i class="fas fa-table me-1"></i>

                    Category List

                </div>

                <div class="card-body">

                    @if($categories->count() > 0)

                        <table class="table table-bordered">

                            <thead>

                                <tr>

                                    <th>Category Name</th>

                                    <th>Minimum Amount</th>

                                    <th>Duration</th>


                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach($categories as $item)

                                    <tr>

                                        <td>{{ $item->category_name }}</td>

                                        <td>{{ $item->minimum_amount }}</td>

                                        <td>

                                            {{ $item->duration_value }} {{ $item->duration_unit }}

                                        </td>


                                        <td>

                                            <a href="{{ route('edit.category', $item->id)}}" class="btn btn-sm btn-info">Edit</a>

                                            <a href="{{ route('delete.category', $item->id)}}" class="btn btn-sm btn-danger">Delete</a>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    @else

                        <p class="text-center text-danger">No categories found</p>

                    @endif

                </div>

            </div>

        </div>

    </main>

@endsection