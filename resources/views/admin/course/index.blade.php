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
<div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Course Table</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.courses.create') }}" class="btn btn-sm btn-primary">Create</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Picture</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Fee</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $index => $course)
                                <tr class="align-middle">
                                    <td>{{ $courses->firstItem() + $index }}</td>
                                    <td>
                                        @if($course->picture)
                                        <img src="{{ asset('storage/' . $course->picture) }}" alt="picture" width="60" height="60">
                                        @else
                                        <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $categories[$course->category_id] ?? 'N/A' }}</td>
                                    <td>{{ $subcategories[$course->subcategory_id] ?? 'N/A' }}</td>
                                    <td>{{ number_format($course->fee, 2) }}</td>

                                    <td>{{ Str::limit($course->description, 50) }}</td>
                                    <td>
                                        <span class="badge {{ $course->status ? 'text-bg-success' : 'text-bg-secondary' }}">
                                            {{ $course->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">No courses found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>


                    </div>
                    <div class="card-footer clearfix">
                        <div class="float-end">
                            {{ $courses->links() }}
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@endsection
