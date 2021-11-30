<template>
    <div>{{ users.email }}</div>
</template>

<script>
export default {
    props: ['users'],
    mounted() {
        console.log('Example component mounted.')
    }
}
</script>
