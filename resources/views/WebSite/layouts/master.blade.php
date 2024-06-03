<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

	@include('WebSite.layouts.head')

</head>
    <body>
                <!-- main-content -->
				{{-- @yield('page-header') --}}
                @include('WebSite.layouts.topbar')
                @include('WebSite.layouts.navbar')
				@yield('content')
            	@include('WebSite.layouts.footer')
				@include('WebSite.layouts.footer-scripts')

    </body>
</html>
