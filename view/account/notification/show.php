<?php include($root . '/resources/layout/account/head.php'); ?>

<body class="dark:text-ms-white dark:bg-ms-black text-ms-black bg-ms-white">

  <div class="mx-4 min-h-screen max-w-screen-xl sm:mx-8 xl:mx-auto">
    <h1 class="border-b py-6 text-4xl font-semibold">Settings</h1>
    <div class="grid grid-cols-8 pt-3 sm:grid-cols-10">
      <div class="relative my-4 w-56 sm:hidden">
        <input class="peer hidden" type="checkbox" name="select-1" id="select-1" />
        <label for="select-1" class="flex w-full cursor-pointer select-none rounded-lg border p-2 px-3 text-sm text-gray-700 ring-blue-700 peer-checked:ring">Notifications </label>
        <svg xmlns="http://www.w3.org/2000/svg" class="pointer-events-none absolute right-0 top-3 ml-auto mr-5 h-4 text-slate-700 transition peer-checked:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
        <ul class="max-h-0 select-none flex-col overflow-hidden rounded-b-lg shadow-md transition-all duration-300 peer-checked:max-h-56 peer-checked:py-3">
          <li class="cursor-pointer px-3 py-2 text-sm hover:bg-blue-700 hover:text-white">Notifications</li>
          <li class="cursor-pointer px-3 py-2 text-sm hover:bg-blue-700 hover:text-white">Team</li>
          <li class="cursor-pointer px-3 py-2 text-sm hover:bg-blue-700 hover:text-white">Others</li>
        </ul>
      </div>

      <div class="col-span-2 hidden sm:block">
        <ul>
          <a
            href='/account/show/'
            class="mt-5 block cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700">
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
            class="mt-5 block cursor-pointer border-l-2 border-l-blue-700 px-2 py-2 font-semibold text-blue-700 transition hover:border-l-blue-700 hover:text-blue-700">
            Notifications
          </a>
        </ul>
      </div>



      <div class="col-span-8 overflow-hidden rounded-xl sm:px-8 sm:shadow">
        <div class="pt-4 pb-8">
          <form class="space-y-4">
            <div>
              <label for="state" class="block text-sm font-medium text-gray-700 mb-2">
                État/Région
              </label>
              <input
                type="text"
                id="state"
                name="state"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                placeholder="Entrez l'état ou la région">
            </div>

            <div>
              <label for="visibility" class="block text-sm font-medium text-gray-700 mb-2">
                Visibilité
              </label>
              <select
                id="visibility"
                name="visibility"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                <option value="">Sélectionnez la visibilité</option>
                <option value="public">Public</option>
                <option value="private">Privé</option>
              </select>
            </div>

            <div>
              <label for="street" class="block text-sm font-medium text-gray-700 mb-2">
                Rue
              </label>
              <input
                type="text"
                id="street"
                name="street"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                placeholder="Entrez l'adresse de la rue">
            </div>

            <div>
              <label for="city" class="block text-sm font-medium text-gray-700 mb-2">
                Ville
              </label>
              <input
                type="text"
                id="city"
                name="city"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                placeholder="Entrez la ville">
            </div>

            <div>
              <label for="country" class="block text-sm font-medium text-gray-700 mb-2">
                Pays
              </label>
              <input
                type="text"
                id="country"
                name="country"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                placeholder="Entrez le pays">
            </div>

            <div class="pt-4">
              <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 font-medium">
                Envoyer
              </button>
            </div>
          </form>
        </div>
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
        <script src="/resources/js/theme.js"></script>
      </div>
</body>