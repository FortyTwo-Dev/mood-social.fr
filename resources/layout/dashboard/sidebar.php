<nav class="w-full col-span-2 flex items-start justify-start border-r-2 border-ms-grey">
    <ul class="w-full mt-6 flex flex-col gap-6">
        <li class="w-full py-2 px-4 text-2xl font-medium <?php if ($_SERVER['REQUEST_URI'] === "/dashboard/"): ?> bg-ms-black text-white <?php else: ?> hover:bg-ms-black/20 <?php endif; ?>">
            <a href="/dashboard/" class="flex items-center gap-4">
                <svg class="stroke-2 <?php if ($_SERVER['REQUEST_URI'] === "/dashboard/"): ?> stroke-ms-white <?php else: ?> stroke-ms-black <?php endif; ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="7" height="9" x="3" y="3" rx="1" />
                    <rect width="7" height="5" x="14" y="3" rx="1" />
                    <rect width="7" height="9" x="14" y="12" rx="1" />
                    <rect width="7" height="5" x="3" y="16" rx="1" />
                </svg>
                <p>Tableau de bord</p>
            </a>
        </li>
        <li class="w-full py-2 px-4 text-2xl font-medium <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/dashboard/analytics/")): ?> bg-ms-yellow text-black <?php else: ?> hover:bg-ms-yellow/20 <?php endif; ?>">
            <a href="/dashboard/analytics/" class="flex items-center gap-4">
                <svg class="stroke-ms-black stroke-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 3v16a2 2 0 0 0 2 2h16" />
                    <path d="M7 11.207a.5.5 0 0 1 .146-.353l2-2a.5.5 0 0 1 .708 0l3.292 3.292a.5.5 0 0 0 .708 0l4.292-4.292a.5.5 0 0 1 .854.353V16a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1z" />
                </svg>
                <p>Analytics</p>
            </a>
        </li>
        <li class="w-full py-2 px-4 text-2xl font-medium <?php if (str_starts_with($_SERVER['REQUEST_URI'], '/dashboard/users/')): ?> bg-ms-blue text-ms-white <?php else: ?> hover:bg-ms-blue/20 <?php endif; ?>">
            <a href="/dashboard/users/" class="flex items-center gap-4">
                <svg class="stroke-2 <?php if (str_starts_with($_SERVER['REQUEST_URI'], '/dashboard/users/')): ?> stroke-ms-white <?php else: ?> stroke-ms-black <?php endif; ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
                <p>Utilisateurs</p>
            </a>
        </li>
        <li class="w-full py-2 px-4 text-2xl font-medium <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/dashboard/newsletter/")): ?> bg-ms-purple text-white <?php else: ?> hover:bg-ms-purple/20 <?php endif; ?>">
            <a href="/dashboard/newsletter/" class="flex items-center gap-4">
                <svg class="stroke-2 <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/dashboard/newsletter/")): ?> stroke-ms-white <?php else: ?> stroke-ms-black <?php endif; ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="16" height="13" x="6" y="4" rx="2" />
                    <path d="m22 7-7.1 3.78c-.57.3-1.23.3-1.8 0L6 7" />
                    <path d="M2 8v11c0 1.1.9 2 2 2h14" />
                </svg>
                <p>Newsletter</p>
            </a>
        </li>
        <li class="w-full py-2 px-4 text-2xl font-medium <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/dashboard/security/")): ?> bg-ms-red text-white <?php else: ?> hover:bg-ms-red/20 <?php endif; ?>">
            <a href="/dashboard/security/" class="flex items-center gap-4">
                <svg class="stroke-2 <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/dashboard/security/")): ?> stroke-ms-white <?php else: ?> stroke-ms-black <?php endif; ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                    <path d="M12 22V2" />
                </svg>
                <p>Sécurités</p>
            </a>
        </li>
        <li class="w-full py-2 px-4 text-2xl font-medium <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/dashboard/reactions/")): ?> bg-ms-yellow text-ms-black <?php else: ?> hover:bg-ms-yellow/20 <?php endif; ?>">
            <a href="/dashboard/reactions/" class="flex items-center gap-4">

                <svg class="stroke-2 <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/dashboard/reactions/")): ?> stroke-ms-black <?php else: ?> stroke-ms-black <?php endif; ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11v1a10 10 0 1 1-9-10" />
                    <path d="M8 14s1.5 2 4 2 4-2 4-2" />
                    <line x1="9" x2="9.01" y1="9" y2="9" />
                    <line x1="15" x2="15.01" y1="9" y2="9" />
                    <path d="M16 5h6" />
                    <path d="M19 2v6" />
                </svg>
                <p>Reactions</p>
            </a>
        </li>

        <li class="w-full py-2 px-4 text-2xl font-medium <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/dashboard/profil/")): ?> bg-ms-red text-white <?php else: ?> hover:bg-ms-red/20 <?php endif; ?>">
            <a href="/dashboard/profil/" class="flex items-center gap-4">
                <svg class="stroke-2 <?php if (str_starts_with($_SERVER['REQUEST_URI'], "/dashboard/profil/")): ?> stroke-ms-white <?php else: ?> stroke-ms-black <?php endif; ?>" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                    <path d="M12 22V2" />
                </svg>
                <p>Profil</p>
            </a>
        </li>
    </ul>
</nav>