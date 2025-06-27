<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$page_title = "Conditions d'utilisation";
include($root . '/resources/layout/head.php');
?>

<body class="relative min-h-screen w-screen text-ms-black dark:text-ms-white bg-ms-white dark:bg-ms-black">
    
    <?php include($root . '/resources/layout/header.php') ?> 

    <main class="w-full min-h-screen overflow-y-auto px-6 py-8 pt-20">
        <section class="max-w-4xl mx-auto flex flex-col gap-6">
            <h1 class="text-4xl font-bold">Termes d’utilisation</h1>

            <p>
                En utilisant notre réseau social, vous acceptez les présentes conditions d’utilisation. Nous vous encourageons à les lire attentivement afin de comprendre vos droits et obligations.
            </p>

            <h2 class="text-2xl font-semibold">1. Acceptation des conditions</h2>
            <p>
                L’accès et l’utilisation du service impliquent l’acceptation sans réserve des présentes conditions. Si vous n’acceptez pas ces termes, veuillez ne pas utiliser la plateforme.
            </p>

            <h2 class="text-2xl font-semibold">2. Création de compte</h2>
            <p>
                Vous devez fournir des informations exactes lors de la création de votre compte. Vous êtes responsable de la confidentialité de votre mot de passe et des activités liées à votre compte.
            </p>

            <h2 class="text-2xl font-semibold">3. Comportement des utilisateurs</h2>
            <p>
                En tant qu’utilisateur, vous vous engagez à ne pas :
            </p>
            <ul class="list-disc list-inside space-y-1">
                <li>Publier de contenu illégal, offensant ou haineux.</li>
                <li>Harceler ou intimider d'autres utilisateurs.</li>
                <li>Utiliser le service à des fins frauduleuses ou malveillantes.</li>
            </ul>

            <h2 class="text-2xl font-semibold">4. Modération</h2>
            <p>
                Nous nous réservons le droit de supprimer tout contenu non conforme aux présentes conditions et de suspendre ou supprimer tout compte en cas de violation manifeste ou répétée.
            </p>

            <h2 class="text-2xl font-semibold">5. Propriété intellectuelle</h2>
            <p>
                Le contenu que vous publiez vous appartient, mais vous nous accordez une licence non exclusive pour l’afficher et le diffuser sur notre plateforme. Le design et les fonctionnalités du site sont notre propriété et protégés par le droit d’auteur.
            </p>

            <h2 class="text-2xl font-semibold">6. Responsabilité</h2>
            <p>
                Nous ne pouvons garantir l’absence totale d’erreurs ou d’interruptions. Le service est fourni « tel quel », sans garantie. Nous ne sommes pas responsables des pertes ou dommages causés par l’utilisation du site.
            </p>

            <h2 class="text-2xl font-semibold">7. Modification des conditions</h2>
            <p>
                Nous pouvons mettre à jour ces termes à tout moment. Les modifications seront annoncées sur le site. En continuant à utiliser le service après modification, vous acceptez les nouveaux termes.
            </p>

            <h2 class="text-2xl font-semibold">8. Contact</h2>
            <p>
                Pour toute question concernant ces conditions, vous pouvez nous écrire à : <strong>moodsocial.contact@gmail.com</strong>
            </p>
        </section>
    </main>

    <script src="/resources/js/theme.js"></script>
</body>

<?php include($root . '/resources/layout/footer.php') ?>
