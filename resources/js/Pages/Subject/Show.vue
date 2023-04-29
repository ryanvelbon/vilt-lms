<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({
  subject: Object,
})
</script>

<template>
  <AppLayout :selectedSubject="subject.slug">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ subject.title }}</h2>
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