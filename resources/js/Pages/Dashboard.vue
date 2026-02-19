<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PostCard from '@/Components/PostCard.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    posts: Array
});
</script>

<template>
    <Head title="Feed" />

    <AuthenticatedLayout>
        <div class="min-h-screen bg-gray-50 dark:bg-[#111827] transition-colors duration-500">
            <div class="max-w-md py-8 mx-auto px-4 sm:px-0">

                <div class="mb-6 flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Your Feed</h2>
                    <span class="text-xs font-medium px-2 py-1 bg-purple-100 text-purple-600 rounded-full dark:bg-purple-900/30 dark:text-purple-400">
                        {{ posts.length }} Posts
                    </span>
                </div>

                <div class="space-y-8">
                    <div v-for="post in posts" :key="post.id" class="transform transition duration-300 hover:scale-[1.01]">
                        <PostCard :post="post" />
                    </div>
                </div>

                <div v-if="posts.length === 0" class="py-32 text-center">
                    <div class="text-6-xl mb-4">📸</div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Belum ada postingan</h3>
                    <p class="text-gray-500 dark:text-gray-400 mt-2">Mulai bagikan momen serumu sekarang!</p>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
