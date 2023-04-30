<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const subjects = JSON.parse(localStorage.getItem('subjects'));
const topics = JSON.parse(localStorage.getItem('topics'));

const props = defineProps({
  selectedSubject: {
    type: String,
    default: 'math',

  },
})

let topicsMenu = topics[props.selectedSubject]

</script>

<template>
  <div>
    <div class="min-h-screen bg-gray-100">
      <nav class="bg-gray-800 px-4 py-3 flex items-center justify-between">
        <div class="text-white text-xl font-bold">aptiduo</div>
        <div class="flex md:hidden">
          <button type="button" class="text-gray-400 hover:text-white focus:outline-none focus:text-white" aria-label="toggle menu">
            <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
              <path fill-rule="evenodd" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
            </svg>
          </button>
        </div>
        <div v-if="$page.props.auth.user" class="hidden md:flex md:items-center">
          <Link :href="route('dashboard')" class="nav-link">Dashboard</Link>
          <Link :href="route('logout')" class="nav-link" method="POST" as="button">Log out</Link>
        </div>
        <div v-else class="hidden md:flex md:items-center">
          <Link :href="route('login')" class="nav-link">Log in</Link>
          <Link :href="route('register')" class="nav-link">Register</Link>
        </div>
      </nav>

      <nav class="bg-gray-700 text-white flex justify-around">
        <Link
          v-for="subject in subjects"
          :key="subject.id"
          :href="route('subjects.show', { slug: subject.slug })"
          class="py-2 grow text-center"
          :class="{ 'bg-yellow-300 text-black': subject.slug === selectedSubject, 'hover:bg-gray-600': subject.slug !== selectedSubject }"
        >
          {{ subject.title }}
        </Link>
      </nav>

      <!-- Page Heading -->
      <header class="bg-white shadow" v-if="$slots.header">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>

      <main class="flex">
        <aside class="w-80 hidden lg:block bg-gray-200 pl-8 py-8">
          <nav class="flex flex-col gap-y-4">
            <div v-for="topic in topicsMenu">
              <div v-if="topic.children">
                <details open>
                  <summary class="cursor-pointer">{{ topic.title }}</summary>
                  <nav class="pl-4 py-2">
                    <div v-for="child in topic.children" class="text-sm py-2">
                      <a :key="child.title" href="#">{{ child.title }}</a>
                    </div>
                  </nav>
                </details>
              </div>
              <div v-else>
                <a :key="topic.title" href="#">{{ topic.title }}</a>
              </div>
            </div>
          </nav>
        </aside>

        <!-- Page Content -->
        <section id="content" class="w-full">
          <slot />
        </section>
      </main>
    </div>
  </div>
</template>

<style>
.nav-link {
  @apply text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium;
}
</style>