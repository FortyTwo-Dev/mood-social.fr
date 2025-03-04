<!-- Validé W3C -->

<?php include( $root . '/resources/layout/auth/head.php' ) ?>

<body class="relative">

    <header class="w-full fixed flex justify-around items-center mt-4">
        <div class="flex gap-4 items-center">
            <img class="w-12 h-12" src="/resources/assets/svg/logo.svg" alt="Logo MoodSocal"/>
            <p class="text-3xl font-semibold">MoodSocial</p>
        </div>
        <div>
            <p>Don't have an account? <a href="#signup" class="underline">Sign up</a></p>
        </div>
    </header>
    <main class="flex flex-col justify-center items-center gap-6 h-svh">
        <h1 class="text-6xl font-semibold">Se connecter</h1>
        <p class="text-lg">Page pour vous connectez</p>

        <div class="max-w-lg w-full flex flex-col gap-4">
            <label for="e-mail">Email<span class="text-ms-<?=$color[$i]['color']?>">*</span></label>
            <div class="border border-ms-<?=$color[$i]['color']?> px-8 py-2 rounded-md">
                <input id="e-mail" type="text" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez votre e-mail">
            </div>
        </div>

        <div class="max-w-lg w-full flex flex-col gap-4 mx-4">
            <label for="password">Mot de passe<span class="text-ms-<?=$color[$i]['color']?>">*</span></label>
            <div class="border border-ms-<?=$color[$i]['color']?> px-8 py-2 rounded-md">
                <input id="password" type="password" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez votre mot de passe">
            </div>
        </div>
        <button class="max-w-lg w-full py-2 bg-ms-<?=$color[$i]['color']?> rounded-md hover:underline text-ms-<?=$color[$i]['text']?>">Se connecter</button>
        <a href="#" class=" underline">Mot de passe oubliée</a>
    </main>
    <footer class="w-full fixed flex items-center justify-center bottom-0 mb-4">
        <p class="">MoodSocial | All Right Reserved</p>
    </footer>
</body>
</html>