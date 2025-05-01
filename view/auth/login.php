<dialog id="captcha-dialog">
    <div class="w-[425px] p-6 fixed flex flex-col gap-6 items-center justify-center z-50 left-1/2 top-1/2 -translate-1/2 rounded-md bg-ms-white dark:bg-ms-black border-1 border-ms-grey dark:border-ms-white">
        <div id="captcha-svg"></div>
        <p id="captcha-question" class="font-medium text-ms-black dark:text-white" ></p>
        <ul id="answers-list" class="flex gap-4">
            <li>
                <input class="hidden peer" type="radio" id="captcha-answer-one" name="answer" onclick="submitCaptcha">
                <label for="captcha-answer-one" class="relative py-2 px-4 flex items-center justify-center cursor-pointer peer-checked:ring-2 dark:peer-checked:ring-ms-white peer-checked:ring-ms-black bg-ms-grey font-medium text-white rounded-md">
                    <span class="capitalize" id="captcha-answer-one-text"></span>
                </label>
            </li>
            <li>
                <input class="hidden peer" type="radio" id="captcha-answer-two" name="answer">
                <label for="captcha-answer-two" class="relative py-2 px-4 flex items-center justify-center cursor-pointer peer-checked:ring-2 dark:peer-checked:ring-ms-white peer-checked:ring-ms-black bg-ms-grey font-medium text-white rounded-md">
                    <span class="capitalize" id="captcha-answer-two-text"></span>
                </label>
            </li>
            <li>
                <input class="hidden peer" type="radio" id="captcha-answer-three" name="answer">
                <label for="captcha-answer-three" class="relative py-2 px-4 flex items-center justify-center cursor-pointer peer-checked:ring-2 dark:peer-checked:ring-ms-white peer-checked:ring-ms-black bg-ms-grey font-medium text-white rounded-md">
                <span class="capitalize" id="captcha-answer-three-text"></span>
                </label>
            </li>
        </ul>
    </div>
</dialog>

<main>

    <form method="POST" action="/auth/login/store/" class="flex flex-col justify-center items-center gap-6 h-svh">
        <h1 class="text-6xl font-semibold">Se connecter</h1>
        <p class="text-lg">Page pour vous connectez</p>
        
        <div class="max-w-lg w-full flex flex-col gap-4">
            <label for="email">Email<span class="text-ms-<?=$mood['color']?>">*</span></label>
            <div class="border border-ms-<?=$mood['color']?> px-8 py-2 rounded-md">
                <input id="email" type="text" name="email" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez votre e-mail">
            </div>
        </div>
        
        <div class="max-w-lg w-full flex flex-col gap-4 mx-4">
            <label for="password">Mot de passe<span class="text-ms-<?=$mood['color']?>">*</span></label>
            <div class="border border-ms-<?=$mood['color']?> px-8 py-2 rounded-md">
                <input id="password" type="password" name="password" class="w-full h-full outline-hidden focus:outline-hidden focus:ring-0 focus:border-transparent" placeholder="Entrez votre mot de passe">
            </div>
        </div>

        <div class="max-w-lg w-full flex flex-col gap-4 mx-4">
            <label class="flex items-center justify-between gap-6 border border-ms-<?=$mood['color']?> bg-ms-<?=$mood['color']?> px-8 py-4 rounded-md">

                <input type="checkbox" id="captcha-generate" class="w-6 h-6 border-transparent focus:ring-2 focus:ring-ms-<?=$mood['color']?> outline-hidden rounded-b-full">

                <input type="checkbox" name="captcha" id="captcha-validate" class="w-6 h-6 border-transparent focus:ring-2 focus:ring-ms-<?=$mood['color']?> outline-hidden rounded-b-full hidden">

                <svg class="w-6 h-6 animate-spin text-<?=$mood['text_color']?> hidden" id="captcha-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>

                <span class="text-<?=$mood['text_color']?> font-semibold text-xl">MoodCaptcha</span>
            </label>
        </div>

        <button class="max-w-lg w-full py-2 bg-ms-<?=$mood['color']?> rounded-md hover:underline text-ms-<?=$mood['text_color']?>">Se connecter</button>
        <a href="#" class=" underline">Mot de passe oubliée</a>
    </form>

</main>