<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-gray-800 px-4 py-3 flex items-center justify-between">
              <div class="text-white text-xl font-bold">Logo</div>
              <div class="flex md:hidden">
                <button type="button" class="text-gray-400 hover:text-white focus:outline-none focus:text-white" aria-label="toggle menu">
                  <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                    <path fill-rule="evenodd" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                  </svg>
                </button>
              </div>
              <div class="hidden md:flex md:items-center">
                <a class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="#">Log in</a>
                <a class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="#">Register</a>
              </div>
            </nav>

            <nav class="bg-gray-700 text-white flex justify-around py-2">
              <a href="#">English</a>
              <a href="#">German</a>
              <a href="#">French</a>
              <a href="#">Italian</a>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
