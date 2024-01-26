<!doctype html>
<html class="no-js" lang="zxx">
    <head>
    @include('includes.head')

    @include('includes.spinner')
		
    </head>
    <body>
	
    @include('includes.navBar')

    @include('includes.header')    
    
    @yield('content')
		
    @include('includes.footer')

    @include('includes.footerJs')

    </body>
</html>