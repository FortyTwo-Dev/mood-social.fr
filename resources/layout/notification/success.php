<div id="popup" class="absolute right-0 top-0 m-6 max-w-xs w-full rounded-md border-2 border-green-500 bg-ms-white  dark:bg-ms-black px-8 py-4 z-50">
    <div id="closePopup" class="absolute right-0 top-0 m-3">
    <svg class="stroke-2 stroke-slate-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
    </div>
    <div class="flex flex-col gap-2">
        <div class="flex gap-2">
            <svg class="stroke-2 stroke-green-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
            <p class="text-green-500 font-semibold">Réussie</p>
        </div>
        <div>
            <p><?=$_COOKIE['flash_message_success']?></p>
        </div>
        <div class="mt-2">
            <div class="bg-green-500 w-0 progress-bar h-2 rounded-md"></div>
        </div>
    </div>
</div>