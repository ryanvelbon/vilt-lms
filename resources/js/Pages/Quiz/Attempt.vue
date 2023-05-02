<script setup>

const props = defineProps({
  quiz: Object,
})

</script>

<template>
  <div>
    <h3>{{ quiz.title }}</h3>
    <p>Question i of {{ quiz.questions.length }}</p>
  </div>
  <div>
    <div>
      <div v-for="question in quiz.questions" :key="question.id">
        <h3>{{ question.question }}</h3>

      </div>
    </div>
  </div>
</template>