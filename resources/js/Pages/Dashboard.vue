<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="text-xl text-gray-800  leading-tight">
                SERVICIOS ACTIVOS
            </h2>
        </template>

        <div class="py-12">
            <div class="">
                <div class="">
                    <a class="shadow m-3 btn btn-primary" href="/admin" role="button">ir a administracion de biblioteca</a>

                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
