<!-- A Valider W3C -->
<main>
    <form method="POST" action="/auth/register/store/" class="flex flex-col justify-center items-center gap-6 h-svh">
        <h1 class="text-6xl font-semibold">Créer un compte</h1>
        <p class="text-lg">Page pour vous créez un compte</p>
        
        <div class="max-w-lg w-full flex flex-col gap-4">
            <label for="e-mail">Email<span class="text-ms-<?=$mood['color']?>">*</span></label>
            <div class="border border-ms-<?=$mood['color']?> px-8 py-2 rounded-md">
                <input id="e-mail" name="email" type="text" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez votre e-mail">
            </div>
        </div>
        
        <div class="max-w-lg w-full flex flex-col gap-4 mx-4">
            <label for="password">Mot de passe<span class="text-ms-<?=$mood['color']?>">*</span></label>
            <div class="border border-ms-<?=$mood['color']?> px-8 py-2 rounded-md">
                <input id="password" type="password" name="password" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez votre mot de passe">
            </div>
        </div>
        <div class="max-w-lg w-full flex flex-col gap-4 mx-4">
            <label for="password_confirmation">Confirmer le mot de passe<span class="text-ms-<?=$mood['color']?>">*</span></label>
            <div class="border border-ms-<?=$mood['color']?> px-8 py-2 rounded-md">
                <input id="password_confirmation" type="password" name="password_confirmation" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez votre mot de passe">
            </div>
        </div>
        <button type="submit" class="max-w-lg w-full py-2 bg-ms-<?=$mood['color']?> rounded-md hover:underline text-ms-<?=$mood['text_color']?> cursor-pointer">S'inscrire</button>
    </form>
</main>