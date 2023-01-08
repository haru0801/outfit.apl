<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head ,Link} from '@inertiajs/inertia-vue3';
import { defineProps } from "vue";
defineProps({
    users:Array,
});
</script>

<template>
    <h1>ユーザ一覧</h1>
    <ul>
        
    </ul>
</template>