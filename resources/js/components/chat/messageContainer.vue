<template>
    <div class="w-100 " style="height:600px; display:block ">
        <div
            class="h-100 p-2 d-flex flex-column w-100"
            style="overflow-y:scroll; overflow-x:visible"
            id="messages"
            ref="messages"
        >

            <message-item
                v-for="(message, idx) in messages"
                :message="message"
                :key="idx"
            />
        </div>
    </div>
</template>

<script>
import messageItem from "./messageItem.vue";
import InfiniteLoading from "vue-infinite-loading";
export default {
    components: { messageItem, InfiniteLoading },
    props: ["messages", "handleScrolledToTop"],
    methods: {},
    updated() {
        this.$nextTick(() => {
            setTimeout(() => {
                this.$refs.messages.scrollTop = 99999;
            }, 100);
        });
    }
};
</script>

<style></style>
