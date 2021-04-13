<template>
    <div class="position-relative h-10 m-1  ">
        <div
            class="d-flex align-items-center p-1 py-2"
            style="border-top: 1px solid #e6e6e6"
        >
            <input
                type="text"
                v-model="message"
                @keyup.enter="sendMessage()"
                placeholder="Say Something..."
                class=" form-control rounded-0 shadow-none border-0"
            />
            <button
                @click="sendMessage()"
                class="btn btn-success rounded- 0"
                style="place-self: end;"
            >
                Send
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["room"],
    data() {
        return {
            message: ""
        };
    },
    methods: {
        sendMessage() {
            if (this.message == "") {
                return;
            }

            axios
                .post("/chats/rooms/" + this.room.id + "/message", {
                    message: this.message
                })
                .then(response => {
                    if (response.status == 201) {
                        this.message = "";
                        this.$emit("messagesent");
                    }
                })
                .catch(error => {
                    console.log("error");
                });
        }
    }
};
</script>

<style>
.grid-cols-6 {
    grid-template-columns: repeat(6, minmax(0, 1fr));
}
.col-span-5 {
    grid-column: span 5 / span 5;
}
</style>
