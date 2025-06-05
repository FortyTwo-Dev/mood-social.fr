<?php include($root . '/resources/layout/account/head.php'); ?>

<body class="dark:text-ms-white dark:bg-ms-black text-ms-black bg-ms-white">
    <?php require_once($root . '/resources/layout/notification/base.php') ?>

    <div class="mx-4 min-h-screen max-w-screen-xl sm:mx-8 xl:mx-auto">
        <h1 class="border-b py-6 text-4xl font-semibold">Settings</h1>
        <div class="grid grid-cols-8 pt-3 sm:grid-cols-10">
            <div class="col-span-2 hidden sm:block">
                <ul>
                    <a href="/account/show/" class="mt-5 block cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700">Accounts</a>
                    <a href="/account/profile/show/" class="mt-5 block cursor-pointer border-l-2 border-l-blue-700 px-2 py-2 font-semibold text-blue-700 transition hover:border-l-blue-700 hover:text-blue-700">Profile</a>
                    <a href="/account/billing/show/" class="mt-5 block cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700">Billing</a>
                    <a href="/account/notification/show/" class="mt-5 block cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700">Notifications</a>
                </ul>
            </div>
            <div id="toggle-theme-button" class="fixed right-0 top-0 mr-8 max-2xl:hidden">
                <div class="relative mr-8 mt-6">
                    <svg id="moon" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                    </svg>
                    <svg id="sun" class="absolute stroke-[1.5px] mr-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="4" />
                        <path d="M12 2v2" />
                        <path d="M12 20v2" />
                        <path d="m4.93 4.93 1.41 1.41" />
                        <path d="m17.66 17.66 1.41 1.41" />
                        <path d="M2 12h2" />
                        <path d="M20 12h2" />
                        <path d="m6.34 17.66-1.41 1.41" />
                        <path d="m19.07 4.93-1.41 1.41" />
                    </svg>
                </div>
            </div>

            <div class="col-span-8 overflow-hidden rounded-xl sm:px-8 sm:shadow">
                <div class="pt-6">
                    <h2 class="text-2xl font-semibold">Profile</h2>
                </div>

                <hr class="mt-4 mb-8" />

                <div class="flex flex-col items-center gap-4">
                    <div class="relative w-32 h-32">

                        <div class="w-full h-full rounded-full bg-gray-300"></div>


                        <?php if (!empty($image['head'])): ?>
                            <img src="data:image/png;base64,<?= $image['head'] ?>" class="  absolute w-36 h-36 object-cover z-20 top-0" alt="head">
                        <?php endif; ?>
                        <?php if (!empty($image['beard'])): ?>
                            <img src="data:image/png;base64,<?= $image['beard'] ?>" class=" absolute w-24 h-24 object-cover z-20 -bottom-14 right-4" alt="beard">
                        <?php endif; ?>
                        <?php if (!empty($image['hat'])): ?>
                            <img src="data:image/png;base64,<?= $image['hat'] ?>" class="  absolute w-24 h-24 object-cover z-30 -top-13 right-4" alt="hat">
                        <?php endif; ?>

                        <button id="toggle-options"
                            class="absolute bottom-1 right-1 bg-white rounded-full p-1 shadow hover:bg-gray-100 z-40">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="text-gray-600">
                                <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                <path d="m15 5 4 4" />
                            </svg>
                        </button>
                    </div>


                    <div id="options" class="w-full max-w-md mt-6 hidden">
                        <div class="flex items-center justify-between px-8">
                            <button id="btn-hat" class="bg-ms-<?= $mood['color'] ?> hover:underline text-ms-<?= $mood['text_color'] ?> font-bold py-2 px-4 rounded">Hat</button>
                            <button id="btn-head" class="bg-ms-<?= $mood['color'] ?> hover:underline text-ms-<?= $mood['text_color'] ?> font-bold py-2 px-4 rounded">Head</button>
                            <button id="btn-beard" class="bg-ms-<?= $mood['color'] ?> hover:underline text-ms-<?= $mood['text_color'] ?> font-bold py-2 px-4 rounded">Beard</button>

                            <form action="/custom/store/" method="POST">
                                <input type="hidden" id="head" name="head" value="">
                                <input type="hidden" id="beard" name="beard" value="">
                                <input type="hidden" id="hat" name="hat" value="">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Valider</button>
                            </form>


                        </div>
                    </div>
                </div>

                <div id="display-area" class="flex justify-center mt-6"></div>

                <hr class="mt-8 mb-4" />
                <div class="text-center"></div>
                <div class="pt-6 w-full">
                    <h2 class="text-2xl font-semibold">Description</h2>
                    <form action="/account/profile/update/" method="POST">
                        <div class="flex w-full">
                            <textarea class="flex w-full" name="description" id="<?= $userId ?>"></textarea>
                        </div>
                        <div class="w-full flex justify-end">
                            <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" type="submit">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>

    <script src="/resources/js/custom.js"></script>
    <script src="/resources/js/theme.js"></script>
</body>

</html>