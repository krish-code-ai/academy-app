@extends('admin.layout.default')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Galleries</h3>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary float-sm-end">+ Add New Gallery</a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-outline card-primary">
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Preview</th>
                            <th>Title</th>
                            <th>Year</th>
                            <th>Image Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($galleries as $gallery)
                        <tr>
                            <td>{{ $gallery->id }}</td>
                            <td>
                                @if($gallery->images->first())
                                <img src="{{ asset('storage/' . $gallery->images->first()->image_path) }}" width="80" class="img-thumbnail">
                                @else
                                <img src="{{ asset('img/no-image.png') }}" width="80" class="img-thumbnail">
                                @endif
                            </td>
                            <td>{{ $gallery->title }}</td>
                            <td>{{ $gallery->year }}</td>
                            <td>{{ $gallery->images_count }}</td>
                            <td>
                                <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this gallery?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No galleries found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-end">
                {{ $galleries->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
