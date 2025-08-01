<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/css/bootstrap.min.css">
    <title>Manajemen APP</title>
</head>

<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
    }
</style>
<?= $this->include('layouts/navbar'); ?>

<div class="container py-5">
    <?= $this->renderSection('content'); ?>
</div>

<body class="bg-body-tertiary">
    <footer class="footer mt-auto py-3 bg-secondary">
        <div class="container text-center">
            <span class="text-white">Copyright &copy; 2024 - DarellRangga</span>
        </div>
    </footer>


    <script src="/public/Assets/js/bootstrap.bundle.js"></script>
</body>

</html>