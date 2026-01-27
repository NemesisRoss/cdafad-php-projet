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
        <h1>Se connecter</h1>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Saisir votre email" required>
            <input type="password" name="password" placeholder="Saisir votre mot de passe" required>
            <input type="submit" value="Connexion" name="submit">
        </form>
        <p><?= $data["msg"] ?? ""  ?></p>
    </main>
    <!-- Import du footer -->
    <?php include 'components/component_footer.php'; ?>
</body>
</html>