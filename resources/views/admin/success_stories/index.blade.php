@extends('admin.layout.default')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Success Stories</h3>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('admin.success_stories.create') }}" class="btn btn-primary float-sm-end">+ Add New</a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="card-title">List of Success Stories</div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Professional</th>
                            <th>Status</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($stories as $story)
                            <tr>
                                <td>{{ $story->id }}</td>
                                <td>
                                    @if($story->profile)
                                        <img src="{{ asset('storage/' . $story->profile) }}" alt="Profile" width="60" height="60" style="object-fit: cover; border-radius: 50%;">
                                    @else
                                        <img src="{{ asset('img/avatar5.png') }}" alt="No Profile" width="60" height="60">
                                    @endif
                                </td>
                                <td>{{ $story->name }}</td>
                                <td>{{ $story->professional }}</td>
                                <td>
                                    @if($story->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ \Illuminate\Support\Str::limit($story->message, 50) }}</td>
                                <td>
                                    <a href="{{ route('admin.success_stories.edit', $story->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('admin.success_stories.destroy', $story->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this story?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No success stories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-end">
                {{ $stories->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
