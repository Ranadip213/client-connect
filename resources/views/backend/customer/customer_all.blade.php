@extends('admin.admin_master')
@section('admin')

<main>

    <div class="container-fluid px-4">

        <h1 class="mt-4">All Customers</h1>

        <div class="card mb-4">

            <div class="card-header">
                <i class="fas fa-users me-1"></i>
                Customer List
            </div>

            <div class="card-body">

                @if($customers->count() > 0)

                    <table class="table table-bordered">

                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($customers as $item)
                                <tr>

                                    {{-- Profile Image --}}
                                    <td>
                                        <img src="{{ $item->profile_photo_url ?? url('upload/no_image.jpg') }}"
                                             width="60" height="60"
                                             style="border-radius:50%;">
                                    </td>

                                    {{-- Name --}}
                                    <td>{{ $item->name }}</td>

                                    {{-- Email --}}
                                    <td>{{ $item->email }}</td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                @else
                    <p class="text-center text-danger">No customers found</p>
                @endif

            </div>

        </div>

    </div>

</main>

@endsection