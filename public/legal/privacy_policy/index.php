<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$page_title = "Politique de confidentialité";
include($root . '/resources/layout/head.php');
?>


<body class="relative min-h-screen w-screen text-ms-black dark:text-ms-white bg-ms-white dark:bg-ms-black">
    

    <?php include($root . '/resources/layout/header.php') ?> 

    <main class="w-full min-h-screen overflow-y-auto px-6 py-8 pt-20">
        <section class="max-w-4xl mx-auto flex flex-col gap-6">
            <h1 class="text-4xl font-bold">Politique de confidentialité</h1>

            <p>
                Votre vie privée est importante pour nous. Cette politique explique quelles données nous collectons, comment nous les utilisons, et vos droits en tant qu’utilisateur de notre réseau social.
            </p>

            <h2 class="text-2xl font-semibold">1. Données collectées</h2>
            <ul class="list-disc list-inside space-y-1">
                <li>Informations de compte : nom, e-mail, nom d’utilisateur.</li>
                <li>Contenus générés : messages publics, messages privés, images.</li>
                <li>Données techniques : adresse IP, type de navigateur, cookies.</li>
            </ul>

            <h2 class="text-2xl font-semibold">2. Messages privés</h2>
            <p>
                Les messages privés entre utilisateurs ne sont pas chiffrés de bout en bout. Cela signifie qu’ils peuvent être consultés par notre équipe de modération <strong>uniquement en cas de signalement, de suspicion d’abus ou d’activité illégale</strong>.
            </p>
            <p>
                L’accès est strictement réservé à des membres autorisés et est journalisé pour garantir la transparence.
            </p>

            <h2 class="text-2xl font-semibold">3. Utilisation des données</h2>
            <p>Vos données sont utilisées pour :</p>
            <ul class="list-disc list-inside space-y-1">
                <li>Améliorer notre service et ses fonctionnalités.</li>
                <li>Garantir la sécurité, prévenir les abus et appliquer la modération.</li>
                <li>Personnaliser votre expérience utilisateur.</li>
            </ul>

            <h2 class="text-2xl font-semibold">4. Partage des données</h2>
            <p>
                Nous ne vendons jamais vos données. Celles-ci peuvent être partagées avec des prestataires techniques ou des autorités compétentes, uniquement si cela est nécessaire pour des raisons légales ou de sécurité.
            </p>

            <h2 class="text-2xl font-semibold">5. Vos droits</h2>
            <p>Conformément au RGPD, vous avez le droit de :</p>
            <ul class="list-disc list-inside space-y-1">
                <li>Accéder à vos données personnelles.</li>
                <li>Demander la suppression de votre compte.</li>
            </ul>

            <h2 class="text-2xl font-semibold">6. Contact</h2>
            <p>
                Pour toute question ou demande relative à vos données, contactez-nous à : <strong>moodsocial.contact@gmail.com</strong>
            </p>
        </section>
    </main>

    <script src="/resources/js/theme.js"></script>
</body>

<?php include($root . '/resources/layout/footer.php') ?>