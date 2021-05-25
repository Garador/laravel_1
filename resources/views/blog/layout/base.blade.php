<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO -->
    @if ($metadata && $metadata['head'])
        @if ($metadata['head']['description'])
            <meta name="description" content="{{$metadata['head']['description']}}">
        @endif
        @if (!empty($metadata['head']['poster']))
            <meta name="author" content="{{$metadata['head']['poster']}}">
        @endif
    @endif

    @if ($metadata && $metadata['head']['title'])
        <title>{{$metadata['head']['title']}}</title>
    @else
        <title>Basic Blog</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon/favicon.ico')}}">
    <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="{{asset('images/favicon/apple-touch-icon.png')}}">

    <!-- All CSS Plugins -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/plugin.css')}}">

    <!-- Main CSS Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <!-- Custom css files -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">

    <!-- Google Web Fonts  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">


    <!-- HTML5 shiv and Respond.js support IE8 or Older for HTML5 elements and media queries -->
    <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Preloader Start -->
    <div class="preloader">
        <div class="rounder"></div>
    </div>
    <!-- Preloader End -->
    <div id="main">
        <div class="container">
            @yield('content')
        </div>
    </div>


    <!-- Back to Top Start -->
    <a href="#" class="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a>
    <!-- Back to Top End -->
    
    
    <!-- All Javascript Plugins  -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugin.js')}}"></script>
    
    <!-- Main Javascript File  -->
    <script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>
</body>

</html>
