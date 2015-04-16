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
                <form>
                    <div>
                        <label for="email">
                            Email
                        </label>
                        <input type="text" class="form-control" id="email" placeholder="your.email@provider.com" />
                    </div>
                    <div class="drop-20">
                        <label for="password">
                            Password
                        </label>
                        <input type="password" class="form-control" id="password" placeholder="password" />
                    </div>
                    <div class="drop-20">
                        <button class="btn loginButton">LOG IN</button>
                    </div>
                </form>
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
