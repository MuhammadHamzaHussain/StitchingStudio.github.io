<!DOCTYPE html>
<html>
<head>
    <title>Laravel Image Upload</title>
</head>
<body>
    <h2>Upload Image</h2>

    @if ($message = Session::get('success'))
        <div>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="file" name="image" class="form-control">
        </div>
        <div>
            <button type="submit">Upload</button>
        </div>
    </form>
</body>
</html>
