<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BANJOP</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="./css/app.css">
        
        <link rel="apple-touch-icon" sizes="180x180" href="./img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon-16x16.png">
        <link rel="icon" href="./img/favicon.ico">
        <!-- <link rel="manifest" href="./img/site.webmanifest"> -->
        <link rel="mask-icon" href="./img/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>

    </head>
    <body>
        <div id="root"></div>
        <script src="./js/app.js"></script>
    </body>
</html>
