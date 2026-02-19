<script setup>
import { ref, onMounted } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);

const updateDarkMode = () => {
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
};

onMounted(() => {
    updateDarkMode();
    window.addEventListener('storage', updateDarkMode);
});
</script>

<template>
    <div class="min-h-screen transition-colors duration-500 bg-gray-100 dark:bg-gray-900">
        <nav class="sticky top-0 z-40 bg-white border-b border-gray-100 dark:border-gray-700 dark:bg-gray-800">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex items-center shrink-0">
                            <Link :href="route('dashboard')" class="flex items-center gap-2">
                                <img src="/images/logo.png" alt="iNeedSocial Logo" class="w-auto h-9" />
                                <span class="hidden text-xl font-bold text-gray-800 dark:text-white sm:block">
                                    iNeedSocial
                                </span>
                            </Link>
                        </div>

                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                Dashboard
                            </NavLink>
                        </div>
                    </div>

                    <div class="hidden gap-4 sm:ms-6 sm:flex sm:items-center">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300">
                                        {{ $page.props.auth.user.name }}
                                        <svg class="-me-0.5 ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </template>
                            <template #content>
                                <DropdownLink :href="route('profile.edit')">Profile</DropdownLink>
                                <DropdownLink :href="route('logout')" method="post" as="button">Log Out</DropdownLink>
                            </template>
                        </Dropdown>
                    </div>

                    <div class="flex items-center -me-2 sm:hidden">
                        <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none">
                            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ hidden: showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ hidden: !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="bg-white border-b sm:hidden dark:bg-gray-800 dark:border-gray-700">
                <div class="pt-2 pb-3 space-y-1">
                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">Dashboard</ResponsiveNavLink>
                </div>
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                    <div class="px-4">
                        <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ $page.props.auth.user.name }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ $page.props.auth.user.email }}</div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <ResponsiveNavLink :href="route('profile.edit')">Profile</ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('logout')" method="post" as="button">Log Out</ResponsiveNavLink>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-12">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <slot /> </div>
        </main>

        <Link
            :href="route('posts.create')"
            class="fixed z-50 flex items-center justify-center text-white transition-all duration-200 rounded-full shadow-2xl bottom-8 right-6 w-14 h-14 bg-gradient-to-tr from-purple-600 to-indigo-600 hover:scale-110 active:scale-95 group"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 transition-transform duration-300 group-hover:rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
            </svg>
        </Link>
    </div>
</template>
