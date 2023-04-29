<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
  subject: Object,
})
</script>

<template>
  <AppLayout :selectedSubject="subject.slug">
    <div>
      <h1 class="text-2xl font-bold p-8">{{ subject.title }}</h1>
    </div>
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