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
                        <div class="card-title">Gallery</div>
                    </div>
                    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Gallery Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Year</label>
                                <input type="number" name="year" class="form-control" min="2000" max="{{ date('Y') }}">
                                 @error('year') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- <div class="mb-3">
                                <label for="images" class="form-label">Gallery Images</label>
                                <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                            </div> -->

                            <div class="mb-3">
                                <label>Upload Gallery Images</label>

                                <div class="dropzone" id="galleryDropzone"></div>
                                <div id="uploadedImages"></div>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Gallery</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    Dropzone.autoDiscover = false;

    const uploadedImages = {}; // To track inputs for removal

    const galleryDropzone = new Dropzone("#galleryDropzone", {
        url: "{{ route('admin.gallery.uploadImage') }}",
        paramName: "file",
        maxFilesize: 2, // MB
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        addRemoveLinks: true,
        dictRemoveFile: 'Remove',

        success: function(file, response) {
            // Store the uploaded image path in the file object
            file.uploadedPath = response.image_path;
            file.thumbnailPath = response.thumbnail_path;

            // Create a hidden input to send this image on form submit
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'images[]';
            input.value = response.image_path;
            input.id = 'input-' + response.image_path.replace(/[\/\.]/g, '_');

            document.getElementById('uploadedImages').appendChild(input);

            // Track this input
            uploadedImages[response.image_path] = input;


            // Thumbnail image input - create a NEW element!
            const thumbInput = document.createElement('input');
            thumbInput.type = 'hidden';
            thumbInput.name = 'thumbnailImages[]';
            thumbInput.value = response.thumbnail_path;
            thumbInput.id = 'input-' + response.thumbnail_path.replace(/[\/\.]/g, '_');
            document.getElementById('uploadedImages').appendChild(thumbInput);
            uploadedImages[response.thumbnail_path] = thumbInput;
        },

        removedfile: function(file) {
            if (file.uploadedPath) {
                console.log('Removing file:', file);
                fetch("{{ route('admin.gallery.deleteImage') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        path: file.uploadedPath,
                        thumbnail_path: file.thumbnailPath
                    })
                });

                const inputId = 'input-' + file.uploadedPath.replace(/[\/\.]/g, '_');
                const input = document.getElementById(inputId);
                if (input) input.remove();
            }

            file.previewElement.remove();
        },

        error: function(file, response) {
            alert(response.message || 'Upload failed');
        }
    });
</script>
@endsection
