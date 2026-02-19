<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Selamat Datang" />

    <div class="min-h-screen flex flex-col justify-between p-10 transition-colors duration-500 bg-gradient-to-br from-white via-gray-100 to-[#5c5c7a] dark:from-[#1a1a2e] dark:via-[#16213e] dark:to-[#0f3460]">

        <div class="mt-40">
            <h1 class="text-5xl font-bold leading-tight text-gray-900 dark:text-white">
                Selamat Datang!
            </h1>
            <p class="mt-2 text-3xl text-gray-800 dark:text-gray-200">
                Siap untuk <span class="italic font-extrabold">Scrolling?</span>
            </p>

            <div class="mt-10">
                <p class="text-xl italic font-semibold text-gray-700 dark:text-gray-300">Welcome!</p>
                <p class="text-lg text-gray-600 dark:text-gray-400">Are you ready to <span class="font-bold">Scroll?</span></p>
            </div>
        </div>

        <div class="flex justify-end mb-10">
            <Link href="/register" class="p-4 text-white transition-all bg-gray-800 rounded-full shadow-xl hover:bg-gray-700 dark:bg-white dark:text-gray-900 dark:hover:bg-gray-200 active:scale-90">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </Link>
        </div>
    </div>
</template>
