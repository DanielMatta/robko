<script setup>

const props = defineProps(['shortnames'])
// props.foo = "cau"
console.log(props.shortnames);
</script>

<template>
    {{props.shortnames}}
</template>
