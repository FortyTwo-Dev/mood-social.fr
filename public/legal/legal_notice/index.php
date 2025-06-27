<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$page_title = "Mentions légales";
include($root . '/resources/layout/head.php');
?>

<body class="relative min-h-screen w-screen text-ms-black dark:text-ms-white bg-ms-white dark:bg-ms-black">

    <?php include($root . '/resources/layout/header.php') ?>

    <main class="w-full min-h-screen overflow-y-auto px-6 py-8 pt-20">
        <section class="max-w-4xl mx-auto flex flex-col gap-6">

            <h1 class="text-4xl font-bold">Mentions légales</h1>

            <h2 class="text-2xl font-semibold">1. Éditeur du site</h2>
            <p>
                Le site <strong>MoodSocial</strong> est édité par <strong>TJA inc</strong>,  
             domicilié(e) à <strong>Paris</strong>.
            </p>
            <p>
                Contact : <a href="mailto:moodsocial.contact@gmail.com" class="text-blue-600 underline">moodsocial.contact@gmail.com</a>
            </p>

            <h2 class="text-2xl font-semibold">2. Hébergement</h2>
            <p>
                Le site est hébergé par <strong>OVHcloud</strong>,  
                dont le siège social est situé au 2 rue Kellermann, 59100 Roubaix, France.
            </p>
            <p>
                Téléphone hébergeur : <strong>+33 9 72 10 10 07</strong>
            </p>


            <h2 class="text-2xl font-semibold">3. Propriété intellectuelle</h2>
            <p>
                L’ensemble des contenus présents sur MoodSocial (textes, images, vidéos, logos, marques, etc.) sont la propriété exclusive de <strong>MoodSocial</strong> ou de ses partenaires.
                Toute reproduction, distribution, modification ou utilisation sans autorisation préalable est strictement interdite.
            </p>

            <h2 class="text-2xl font-semibold">4. Données personnelles</h2>
            <p>
                Pour plus d’informations sur la collecte et l’utilisation de vos données, veuillez consulter notre  
                <a href="../privacy_policy/index.php " class="text-blue-600 underline">Politique de confidentialité</a>.
            </p>

            <h2 class="text-2xl font-semibold">5. Responsabilité</h2>
            <p>
                MoodSocial met tout en œuvre pour assurer l’exactitude et la mise à jour des informations présentes sur le site,  
                mais ne saurait être tenu responsable des erreurs ou omissions.
            </p>
            <p>
                L’utilisateur est responsable de l’utilisation qu’il fait du site et des contenus qu’il publie.
            </p>

            <h2 class="text-2xl font-semibold">6. Liens externes</h2>
            <p>
                MoodSocial peut contenir des liens vers des sites tiers. Nous n’exerçons aucun contrôle sur ces sites et ne pouvons être tenus responsables de leur contenu.
            </p>

            <h2 class="text-2xl font-semibold">7. Loi applicable</h2>
            <p>
                Les présentes mentions légales sont régies par la loi française.  
                Tout litige sera soumis aux tribunaux compétents.
            </p>
        </section>
    </main>

    <script src="/resources/js/theme.js"></script>
</body>

<?php include($root . '/resources/layout/footer.php') ?>
