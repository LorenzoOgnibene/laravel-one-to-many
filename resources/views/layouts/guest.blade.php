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
    <body class="font-sans text-gray-900 antialiased">

        <div class="container">
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-4 d-flex flex-wrap gy-5">
                        <div class="card">
                            <img src="{{$project->image}}" class="card-img-top" alt="...">
                            <div class="card-body">
                            <p class="card-text">{{$project->description}}</p>
                            <h6 class="card-subtitle mb-2 text-muted">{{$project->creation_date}}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="">
                {{ $projects->links() }}
            </div>
        </div>
        <footer>
            <a href="/admin/dashboard" class="btn btn-outline-info">if u are an admin click here</a>
        </footer>
    </body>
</html>
