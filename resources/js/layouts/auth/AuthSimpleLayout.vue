<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { useAppStore } from '@/stores/app_store';
import AppLogoIcon from '@/components/app/AppLogoIcon.vue';
import AppThemeSelector from '@/components/app/AppThemeSelector.vue';

const app = useAppStore();
</script>

<template>
    <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
        <AppThemeSelector class="absolute top-2 right-2" />
        <div class="w-full max-w-sm">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col items-center gap-4">
                    <Link :href="route('get.welcome')" class="flex flex-col items-center gap-2 font-medium">
                        <div class="mb-1 flex h-9 w-9 items-center justify-center rounded-md">
                            <AppLogoIcon class="size-9 fill-current text-[var(--foreground)] dark:text-white" />
                        </div>
                        <span class="sr-only">{{ app.name }}</span>
                    </Link>
                    <div class="space-y-2 text-center">
                        <h1 class="text-xl font-medium">{{ app.name }}</h1>
                        <p class="text-muted-foreground text-center text-sm">{{}}</p>
                    </div>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>
