<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  lesson: Object,
})

</script>

<template>
  <AppLayout :selectedSubjectSlug="lesson.subject.slug">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="mx-auto max-w-3xl">

        <!-- Lesson -->
        <section class="mt-16">
          <div class="space-y-4">
            <a href="#" class="block text-xs font-bold tracking-wider uppercase text-primary-600">Lessons</a>
            <h2 class="text-3xl font-bold tracking-tight text-gray-900">{{ lesson.title }}</h2>
            <dl class="flex flex-wrap font-medium gap-x-6 gap-y-2 items-start text-gray-500">
              <div class="flex items-center gap-2">
                <dt><i class="fa-regular fa-calendar"></i></dt>
                <dd>{{ lesson.published_at }}</dd>
              </div>
              <div class="flex items-center gap-2">
                <dt><i class="fa-regular fa-user"></i></dt>
                <dd>{{ lesson.tutor.name }}</dd>
              </div>
              <div class="flex items-center gap-2">
                <dt><i class="fa-regular fa-tag"></i></dt>
                <dd>{{ lesson.topic.title }}</dd>
              </div>
              <div class="flex items-center gap-2">
                <dt><i class="fa-regular fa-star"></i></dt>
                <dd>69 favorites</dd>
              </div>
            </dl>
          </div>
          <div class="mt-8 prose max-w-none">
            {{ lesson.content }}
          </div>
          <div class="flex items-center py-8">
            <img
              :src="lesson.tutor.pic"
              alt="Tutor Profile Picture"
              onerror="this.onerror=null;this.src='/img/avatar.jpg';"
              class="w-20 h-20 mr-4"
            >
            <div>
              <h3 class="font-bold text-lg">{{ lesson.tutor.name }}</h3>
              <p class="text-gray-600">{{ lesson.tutor.bio }}</p>
            </div>
          </div>
        </section>

        <div aria-hidden="true" class="mt-8 border-t"></div>

      </div>
    </div>
  </AppLayout>
</template>