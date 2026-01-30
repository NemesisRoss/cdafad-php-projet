<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="assets/style/main.css">
    <title><?= $title ?? "" ?></title>
</head>

<body>
    <!-- Import du menu -->
    <?php include 'components/component_navbar.php'; ?>
    <main class="container-fluid">
        <article>
            <header><strong>Profil : <?= $data["user"]["pseudo"] ?? "" ?></strong></header>
            <img src="/assets/img/<?= $data["user"]["img"]["url"] ?? "" ?>" alt="<?= $data["user"]["img"]["alt"] ?? "" ?>" class="profil-img"/>
            <p><?= "Prénom : " . $data["user"]["firstname"] ?? "" ?></p>
            <p><?= "Nom : " . $data["user"]["lastname"] ?? "" ?></p>
            <p><?= "Email : " . $data["user"]["email"] ?? "" ?></p>
            <footer><strong>Role : <?= $data["user"]["roles"][0] ?? "" ?></strong></footer>
        </article>
    </main>
    <!-- Import du footer -->
    <?php include 'components/component_footer.php'; ?>
</body>

</html>