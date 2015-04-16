<!doctype HTML>
<html>
    <head>
        <title>broadcastPanel - Login</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Factory stylesheets -->
        {!! Html::style('assets/components/bootstrap/dist/css/bootstrap.min.css') !!}        

        <!-- Application Stylesheets -->
        {!! Html::style('assets/css/style.min.css') !!} 
    </head>
    <body id="login">

        <div class="container loginContainer centerImage">
            {!! Html::image('assets/imgs/logo.jpg', 'Logo', array('align' => 'middle')) !!}
        </div>

        <div class="loginFullWidth drop-20">
        
            <div class="container loginContainer">
                {!! Form::open(array('url' => 'account/login')) !!}
                    <div>
                        <label for="email">
                            Email
                        </label>
                        {!! Form::text('email', '', array('placeholder' => 'your.email@provider.com', 'class' => 'form-control')) !!}
                    </div>
                    <div class="drop-20">
                        <label for="password">
                            Password
                        </label>
                        {!! Form::password('password', array('placeholder' => 'password', 'class' => 'form-control')) !!}
                    </div>
                    <div class="drop-20">
                        <button class="btn loginButton">LOG IN</button>
                    </div>
                {!! Form::close() !!}
            </div>

        </div> 
		
        <footer class="login drop-20">
            &copy; broadcastPanel
        </footer>

	<!-- Vendor Javascript files -->
        {!! Html::script('assets/components/jquery/dist/jquery.min.js') !!}
        {!! Html::script('assets/components/bootsrap/dist/js/bootstrap.min.js') !!}

        <!-- Application Javascript files -->
        {!! Html::script('assets/js/app.min.js') !!}

    </body>
</html>
