@extends('admin.layout.default')

@section('content')

<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Course</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Course</li>
                </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Course Create</div>
                    </div>
                    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Course Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter course title" value="{{ old('title') }}">
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Course Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $id => $name)
                                    <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Subcategory -->
                            <div class="mb-3">
                                <label for="subcategory_id" class="form-label">Subcategory</label>
                                <select name="subcategory_id" class="form-control">
                                    <option value="">Select Subcategory</option>
                                    @foreach($subcategories as $id => $name)
                                    <option value="{{ $id }}" {{ old('subcategory_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('subcategory_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Fee -->
                            <div class="mb-3">
                                <label for="fee" class="form-label">Course Fee</label>
                                <input type="number" name="fee" class="form-control" placeholder="Enter fee" value="{{ old('fee') }}">
                                @error('fee') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Picture -->
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                <input type="file" name="picture" class="form-control">
                                @error('picture') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <!-- Submit -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
