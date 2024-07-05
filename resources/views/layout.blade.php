<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
</head>
<body>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @yield('content')
</body>
</html>
