<nav x-data="{ open: false }" class="d-flex bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <a class="p-1" href="https://github.com/monish-khatri" title="monish-khatri" rel="me" target=”_blank”>
                    <i class="fa fa-github fa-lg" aria-hidden="true"></i>
                </a>
                <a class="p-1" href="https://www.linkedin.com/in/monish-khatri-10" title="monish-khatri" rel="me" target=”_blank”>
                    <i class="fa fa-linkedin fa-lg" aria-hidden="true"></i>
                </a>
                <a class="p-1" href="https://stackoverflow.com/users/15352279/monish-khatri" title="monish-khatri" rel="me" target=”_blank”>
                    <i class="fa fa-stack-overflow fa-lg" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
