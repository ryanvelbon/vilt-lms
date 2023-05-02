<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  quiz: Object,
})

</script>

<template>
  <Link
    :href="route('quizzes.attempt', { id: quiz.id })"
  >
    Start Quiz
  </Link>
</template>