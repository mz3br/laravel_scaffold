<script setup lang="ts">
import PlaceholderPattern from '@/components/ui/PlaceholderPattern.vue';
import { useAuthStore } from '@/stores/auth_store';
import { Head } from '@inertiajs/vue3';

const auth = useAuthStore();
</script>

<template>
    <Head title="Dashboard" />
    <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
        {{ $page }}

        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border">
                <PlaceholderPattern />
            </div>
            <div class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border">
                <PlaceholderPattern />
            </div>
            <div class="border-sidebar-border/70 dark:border-sidebar-border relative aspect-video overflow-hidden rounded-xl border">
                <PlaceholderPattern />
            </div>
        </div>
        <div class="border-sidebar-border/70 dark:border-sidebar-border relative min-h-[100vh] flex-1 rounded-xl border md:min-h-min">
            <PlaceholderPattern />
        </div>
    </div>
</template>
