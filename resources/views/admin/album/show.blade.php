<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <header class="py-3 bg-secondary">
                    <div class="container d-flex align-items-center justify-content-between">
                        <h1>{{$album->title}}</h1>
                        <a href="{{route('album')}}">Back</a>
                    </div>
        </header>
        <div class="container mt-4">
            <div class="row row-cols-1 row-cols-md-2">

                <div class="col">
                    <h3 class="text-mute">{{$album->title}}</h3>
                    <p class="my-4">{{$album->description}}</p>
                </div>

                <div class="col">
                                @if (Str::startsWith($album->upload_image, 'http://'))
                                <img loading="lazy" class="img-fluid" src="{{$album->upload_image}}" alt="">
                                @else
                                <img loading="lazy" class="img-fluid" src="{{asset('public/storage/upload/' . $album->upload_image)}}" alt="">
                                @endif
                </div>
                
            </div>
        </div>
    </body>




</html>