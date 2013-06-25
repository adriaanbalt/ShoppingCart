<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="us-en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="us-en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="us-en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="us-en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <title>Shopping Cart Admin Page</title>
        
        <meta name="title" content="" />
        <meta name="description" content="" />
        <link rel="canonical" href="" />
        
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable = no' />
        <link rel="shortcut icon" href="./favicon.ico" >

        <meta property="og:title" content=""/>
        <meta property="og:type" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:image" content=""/>
        <meta property="og:site_name" content=""/>
        <meta property="og:description" content=""/>

        <link href="/static/css/normalize.min.css" rel="stylesheet" />
        <link href="/static/css/screen.css" rel="stylesheet" />
        <!--[if IE]><link href="/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" /><![endif]-->

        <script src="/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <div id='main-wrapper'>
            <div id="main" role="main" class='clearfix'>
                <div id='content'>
                    @yield('content')
                </div>
            </div>
            <!-- /#main -->
        </div>

        <!-- Add your own Google Analytics UA number or remove this snippet -->
        <script>
            var codes = ['UA-#########-1'], _gaq = _gaq || [];
            for(i in codes) {
                _gaq.push(['_setAccount', codes[i]]);
                _gaq.push(['_trackPageview']);
            }
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>

        <!-- VENDORS -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.8.3.min.js"><\/script>')</script>

    </body>
</html>
