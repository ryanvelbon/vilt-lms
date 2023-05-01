<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  topic: Object,
})

</script>

<template>
  <AppLayout :selectedSubjectSlug="topic.subject.slug">

    <!-- Header -->
    <template #header>
      <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ topic.title }}</h2>
        <div v-if="topic.children.length > 0" class="grow mx-12 hidden md:block">
          <ul class="flex flex-wrap gap-1">
            <li v-for="subtopic in topic.children" class="text-sm py-2">
              <Link
                :key="subtopic.title"
                :href="route('topics.show', { slug: subtopic.slug })"
                class="bg-gray-800 text-white text-sm px-3 py-1 rounded-full hover:bg-gray-700"
              >
                {{ subtopic.title }}
              </Link>
            </li>
          </ul>
        </div>
        <div>
          <a href="#" class="inline-block px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 transition-transform transform-gpu hover:-rotate-3">Quiz Me</a>
        </div>
      </div>
    </template>

    <!-- Lessons -->
    <section class="bg-pink-200">
      <h3 class="text-lg font-bold">Lessons</h3>  
      <div v-if="topic.lessons.length > 0" class="mx-auto max-w-xl">
        <div v-for="lesson in topic.lessons" class="bg-gray-300 mb-4">
          <Link :href="route('lessons.show', { slug: lesson.slug })">
            {{ lesson }}
          </Link>
        </div>
      </div>
      <div v-else class="py-12 text-center text-gray-600">
        No lessons have been published for this topic yet.
      </div>
    </section>

  </AppLayout>
</template>