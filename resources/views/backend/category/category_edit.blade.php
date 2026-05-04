@extends('admin.admin_master')

@section('admin')

<div class="container-fluid px-4">
    <h1 class="mt-4">Add Category</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Add Category</li>
    </ol>

    <div class="row">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    Category Form
                </div>

                <div class="card-body">

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form --}}
                    <form method="POST" action="{{ route('update.category', $category->id) }}">
                        @csrf
                        @method('PATCH')

                        {{-- Category Name --}}
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}" placeholder="Enter category name" required>
                        </div>

                        {{-- Minimum Amount --}}
                        <div class="mb-3">
                            <label class="form-label">Minimum Amount</label>
                            <input type="number" name="minimum_amount" class="form-control" value="{{ $category->minimum_amount }}" placeholder="Enter minimum amount" required>
                        </div>

                        {{-- Duration --}}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Duration Value</label>
                                <input type="number" name="duration_value" class="form-control" value="{{ $category->duration_value }}" placeholder="e.g. 30" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Duration Unit</label>
                                <select name="duration_unit" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="days" {{ $category->duration_unit == 'days' ? 'selected' : '' }}>Days</option>
                                    <option value="months" {{ $category->duration_unit == 'months' ? 'selected' : '' }}>Months</option>
                                </select>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <button type="submit" class="btn btn-success">
                            Save Category
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection