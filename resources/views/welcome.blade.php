<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
</head>
<body>
    <ul>
        @foreach ($tasks as $task)
            <li> {{ $task->body }}</li>
        @endforeach
    </ul>
</body>
</html>