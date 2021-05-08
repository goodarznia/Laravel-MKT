<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('page_title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/blog-home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>

<!-- Navigation -->
@include('layouts.header')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">@yield('page_heading')
                <small>@yield('page_title_description')</small>
            </h1>

            <!-- Blog Post -->
        @yield('content')

        <!-- Pagination -->
            @yield('pagination')

        </div>

        <!-- Sidebar Widgets Column -->
        @include('layouts.sidebar')

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
@include('layouts.footer')



</body>

</html>
