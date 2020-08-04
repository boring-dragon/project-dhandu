<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project dhandu</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="/css/all.css">
    <link href="/css/tailwind.min.css" rel="stylesheet">
    <!--Replace with your tailwind.css once created-->
    <script src="/js/chart.bundle.min.js"></script>



</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
   
    @include('partials.nav')


    <!--Container-->
    <div class="container w-full mx-auto pt-20">

       @yield('content')

        
    </div>

    @include('partials.scripts')
    

</body>

</html>
