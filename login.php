<?php

include('data.php');

// Validation du formulaire

// Si la variable $_POST contient name et password, on compare avec ce que l'on récupère du formulaire
if (isset($_POST['name']) &&  isset($_POST['password'])) {

    foreach ($users as $item) {
        if (
            $item['name'] === $_POST['name'] &&
            $item['password'] === $_POST['password']
        ) {

            // Si ça match on crée la valeur LOGGED_USER dans la variable SESSION et on lui attribue
            // la valeur récupéré dans $_POST['name']
            $_SESSION['LOGGED_USER'] = $_POST['name'];

        } else {
            // Sinon on crée une variable avec un message d'erreur à afficher
            $errorMessage = sprintf("Couple d'identifiant inexistant : (%s/%s)",$_POST['name'],$_POST['password']
            );
        }
    }
}
?>

<!-- Si user est non identifié(e), on affiche le formulaire -->

<?php if(!isset($_SESSION['LOGGED_USER'])): ?>

<div class="bg-blue-100 w-1/2 mx-auto my-10 p-2 py-6 font-bold rounded-lg shadow-lg">

    <h1 class="text-center uppercase shadow-lg mb-6 p-2 text-red-400">Login</h1>

    <form action="home.php" method="post"> 

            <!-- si message d'erreur on l'affiche -->
            <?php if(isset($errorMessage)) : ?>
                <div class="text-red-600 uppercase" role="alert">
                    <?php echo $errorMessage; ?>
                </div>
            <?php endif; ?>

            <!-- Formulaire -->
            <div class="my-6">
                <label for="name" class="mr-16">Name</label>
                <input type="id" class="" id="name" name="name" placeholder="toto">
            </div>
            <div class="my-6">
                <label for="password" class="mr-2">Mot de passe</label>
                <input type="password" class="" id="password" name="password">
            </div>
            <button type="submit" class="bg-red-300 rounded-lg text-center p-2 px-6">Envoyer</button>
        </form>
</div>
<!-- Si user bien connectée on affiche un message de succès et le contenu de home.php sera affiché-->
<?php else: ?>
    <div class="p-6 w-1/2 mx-auto my-6 rounded-lg shadow-lg bg-blue-200 text-center font-bold uppercase">
        <h1>Bonjour <?php echo $_SESSION['LOGGED_USER']; ?> et bienvenue sur l'exemple de login</h1>
    </div>
<?php endif; ?>

<script src="https://cdn.tailwindcss.com"></script>