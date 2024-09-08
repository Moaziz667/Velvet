<template>
    <Teleport to="#modal">{{ props.product }} </Teleport>
</template>
<script setup>
const props = defineProps({
    product: Object,
});
</script>
