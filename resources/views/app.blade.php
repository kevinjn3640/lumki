<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Scripts -->
    <!-- Styles -->
    <style>
        {!! file_get_contents($cssPath) !!}
    </style>

</head>
<body class="font-sans antialiased">
@inertia

<!-- Scripts -->
<script>
    {!! file_get_contents($jsPath) !!}
</script>
</body>
</html>
