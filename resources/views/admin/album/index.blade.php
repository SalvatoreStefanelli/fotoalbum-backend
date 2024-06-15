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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

        <header class="py-3 bg-secondary">
            <div class="container">
                <h1>Album</h1>
            </div>
        </header>

        <div class="container mt-5">
            <div
                class="table-responsive-md"
            >
                <table
                    class="table table-striped table-hover table-borderless table-secondary align-middle"
                >
                    <thead class="table-light">
                        
                        <tr>
                            <th class="p-2">ID</th>
                            <th class="p-2">Title</th>
                            <th class="p-2">Upload Image</th>
                            <th class="p-5">Category</th>
                            <th class="p-5">Featured</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @forelse ($album as $photo)
                        <tr class="table-dark">
                            <td class="p-5" scope="row">{{$photo->id}}</td>
                            <td class="p-5">{{$photo->title}}</td>
                            <td class="p-5"> <img width="120" src="{{$photo->upload_image}}" alt=""></td>
                            <td class="p-5">{{$photo->category}}</td>
                            <td class="p-5">{{$photo->featured}}</td>
                            <td class="p-5">VIEW/EDIT/DELETE</td>
                        </tr>

                        @empty
                        <tr class="table-primary">
                            <td scope="row" colspan="5">No photo</td>
                        </tr>

                        @endforelse
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div>
            
        </div>
        
    </body>
</html>
