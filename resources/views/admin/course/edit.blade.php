@extends('admin.layout.default')

@section('content')

<!--begin::App Content Header-->
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Course</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Course</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--end::App Content Header-->

<div class="app-content">
    <div class="container-fluid">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Edit Course</div>
                    </div>

                    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <!-- Title -->
                            <div class="mb-3">
                                <label class="form-label">Course Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $course->title) }}">
                                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Course Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ old('description', $course->description) }}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $id => $name)
                                    <option value="{{ $id }}" {{ old('category_id', $course->category_id) == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Subcategory -->
                            <div class="mb-3">
                                <label class="form-label">Subcategory</label>
                                <select name="subcategory_id" class="form-control">
                                    <option value="">Select Subcategory</option>
                                    @foreach($subcategories as $id => $name)
                                    <option value="{{ $id }}" {{ old('subcategory_id', $course->subcategory_id) == $id ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('subcategory_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Fee -->
                            <div class="mb-3">
                                <label class="form-label">Course Fee</label>
                                <input type="number" name="fee" class="form-control" value="{{ old('fee', $course->fee) }}">
                                @error('fee') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Picture -->
                            <div class="input-group mb-3">
                                <label class="input-group-text">Upload</label>
                                <input type="file" name="picture" class="form-control">
                                @if ($course->picture)
                                <img src="{{ asset('storage/' . $course->picture) }}" width="60" class="ms-3" />
                                @endif
                                @error('picture') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status', $course->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $course->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Update Course</button>
                            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary float-end">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
