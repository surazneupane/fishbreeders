<template>
    <div class="w-100 " style="height:600px; display:block ">
        <div
            class="h-100 p-2 d-flex flex-column-reverse w-100"
            style="overflow-y:hidden"
        >
            <div v-for="(message, idx) in messages" :key="idx">
                <message-item :message="message" :key="idx" />
            </div>
        </div>
    </div>
</template>

<script>
import messageItem from "./messageItem.vue";
export default {
    components: { messageItem },
    props: ["messages"]
};
</script>

<style></style>
