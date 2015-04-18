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
           <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">{!! Html::image('assets/imgs/logo.jpg', 'Logo', array('align' => 'middle', 'class' => 'logo-small')) !!}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="{{ action('AccountController@getLogout') }}"><i class="glyphicon glyphicon-cog"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="{{ action('AccountController@getLogout') }}"><i class="glyphicon glyphicon-user"></i> Logout</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

        <!-- Vendor Javascript files -->
        {!! Html::script('assets/components/jquery/dist/jquery.min.js') !!}
        {!! Html::script('assets/components/bootstrap/dist/js/bootstrap.min.js') !!}

        <!-- Application Javascript files -->
        {!! Html::script('assets/js/app.min.js') !!}

    </body>
</html> 
