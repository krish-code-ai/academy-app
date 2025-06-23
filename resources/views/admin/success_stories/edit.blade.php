@extends('admin.layout.default')

@section('content')

<!--begin::App Content Header-->
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Success Story</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Success stories</li>
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
                        <div class="card-title">Edit Success Story</div>
                    </div>

                    <form action="{{ route('admin.success_stories.update', ['success_story' => $success_story->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $success_story->name) }}">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Existing Profile Image -->
                            @if($success_story->profile)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $success_story->profile) }}" alt="Current Profile" width="100">
                                </div>
                            @endif

                            <!-- Upload New Profile Image -->
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="profile">Change Profile</label>
                                <input type="file" name="profile" class="form-control" id="profile" accept="image/*">
                                @error('profile') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Message -->
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" class="form-control" rows="4">{{ old('message', $success_story->message) }}</textarea>
                                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status', $success_story->status) == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $success_story->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Professional -->
                            <div class="mb-3">
                                <label for="professional" class="form-label">Professional</label>
                                <input type="text" name="professional" class="form-control" value="{{ old('professional', $success_story->professional) }}">
                                @error('professional') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <!-- Submit -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
