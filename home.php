<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Exemple de login</title>
    <link rel="stylesheet">
</head>
<body>
    <div>
        <!-- Inclusion du formulaire de connexion -->
        <?php include_once('login.php'); ?>

        
        <!-- Si l'utilisateur existe, on affiche le contenu -->
        <?php if(isset($_SESSION['LOGGED_USER'])): ?>

            <p class=" p-6 w-[80%] mx-auto my-6 rounded-lg shadow-lg bg-red-100"><?php echo print_r($_SESSION); ?></p>

        <!-- Boutton permettant de se déconecter -->
            <form method='POST' action='deco.php' class='p-6 w-1/2 mx-auto my-6 rounded-lg shadow-lg bg-red-500 text-center font-bold'>
                <a href="/deco.php">Se déconnecter</a>
            </form>
        <?php endif; ?>

    </div>

</body>
</html>