<!doctype HTML>
<html>
    <head>
        <title>broadcastPanel - @yield('title')</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Factory stylesheets -->
        {!! Html::style('assets/components/bootstrap/dist/css/bootstrap.min.css') !!}        

        <!-- Application Stylesheets -->
        {!! Html::style('assets/css/style.min.css') !!} 
    </head>
    <body>
    
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                 
            </div>
        </nav>

        <!-- Vendor Javascript files -->
        {!! Html::script('assets/components/jquery/dist/jquery.min.js') !!}
        {!! Html::script('assets/components/bootsrap/dist/js/bootstrap.min.js') !!}

        <!-- Application Javascript files -->
        {!! Html::script('assets/js/app.min.js') !!}

    </body>
</html> 
