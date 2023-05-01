<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  lesson: Object,
})
</script>

<template>
  <AppLayout :selectedSubjectSlug="lesson.subject.slug">
    <h2>{{ lesson.title }}</h2>
    <p>{{ lesson.description }}</p>
  </AppLayout>
</template>