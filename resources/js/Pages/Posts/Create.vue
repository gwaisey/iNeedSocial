<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Head } from '@inertiajs/vue3';

const form = useForm({
    image: null,
    caption: '',
});

const submit = () => {
    form.post(route('posts.store'), {
        forceFormData: true,
        onSuccess: () => console.log('Berhasil!'),
        onError: (errors) => console.log(errors),
    });
};
</script>

<template>
    <Head title="Create Post" />

    <AuthenticatedLayout>
        <div class="min-h-screen bg-[#1a1a2e] flex justify-center p-6 text-white">
            <div class="w-full max-w-md">
                <h2 class="mb-6 text-2xl font-bold">Create New Post</h2>

                <form @submit.prevent="submit" class="space-y-6">
                    <div class="flex items-center justify-center h-64 overflow-hidden border-2 border-gray-500 border-dashed rounded-xl bg-white/5">
                        <input
                            type="file"
                            @input="form.image = $event.target.files[0]"
                            class="absolute w-full h-64 opacity-0 cursor-pointer"
                        />
                        <span v-if="!form.image">Tap to upload photo</span>
                        <p v-else class="text-green-400">{{ form.image.name }}</p>
                    </div>

                    <div>
                        <textarea
                            v-model="form.caption"
                            placeholder="Write a caption..."
                            class="w-full p-4 text-white border-none bg-white/10 rounded-xl focus:ring-2 focus:ring-purple-500"
                        ></textarea>
                    </div>

                    <button
                        type="submit"
                        class="w-full py-3 font-bold bg-purple-600 shadow-lg rounded-xl"
                        :disabled="form.processing"
                    >
                        {{ form.processing ? 'Posting...' : 'Share Post' }}
                    </button>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
