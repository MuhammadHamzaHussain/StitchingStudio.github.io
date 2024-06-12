<!DOCTYPE html>
<html>
<head>
    <title>Images</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Saved Images</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td><img src="{{ asset('images/' . $image->filename) }}" alt="{{ $image->filename }}" style="width: 150px;"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>