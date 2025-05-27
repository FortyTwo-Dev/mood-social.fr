<nav class="w-min flex items-start justify-start">
    <ul class="w-full mt-6 flex flex-col max-md:pl-4 gap-6">
        <li class="w-full py-2 md:px-8 text-4xl font-bold hover:underline">
            <a href="/talk/feed/" class="flex items-center gap-4">
                <img class="w-12 h-12" src="/resources/assets/svg/logo.svg" alt="Logo MoodSocal"/>
                <p class="max-md:hidden">MoodSocial</p>
            </a>
        </li>
        <li class="w-full py-2 md:px-8 text-3xl font-semibold hover:underline">
            <a href="/talk/feed/" class="flex items-center gap-4">
                <svg class="stroke-2 size-8 stroke-ms-<?=$mood['color']?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="9" y2="9"/><line x1="4" x2="20" y1="15" y2="15"/><line x1="10" x2="8" y1="3" y2="21"/><line x1="16" x2="14" y1="3" y2="21"/></svg>
                <p class="max-md:hidden">Explorer</p>
            </a>
        </li>
        <li class="w-full py-2 md:px-8 text-3xl font-semibold hover:underline">
            <a href="/talk/feed/" class="flex items-center gap-4">
                <svg class="stroke-2 size-8 stroke-ms-<?=$mood['color']?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <p class="max-md:hidden">Profil</p>
            </a>
        </li>
        <li class="w-full py-2 md:px-8 text-3xl font-semibold hover:underline">
            <a href="/talk/" class="flex items-center gap-4">
                <svg class="stroke-2 size-8 stroke-ms-<?=$mood['color']?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                <p class="max-md:hidden">Message</p>
            </a>
        </li>
        <li class="w-full py-2 md:px-8 text-3xl font-semibold hover:underline">
            <a href="/talk/feed/" class="flex items-center gap-4">
                <svg class="stroke-2 size-8 stroke-ms-<?=$mood['color']?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                <p class="max-md:hidden">Likes</p>
            </a>
        </li>
        <li class="w-full py-2 md:px-8 text-xl font-semibold max-md:hidden">
            <button id="button-post" type="button" class="flex rounded-md hover:underline w-full py-2 items-center justify-center gap-4 bg-ms-<?=$mood['color']?> text-ms-<?=$mood['text_color']?> cursor-pointer">Share your mood
            </button>
        </li>
    </ul>
</nav>