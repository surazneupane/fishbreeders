<template>
    <div class="border h-100">
        <h3 class=" border-bottom py-2 d-flex justify-content-between px-2">
            <span>
                <span v-if="room.users.length > 2">
                    {{ room.name }}
                </span>
                <span v-else>
                    <span v-for="(user, idx) in room.users" :key="idx">
                        <span v-if="user.id !== room.pivot.user_id">
                            <img
                                :src="user.profile_photo_url"
                                alt=""
                                width="30"
                                class="rounded-circle"
                            />
                            <span>
                                {{ user.name }}
                            </span>
                            <span v-if="user.roles[0].id !== 3">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="blue"
                                    class="bi bi-patch-check-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"
                                    />
                                </svg>
                            </span>
                        </span>
                    </span>
                </span>
            </span>
        </h3>
        <div class="d-flex flex-column h-auto ">
            <h6 class="my-1 py-1 px-1">Add New Member</h6>
            <div class="p-1 d-flex align-items-center ">
                <div class="w-100">
                    <v-select
                        @search="fetchOptions"
                        v-model="newUsers"
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
                        <template slot="selected-option" slot-scope="option">
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
                <button class="btn btn-success rounded-0" @click="submit">
                    Add
                </button>
            </div>
            <h6 class="my-2 px-1 border py-2">Chat Members</h6>
            <div style="height: 300px; overflow-y: scroll">
                <div v-for="user in users" :key="user.id">
                    <div
                        class="p-2 d-flex justify-content-start align-items-center"
                    >
                        <img
                            :src="user.profile_photo_url"
                            width="30"
                            class="rounded-circle"
                        />

                        <span class="px-1">
                            {{ user.name }}
                        </span>
                        <span v-if="user.roles[0].id !== 3">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="blue"
                                class="bi bi-patch-check-fill"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"
                                />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            <div class="mt-auto">
                <button
                    class="btn btn-outline-danger shadow-none w-100 mt-5"
                    @click="leave"
                >
                    Leave Chat Room
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import _ from "lodash";

export default {
    props: ["room", "users"],
    data() {
        return {
            newUsers: [],
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
            if (this.options.length > 0) {
                axios
                    .post("/chats/rooms/" + this.room.id + "/users/add", {
                        users: this.newUsers
                    })
                    .then(() => {
                        this.newUsers = [];
                        this.$emit("useradded");
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
        leave() {
            axios
                .get(
                    "/chats/rooms/" +
                        this.room.id +
                        "/users/" +
                        this.room.pivot.user_id +
                        "/leave"
                )
                .then(() => {
                    this.$emit("userleave");
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>

<style>
.btn-outline-danger:hover {
    color: white !important;
}
</style>
