<header class="sticky top-0 z-50 flex items-center h-16 gap-4 px-5 bg-white">
    <!-- Topbar Brand Logo -->
    <a href="/" class="flex md:hidden">
        <img src="{{ asset('assets/images/logo.png') }}" class="h-6" alt="Small logo">
    </a>

    <!-- Sidenav Menu Toggle Button -->
    <button id="button-toggle-menu"
        class="p-2 text-gray-500 rounded-full cursor-pointer hover:text-gray-600 waves-effect me-auto"
        data-hs-overlay="#app-menu" aria-controls="application-sidebar" aria-label="Toggle navigation">
        <span class="sr-only">Menu Toggle Button</span>
        <span class="flex items-center justify-center w-6 h-6">
            <i class="text-2xl ti ti-menu-2"></i>
        </span>
    </button>

    <!-- Profile Dropdown Button -->
    <div class="relative">
        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
            <button type="button" class="flex items-center gap-2 hs-dropdown-toggle nav-link">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="user-image" class="h-10 rounded-full">
                <span class="items-center hidden md:flex">
                    <h5 class="text-base">Administrator</h5>
                    <i class="text-sm ti ti-chevron-down ms-2"></i>
                </span>
            </button>
            <div
                class="hs-dropdown-menu duration mt-2 min-w-[12rem] rounded-lg border border-default-200 bg-white p-2 opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100 dark:bg-default-50 hidden">
                <a class="flex items-center px-3 py-2 text-sm text-gray-800 rounded-md hover:bg-gray-100"
                    href="#">
                    Profile
                </a>
                <a class="flex items-center px-3 py-2 text-sm text-gray-800 rounded-md hover:bg-gray-100"
                    href="#">
                    Logout
                </a>
            </div>
        </div>
    </div>
</header>
