<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Home Page' }}</title>
</head>

<body>
    <div>
        @if (session('message'))
        <div style="color: green;">
            {{ session('message') }}
        </div>

        @if (session('URL'))
        <p>Your shortened URL: <a href="{{ session('URL') }}">{{ session('URL') }}</a></p>
        @endif
        @endif
    </div>
    <div>
        <form method="POST" action="{{ route('short_url') }}">
            @csrf
            <input type="url" name="url" placeholder="Enter a URL" required value="{{ old('url') }}">
            @if ($errors->has('url')) <p style="color:red;">{{ $errors->first('url') }}</p> @endif
            <button type="submit">Shorten</button>
        </form>
    </div>
</body>

</html>