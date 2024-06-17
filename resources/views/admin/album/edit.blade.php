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
    @include('layouts.navigation-bar')
        <header class="py-3 bg-secondary">
                <div class="container">
                    <h1>Edit {{$album->title}} </h1>
                </div>
            </header>

            <div class="container mt-5">
              @include('partials.errors')
                <form action="{{'update', true}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                        <label for="tile" class="form-label">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id="title"
                            aria-describedby="titleHelper"
                            placeholder="type title album"
                            value="{{old('title', $album->title)}}"
                        />
                        <small id="titleHelper" class="form-text text-muted">Type a title to your album</small>
                        @error('title')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
    
                    <div class="mb-3 d-flex gap-4">

                        @if (Str::startsWith($album->upload_image, 'http://'))
                        <img loading="lazy" width="120" src="{{$album->upload_image}}" alt="">
                        @else
                        <img loading="lazy" width="120" src="{{asset('storage/' . $album->upload_image)}}" alt="">
                        @endif
                        
                        <div>

                            <label for="upload_image" class="form-label">Choose file</label>
                            <input
                                type="file"
                                class="form-control"
                                name="upload_image"
                                id="upload_image"
                                placeholder=""
                                aria-describedby="uploadImageHelper"/>
                            <div id="uploadImageHelper" class="form-text">Upload a cover image</div>
                            @error('upload_image')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>               
    
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input
                            type="text"
                            class="form-control"
                            name="category"
                            id="category"
                            aria-describedby="categoryHelper"
                            placeholder="type a category album"
                            value="{{old('category', $album->category)}}"
                        />
                        <small id="categoryHelper" class="form-text text-muted">Type a category to your album</small>
                        @error('category')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <label for="featured" class="form-label">Featured</label>
                        <input
                            type="text"
                            class="form-control"
                            name="featured"
                            id="featured"
                            aria-describedby="featuredHelper"
                            placeholder="write if is featured or not"
                            value="{{old('featured', $album->featured)}}"
                        />
                        <small id="featuredHelper" class="form-text text-muted">Is it featured?</small>
                        @error('featured')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{old('description', $album->description)}}</textarea>
                        @error('description')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                    
                    


                </form>
                

                
            </div>
    </body>
</html>