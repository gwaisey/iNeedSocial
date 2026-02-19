<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    post: Object,
});

const handleLike = () => {
    router.post(route('posts.like', props.post.id), {}, {
        preserveScroll: true,
    });
};
</script>

<template>
    <div class="mb-6 overflow-hidden bg-white shadow-lg dark:bg-gray-800 rounded-xl border border-gray-100 dark:border-gray-700">
        <img :src="post.image_path" class="object-cover w-full h-auto" alt="Post">

        <div class="p-4">
            <div class="flex items-center mb-2">
                <span class="font-bold text-gray-900 dark:text-white">
                    {{ post.user ? post.user.name : 'User' }}
                </span>
            </div>

            <p class="text-sm text-gray-700 dark:text-gray-300">{{ post.caption }}</p>

            <div class="flex items-center mt-4 space-x-4">
                <button
                    @click="handleLike"
                    class="transition-transform active:scale-125 duration-200"
                >
                    <span v-if="post.is_liked" class="text-2xl">❤️</span>
                    <span v-else class="text-2xl grayscale opacity-50 hover:grayscale-0 hover:opacity-100">🤍</span>
                </button>

                <span class="text-sm text-gray-500 dark:text-gray-400">
                    {{ post.likes_count || 0 }} likes
                </span>
            </div>
        </div>
    </div>
</template>
