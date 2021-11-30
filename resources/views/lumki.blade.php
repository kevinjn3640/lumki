<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <style>
        {!! file_get_contents($cssPath) !!}
    </style>
    @routes
    <!-- Scripts -->
</head>
<body class="font-sans antialiased">
@inertia
<script type="text/javascript">
    console.log(window.scrollY);
    {!! file_get_contents($jsPath) !!}
</script>
<script type="text/javascript">
    console.log(window.scrollY);
    {!! file_get_contents($jsPath) !!}
</script>
<script type="text/javascript">
    console.log(window.scrollY);
    {!! file_get_contents($jsPath) !!}
</script>
</body>
</html>
