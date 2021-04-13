@php $path = asset('/') @endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="./assets/img/favicon.ico" />
        
        <link
          rel="apple-touch-icon"
          sizes="76x76"
          href="./assets/img/apple-icon.png"
        />
        <link
          rel="stylesheet"
          href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        />
        <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"
        />

        
        <title>Profile | Tailwind Starter Kit by Creative Tim</title>
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
