<script setup>
 import Authenticated from '@/Layouts/AuthenticatedLayout.vue';
 import { defineProps } from "vue";
 import { Link } from '@inertiajs/inertia-vue3'

 const {posts} = defineProps({
     posts: Array
 });

</script>
<template>
   <Authenticated>
       <template #header>
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Index
           </h2>
       </template>

       <div class="w-3/4 mx-auto mt-8">
           <h1 class="font-bold text-3xl text-gray-800">Blog Name</h1>
           <div class="w-1/2 mx-auto divide-gray-200 divide-y-2"> 
               <div v-for="post in posts"
                    class="space-y-5">
                   <h2 class="mt-4 font-bold text-xl text-gray-800">
                       <Link :href="route('post.show', { id: post.id })" >{{ post.title }}</Link>
                   </h2>
                   <p class="p-2">{{post.body}}</p>
            
               </div>
           </div>
       </div>
   </Authenticated>

</template>