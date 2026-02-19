<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    user: Object,
    posts: Array,
    postsCount: Number
});
</script>

<template>
    <Head title="Profil Saya" />

    <AuthenticatedLayout>
        <div class="max-w-4xl px-4 py-8 mx-auto">
            <div class="flex flex-col items-center pb-10 mb-10 border-b border-gray-200 md:flex-row md:items-start dark:border-gray-800">
                <div class="flex items-center justify-center w-24 h-24 mb-4 overflow-hidden bg-gray-300 rounded-full md:w-32 md:h-32 dark:bg-gray-700 md:mb-0">
                    <span class="text-4xl text-gray-500">👤</span>
                </div>

                <div class="text-center md:ml-10 md:text-left">
                    <h2 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">{{ user.name }}</h2>
                    <div class="flex justify-center space-x-6 md:justify-start">
                        <span class="dark:text-gray-300"><strong>{{ postsCount }}</strong> posts</span>
                        <span class="dark:text-gray-300"><strong>123</strong> followers</span>
                        <span class="dark:text-gray-300"><strong>456</strong> following</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-1 md:gap-4">
                <div v-for="post in posts" :key="post.id" class="relative overflow-hidden bg-gray-200 cursor-pointer aspect-square dark:bg-gray-800 group">
                    <img :src="post.image_path" class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110" />
                    <div class="absolute inset-0 flex items-center justify-center transition-opacity opacity-0 bg-black/30 group-hover:opacity-100">
                        <span class="font-bold text-white">❤️ 12</span>
                    </div>
                </div>
            </div>

            <div v-if="posts.length === 0" class="py-20 text-center dark:text-gray-400">
                Belum ada postingan.
            </div>
        </div>
    </AuthenticatedLayout>
</template>
