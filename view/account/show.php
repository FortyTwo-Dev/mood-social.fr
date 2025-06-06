<?php include($root . '/resources/layout/account/head.php'); ?>

<body class="dark:text-ms-white dark:bg-ms-black text-ms-black bg-ms-white">
    <?php require_once($root . '/resources/layout/notification/base.php') ?>

    <div class="mx-4 min-h-screen max-w-screen-xl sm:mx-8 xl:mx-auto">
        <h1 class="border-b py-6 text-4xl font-semibold">Settings</h1>
        <div class="grid grid-cols-8 pt-3 sm:grid-cols-10">
            <div class="col-span-2 hidden sm:block">
                <ul>
                    <a
                        href='/account/show/'
                        class="mt-5 block cursor-pointer border-l-2 border-l-blue-700 px-2 py-2 font-semibold text-blue-700 transition hover:border-l-blue-700 hover:text-blue-700">
                        Accounts
                    </a>
                    <a
                        href='/account/profile/show/'
                        class="mt-5 block cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700">
                        Profile
                    </a>
                    <a
                        href='/account/billing/show/'
                        class="mt-5 block cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700">
                        Billing
                    </a>
                    <a
                        href='/account/notification/show/'
                        class="mt-5 block cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700">
                        Notifications
                    </a>
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
            <div
                class="col-span-8 overflow-hidden rounded-xl sm:px-8 sm:shadow">
                <div class="pt-4">
                    <h1 class="py-2 text-2xl font-semibold">Account settings</h1>
                </div>
                <hr class="mt-4 mb-8" />
                <p class="py-2 text-xl font-semibold">Email Address</p>
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-gray-600">
                        Your email address is <strong><?=GetEmail()?></strong>
                    </p>
                    <button
                        class="inline-flex text-sm font-semibold text-blue-600 underline decoration-2">
                        Change
                    </button>
                </div>
                <hr class="mt-4 mb-8" />
                <p class="py-2 text-xl font-semibold">Password</p>
                <div class="flex items-center">
                    <div
                        class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-3">
                        <label for="login-password">
                            <span class="text-sm text-gray-500">Current Password</span>
                            <div
                                class="relative flex overflow-hidden rounded-md border-2 transition focus-within:border-blue-600">
                                <input
                                    type="password"
                                    id="login-password"
                                    class="w-full flex-shrink appearance-none border-gray-300 bg-white py-2 px-4 text-base text-gray-700 placeholder-gray-400 focus:outline-none"
                                    placeholder="***********" />
                            </div>
                        </label>
                        <label for="login-password">
                            <span class="text-sm text-gray-500">New Password</span>
                            <div
                                class="relative flex overflow-hidden rounded-md border-2 transition focus-within:border-blue-600">
                                <input
                                    type="password"
                                    id="login-password"
                                    class="w-full flex-shrink appearance-none border-gray-300 bg-white py-2 px-4 text-base text-gray-700 placeholder-gray-400 focus:outline-none"
                                    placeholder="***********" />
                            </div>
                        </label>
                        <label for="login-password">
                            <span class="text-sm text-gray-500">Comfirm New Password</span>
                            <div
                                class="relative flex overflow-hidden rounded-md border-2 transition focus-within:border-blue-600">
                                <input
                                    type="password"
                                    id="login-password"
                                    class="w-full flex-shrink appearance-none border-gray-300 bg-white py-2 px-4 text-base text-gray-700 placeholder-gray-400 focus:outline-none"
                                    placeholder="***********" />
                            </div>
                        </label>
                    </div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="mt-5 ml-2 h-6 w-6 cursor-pointer text-sm font-semibold text-gray-600 underline decoration-2"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                </div>
                
                <button class="mt-4 rounded-lg bg-blue-600 px-4 py-2 text-white">
                    Save Password
                </button>
                <hr class="mt-4 mb-8" />

                <div class="mb-10">
                    <p class="py-2 text-xl font-semibold">Delete Account</p>
                    <p
                        class="inline-flex items-center rounded-full bg-rose-100 px-4 py-1 text-rose-600">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 h-5 w-5"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Proceed with caution
                    </p>
                    <p class="mt-2">
                        Make sure you have taken backup of your account in case you ever need
                        to get access to your data. We will completely wipe your data. There
                        is no way to access your account after this action.
                    </p>
                    <div class="ml-auto flex gap-3">
                        <form action="/account/delete/" method="POST" onsubmit="return confirm('Es-tu sûr de vouloir supprimer toutes tes données ?');">
                            <button
                                type="submit"
                                name="delete_user"
                                class="text-sm font-semibold text-rose-600 underline decoration-2 cursor-pointer">
                                Continue with deletion
                            </button>
                        </form>

                        <button
                            class="text-sm font-semibold text-blue-600 underline decoration-2 cursor-pointer">
                            Extraire au format pdf
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/resources/js/theme.js"></script>
</body>

</html>