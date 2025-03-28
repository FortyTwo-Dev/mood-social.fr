<header class="relative z-30">
    <nav class="w-screen fixed bg-ms-white dark:bg-ms-black transition-transform p-5 border-b border-ms-<?=$color[$i]['color']?>">
        <div class="w-full flex justify-center items-center">
            <div class="w-full flex justify-between items-center max-w-2xs sm:max-w-7xl text-lg">
                <div class="flex gap-4 items-center justify-center">
                    <img class="w-8 h-8" src="/resources/assets/svg/logo.svg" alt="Logo MoodSocal"/>
                    <span class="text-xl font-bold">MoodSocial</span>
                </div>
                <ul class="sm:flex gap-8 font-medium hidden">
                    <li class="hover:underline"><a href="/">Accueil</a></li>
                    <li class="hover:underline"><a href="/pricing/">Tarif</a></li>
                    <li class="hover:underline"><a href="/auth/login/">Connexion</a></li>
                </ul>
                <div id="nav-button-open" class="sm:hidden flex">
                    <svg class="stroke-ms-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                </div>
            </div>
        </div>
    </nav>
    <nav id="nav" class="fixed h-screen w-screen bg-ms-white dark:bg-ms-black hidden">
        <div id="nav-button-close" class="absolute top-0 right-0 mt-4 mr-4">
            <svg class=" stroke-2 dark:stroke-ms-white stroke-ms-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </div>
        <div class="h-full w-full flex flex-col items-center dark:text-ms-white text-ms-black">
            <div class="basis-1/6 h-full w-full flex gap-4 items-center justify-center border-b border-ms-<?=$color[$i]['color']?>">
                <img class="w-8 h-8" src="/resources/assets/svg/logo.svg" alt="Logo MoodSocal"/>
                <span class="text-xl font-bold">MoodSocial</span>
            </div>
            <ul class="basis-5/6 h-full w-full flex flex-col justify-center items-center gap-8 font-medium">
                <li class=" text-2xl"><a href="">Accueil</a></li>
                <li class=" text-2xl"><a href="/pricing/">Tarif</a></li>
                <li class=" text-2xl"><a href="/auth/login/">Connexion</a></li>
            </ul>
        </div>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nav = document.getElementById('nav');
        const navButtonOpen = document.getElementById('nav-button-open');
        const navButtonClose = document.getElementById('nav-button-close');

        navButtonOpen.addEventListener('click', function () {
            nav.classList.remove('hidden');
            nav.classList.add('nav-slide');
        });

        navButtonClose.addEventListener('click', function () {
            nav.classList.add('hidden');
            nav.classList.remove('nav-slide');
        });
    })


</script>