<!-- A Valider W3C -->
<main class="flex flex-col justify-center items-center gap-6 h-svh">
    <h1 class="text-6xl font-semibold">Créer un compte</h1>
    <p class="text-lg">Page pour vous créez un compte</p>
    
    <div class="max-w-lg w-full flex flex-col gap-4">
        <label for="e-mail">Email<span class="text-ms-<?=$mood['color']?>">*</span></label>
        <div class="border border-ms-<?=$mood['color']?> px-8 py-2 rounded-md">
            <input id="e-mail" type="text" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez votre e-mail">
        </div>
    </div>
    
    <div class="max-w-lg w-full flex flex-col gap-4 mx-4">
        <label for="password">Mot de passe<span class="text-ms-<?=$mood['color']?>">*</span></label>
        <div class="border border-ms-<?=$mood['color']?> px-8 py-2 rounded-md">
            <input id="password" type="password" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez votre mot de passe">
        </div>
    </div>
    <div class="max-w-lg w-full flex flex-col gap-4 mx-4">
        <label for="password">Confirmer le mot de passe<span class="text-ms-<?=$mood['color']?>">*</span></label>
        <div class="border border-ms-<?=$mood['color']?> px-8 py-2 rounded-md">
            <input id="password" type="password" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez votre mot de passe">
        </div>
    </div>
    <button class="max-w-lg w-full py-2 bg-ms-<?=$mood['color']?> rounded-md hover:underline text-ms-<?=$mood['text_color']?>">S'inscrire</button>
</main>