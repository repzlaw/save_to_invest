<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @routes
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <script src="https://use.fontawesome.com/9a9605d31f.js"></script>

</head>

<body>
    @inertia
</body>

</html>
