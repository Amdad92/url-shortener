<!DOCTYPE html>
<html>
<head>
    <title>URL Shortener</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">URL Shortener</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('shorten') }}">
            @csrf
            <div class="mb-3">
                <input type="url" name="original_url" class="form-control" 
                       placeholder="Enter URL" required>
            </div>
            <button type="submit" class="btn btn-primary">Shorten</button>
        </form>
    </div>
</body>
</html>