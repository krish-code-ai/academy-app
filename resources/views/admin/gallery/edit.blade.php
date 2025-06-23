@extends('admin.layout.default')

@section('content')

<div class="container">
    <h3>Edit Gallery</h3>

    <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" id="galleryForm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Gallery Title</label>
            <input type="text" name="title" value="{{ $gallery->title }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Year</label>
            <input type="number" name="year" value="{{ $gallery->year }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gallery Images</label>
            <div class="dropzone" id="galleryDropzone"></div>
            <div id="uploadedImages"></div>
        </div>

        <button type="submit" class="btn btn-success">Update Gallery</button>
    </form>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    Dropzone.autoDiscover = false;

    const uploadedImages = {};

    const myDropzone = new Dropzone("#galleryDropzone", {
        url: "{{ route('admin.gallery.uploadImage') }}",
        paramName: "file",
        maxFilesize: 2, // MB
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        dictRemoveFile: 'Remove',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },

        init: function() {
            let myDropzone = this;

            $.ajax({
                url: "{{ route('admin.gallery.fetchImages') }}",
                type: "POST",
                data: {
                    gallery_id: "{{ $gallery->id }}",
                    _token: '{{ csrf_token() }}'
                },
                dataType: "json",
                success: function(response) {
                    response.forEach(function(file) {
                        let mockFile = {
                            name: file.name,
                            size: file.size,
                            uploadedPath: file.path,
                            thumbnailPath: file.thumbnail
                        };
                        myDropzone.emit("addedfile", mockFile);
                        myDropzone.emit("thumbnail", mockFile, file.thumbnail);
                        myDropzone.emit("complete", mockFile);
                        mockFile.previewElement.classList.add("dz-success", "dz-complete");
                    });
                }
            });
        },

        success: function(file, response) {
            if (!response.image_path) {
                console.error('image_path missing in upload response');
                return; // stop here, or handle the error gracefully
            }

            file.uploadedPath = response.image_path;
            file.thumbnailPath = response.thumbnail_path;

            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'images[]';
            input.value = response.image_path;
            input.id = 'input-' + response.image_path.replace(/[\/\.]/g, '_');
            document.getElementById('uploadedImages').appendChild(input);
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
        }
    });
</script>
@endsection
