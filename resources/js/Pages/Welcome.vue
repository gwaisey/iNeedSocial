<script setup>
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';

// State untuk Dark Mode
const isDark = ref(false);

const toggleDark = () => {
    isDark.value = !isDark.value;
    if (isDark.value) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    }
};

onMounted(() => {
    if (localStorage.getItem('theme') === 'dark') {
        isDark.value = true;
        document.documentElement.classList.add('dark');
    }
});
</script>

<template>
    <Head title="Welcome" />

    <div class="min-h-screen transition-colors duration-500 bg-[#5c5c7a] dark:bg-[#1a1a2e] flex flex-col items-center justify-center px-6 text-center text-white">
        <button @click="toggleDark" class="absolute p-2 text-2xl text-white rounded-full top-10 right-10 bg-white/20 dark:bg-black/20">
            <span v-if="isDark">☀️</span>
            <span v-else>🌙</span>
        </button>

        <div class="flex flex-col items-center mb-8">
            <img :src="'/images/logo.png?v=' + new Date().getTime()" alt="Logo" class="w-auto h-8" />
        </div>

        <h1 class="mb-2 text-4xl font-bold tracking-tight">iNeedSocial</h1>
        <p class="mb-8 text-gray-200 opacity-90">Connect with your friends easily.</p>

        <div class="flex flex-col w-full max-w-xs space-y-4">
            <Link :href="route('login')" class="w-full py-3 bg-white text-[#1a1a2e] font-bold rounded-xl shadow-lg hover:bg-gray-100 transition">
                Login
            </Link>
            <Link :href="route('welcome')" class="w-full py-3 font-bold text-white transition border-2 border-white rounded-xl hover:bg-white/10">
                Get Started
            </Link>
        </div>
    </div>
</template>
