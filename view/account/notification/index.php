<?php include( $root . '/resources/layout/account/head.php' );?>

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
        <li class="cursor-pointer px-3 py-2 text-sm text-slate-600 hover:bg-blue-700 hover:text-white">Notifications</li>
        <li class="cursor-pointer px-3 py-2 text-sm text-slate-600 hover:bg-blue-700 hover:text-white">Team</li>
        <li class="cursor-pointer px-3 py-2 text-sm text-slate-600 hover:bg-blue-700 hover:text-white">Others</li>
      </ul>
    </div>

    <div class="col-span-2 hidden sm:block">
      <ul>
      <a
          href='/account/accounts/show/index.php'
          class="mt-5 block cursor-pointer border-l-2 border-l-blue-700 px-2 py-2 font-semibold text-blue-700 transition hover:border-l-blue-700 hover:text-blue-700"
        >
          Accounts
        </a>
        <a
          href='/account/profile/show/index.php'
          class="mt-5 block cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700"
        >
          Profile
        </a>
        <a
          href='/account/billing/show/index.php'
          class="mt-5 block cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700"
        >
          Billing
        </a>
        <a
          href='/account/notification/show/index.php'
          class="mt-5 block cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700"
        >
          Notifications
        </a>
      </ul>
    </div>

    <div class="col-span-8 overflow-hidden rounded-xl bg-gray-50 px-8 shadow">
      <div class="border-b pt-4 pb-8">
        <h1 class="py-2 text-2xl font-semibold">Notification settings</h1>
        <p class="font- text-slate-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
      </div>
      <div class="grid border-b py-6 sm:grid-cols-2">
        <div class="">
          <h2 class="text-lg font-semibold leading-4 text-slate-700">Comments</h2>
          <p class="font- text-slate-600">Lorem ipsum dolor, Alias eligendi laboriosam magni reiciendis neque.</p>
        </div>
        <div class="mt-4 flex items-center sm:justify-end">
          <div class="flex flex-col gap-3">
            <label for="push" class="relative inline-flex cursor-pointer items-center">
              <input type="checkbox" value="" id="push" class="peer sr-only" checked />
              <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800"></div>
              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Push</span>
            </label>
            <label for="email" class="relative inline-flex cursor-pointer items-center">
              <input type="checkbox" value="" id="email" class="peer sr-only" checked />
              <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800"></div>
              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Email</span>
            </label>
            <label for="sms" class="relative inline-flex cursor-pointer items-center">
              <input type="checkbox" value="" id="sms" class="peer sr-only" />
              <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800"></div>
              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">SMS</span>
            </label>
          </div>
        </div>
      </div>

      <div class="grid border-b py-6 sm:grid-cols-2">
        <div class="">
          <h2 class="text-lg font-semibold leading-4 text-slate-700">Reminders</h2>
          <p class="font- text-slate-600">Lorem ipsum dolor, Alias eligendi laboriosam magni reiciendis neque.</p>
        </div>
        <div class="mt-4 flex items-center sm:justify-end">
          <div class="flex flex-col gap-3">
            <label for="push" class="relative inline-flex cursor-pointer items-center">
              <input type="checkbox" value="" id="push" class="peer sr-only" />
              <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800"></div>
              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Push</span>
            </label>
            <label for="email" class="relative inline-flex cursor-pointer items-center">
              <input type="checkbox" value="" id="email" class="peer sr-only" checked />
              <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800"></div>
              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Email</span>
            </label>
            <label for="sms" class="relative inline-flex cursor-pointer items-center">
              <input type="checkbox" value="" id="sms" class="peer sr-only" />
              <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800"></div>
              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">SMS</span>
            </label>
          </div>
        </div>
      </div>
      <div class="grid border-b py-6 sm:grid-cols-2">
        <div class="">
          <h2 class="text-lg font-semibold leading-4 text-slate-700">Updates</h2>
          <p class="font- text-slate-600">Lorem ipsum dolor, Alias eligendi laboriosam magni reiciendis neque.</p>
        </div> 
        <div class="mt-4 flex items-center sm:justify-end">
          <div class="flex flex-col gap-3">
            <label for="push" class="relative inline-flex cursor-pointer items-center">
              <input type="checkbox" value="" id="push" class="peer sr-only" />
              <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800"></div>
              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Push</span>
            </label>
            <label for="email" class="relative inline-flex cursor-pointer items-center">
              <input type="checkbox" value="" id="email" class="peer sr-only" />
              <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800"></div>
              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Email</span>
            </label>
            <label for="sms" class="relative inline-flex cursor-pointer items-center">
              <input type="checkbox" value="" id="sms" class="peer sr-only" />
              <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:ring-blue-800"></div>
              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">SMS</span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


