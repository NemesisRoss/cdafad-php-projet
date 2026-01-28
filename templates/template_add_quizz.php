<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?? "" ?></title>
</head>
<body>
    <!-- Import du menu -->
    <?php include 'components/component_navbar.php'; ?>
    <main class="container-fluid">
        <h1>Ajouter un quizz</h1>
        <form action="" method="post">
            <input type="text" name="title" placeholder="Saisir le titre">
            <textarea name="description" placeholder="Saisir la description"></textarea>
            <?php include 'components/component_all_categories.php';?>
            <input type="submit" value="Ajouter" name="submit">
        </form>
        <p><?= $data["msg"] ?? "" ?></p>
    </main>
    <!-- Import du footer -->
    <?php include 'components/component_footer.php'; ?>
</body>
</body>

</html>