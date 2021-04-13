<template>
    <div>
        <h4 class="text-center text-capitalize my-2">messages</h4>
        <button
            class="w-100 my-2 btn btn-outline-primary rounded-0 shadow-none"
            data-bs-toggle="modal"
            data-bs-target="#createroom"
        >
            Create a new chat room
        </button>
        <div
            class="modal fade"
            id="createroom"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content p-3" style="border-radius:20px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Creat a New Chat Room
                        </h5>
                        <button
                            type="button"
                            class="btn-close shadow-none"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label"
                                >Room Name</label
                            >
                            <input
                                type="text"
                                name="name"
                                id="name"
                                v-model="name"
                                class="form-control"
                                placeholder="Chat Room Name"
                            />
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label"
                                >Add People</label
                            >

                            <v-select
                                @search="fetchOptions"
                                v-model="users"
                                :options="options"
                                multiple
                                placeholder="Typer User's Name to search"
                            >
                                <template slot="no-options">
                                    Type to search User...
                                </template>
                                <template slot="option" slot-scope="option">
                                    <div class="d-center py-2">
                                        <img
                                            :src="option.image"
                                            width="30"
                                            class="rounded-circle"
                                        />
                                        <span class="px-2">
                                            {{ option.label }}
                                        </span>
                                    </div>
                                </template>
                                <template
                                    slot="selected-option"
                                    slot-scope="option"
                                >
                                    <div class="selected d-center ">
                                        <img
                                            :src="option.image"
                                            width="30"
                                            class="rounded-circle"
                                        />
                                        <span class="px-1">
                                            {{ option.label }}
                                        </span>
                                    </div>
                                </template>
                            </v-select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Message</label>
                            <textarea
                                name="message"
                                id="message"
                                v-model="message"
                                class="form-control"
                                placeholder="Type Your Message here..."
                                rows="5"
                            ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn shadow-none"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="submit"
                        >
                            Create
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import _ from "lodash";
export default {
    data() {
        return {
            name: "",
            users: [],
            message: "",
            options: []
        };
    },
    methods: {
        fetchOptions(search, loading) {
            loading(true);
            if (search.length) {
                this.search(search, loading, this);
            }
        },
        search: _.debounce((search, loading, vm) => {
            axios
                .get("/chats/users?query=" + search)
                .then(response => (vm.options = response.data))
                .catch(error => console.log(error));
            loading(false);
        }, 350),
        submit() {
            if (
                this.name !== "" &&
                this.options.length > 0 &&
                this.message !== ""
            ) {
                axios
                    .post("/chats/rooms/create", {
                        message: this.message,
                        users: this.users,
                        name: this.name
                    })
                    .then(response => {
                        if (response.status == 201) {
                            this.message = "";
                            this.users = [];
                            this.name = "";
                            this.$emit("chatroomcreated");
                        }
                    })
                    .catch(error => {
                        console.log("error");
                    });
            }
        }
    }
};
</script>

<style></style>
