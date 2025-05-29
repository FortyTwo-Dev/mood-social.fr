<main>

    <form method="POST" action="/auth/username/store/" class="flex flex-col justify-center items-center gap-6 h-svh">
        <h1 class="text-6xl font-semibold">Choisi ton Nom d'utilisateur</h1>
        <p class="text-lg">Page pour choisir votre nom d'utilisateur visible par tous.</p>
        
        <div class="max-w-lg w-full flex flex-col gap-4">
            <label for="username">Nom d'utilisateur<span class="text-ms-<?=$mood['color']?>">*</span></label>
            <div class="border border-ms-<?=$mood['color']?> px-8 py-2 rounded-md">
                <input id="username" type="text" name="username" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez votre nom d'utilisateur">
            </div>
        </div>

        <button type="submit" class="max-w-lg w-full py-2 bg-ms-<?=$mood['color']?> rounded-md hover:underline text-ms-<?=$mood['text_color']?> cursor-pointer">Valider</button>
    </form>

</main>