<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
  subject: Object,
})
</script>

<template>
  <AppLayout :selectedSubject="subject.slug">
    <template #header>
      <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ subject.title }}</h2>
        <ul class="flex gap-x-8">
          <li>
            <i class="fa-solid fa-chart-line-up mr-2"></i>
            <span>2300xp</span>
          </li>
          <li>
            <i class="fa-solid fa-chalkboard-user mr-2"></i>
            <span>14 lessons</span>
          </li>
          <li>
            <i class="fa-solid fa-ballot-check mr-2"></i>
            <span>55 quizzes</span>
          </li>
        </ul>
      </div>
    </template>

    <div class="p-8">
      <h2 class="text-xl">Tutors</h2>
      <div class="grid grid-cols-2 gap-4">
        <div v-for="tutor in subject.tutors" class="bg-gray-200 p-8">
          <h3>{{ tutor.name }}</h3>
        </div>
      </div>
    </div>
  </AppLayout>
</template>