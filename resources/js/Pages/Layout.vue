<script setup>
import {Link} from "@inertiajs/vue3";

</script>

<template>
    <nav class="bg-white shadow border-b border-gray-100 mb-8">
        <ul class="flex justify-center">
            <Link href="/owners" class="p-2 border-b-4 border-blue-500 font-bold text-blue-500 hover:bg-blue-500 hover:text-white cursor-pointer transition duration-150">
                Registrar um novo proprietário
            </Link>
        </ul>
    </nav>
    <slot>

    </slot>
</template>

<style scoped>

</style>
