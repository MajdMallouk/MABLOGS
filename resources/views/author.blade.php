<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $author['name'] }}</title>
</head>
<body>
    <x-layout>
        <center>
        <h4>Score: {{ $author['score'] }}</h4>
        <h4>Blogs:</h4>
        </center>
        <br>
        @foreach($blogs as $blog)
            <li style="display: flex; flex-direction: column; max-width: 600px; padding: 1rem; border: 1px solid #fff; border-radius: 15px; margin: auto auto 40px;">
                <div class="blogheader" style="display: flex; justify-content: center">
                    <h3> {{ $blog['title'] }}</h3>
                </div>
                <p> {{ $blog['content'] }} </p>
                <hr>
                <div class="blogfooter" style="display: flex; justify-content: space-between">
                    <h6>bla lba lblbll</h6>
                    <em> {{ $blog['created_at']->format('d M, Y') }}</em>

                </div>
            </li>
        @endforeach
    </x-layout>
</body>
</html>
