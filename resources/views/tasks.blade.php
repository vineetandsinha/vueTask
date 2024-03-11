<!-- resources/views/tasks.blade.php -->
<html>
<head>
    <!-- Add any necessary meta tags, styles, and scripts -->
</head>
<body>
    <div id="app">
        <!-- Pass tasks data to the TaskList component -->
        <task-list :tasks="{{ $tasks }}"></task-list>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>