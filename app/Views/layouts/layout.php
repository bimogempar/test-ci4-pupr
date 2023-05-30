<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="grid sm:grid-cols-5 grid-cols-1">
        <?= $this->include('layouts/sidebar'); ?>
        <div class="p-8 border-2 sm:col-span-4 col-span-1">
            <?= $this->renderSection('main'); ?>
        </div>
    </div>
</body>

</html>