<script setup>
  import Authenticated from '@/Layouts/AuthenticatedLayout.vue';
  import {Link} from '@inertiajs/inertia-vue3';
  import { defineProps } from "vue";
  import { Inertia } from '@inertiajs/inertia'

  const {post} = defineProps({
      post: Object
  });
  
   const destroy = ({id}) => {      
        Inertia.delete(route('post.delete', {id: id}), {
            onBefore: () => confirm('削除しますが、よろしいですか？')
        })
     }
</script>

<template>
    <Authenticated>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ post.title }}の詳細ページ
            </h2>
        </template>

        <div class="w-1/4 mx-auto mt-8 space-y-4">
         
            <div>
                <h1>{{ post.title }}</h1>
                <p>{{ post.created_at }}</p>
           </div>

            <div>
                <h3>本文</h3>
                <p>{{ post.body }}</p>
            </div>

            <div>
                <Link :href="route('post.index')">戻る</Link>
                <button
                           class="px-3 bg-purple-300 hover:bg-purple-400 rounded-md"
                           @click="destroy(post)"
                       >削除
                </button>
            </div>

        </div>
    </Authenticated>
</template>