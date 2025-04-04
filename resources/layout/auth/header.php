<header class="w-full fixed flex justify-around items-center mt-4">
    <a href="/" class="flex gap-4 items-center">
        <img class="w-12 h-12" src="/resources/assets/svg/logo.svg" alt="Logo MoodSocal"/>
        <p class="text-3xl font-semibold">MoodSocial</p>
    </a>
    <div>
        <p><?=$text?> <a href="<?=$link?>" class="underline"><?=$text_link?></a></p>
    </div>
    <div id="toggle-theme-button" class="absolute right-0 top-0 mr-8">
        <div class="relative mr-8 mt-3.5">
            <svg id="moon" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
            <svg id="sun" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
        </div>
    </div>
</header>