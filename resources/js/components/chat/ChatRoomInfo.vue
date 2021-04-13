<template>
    <div class="border h-100">
        <h3 class=" border-bottom py-2 d-flex justify-content-between px-2">
            <span>
                {{ room.name }}
            </span>
        </h3>
        <div class="d-flex flex-column h-auto ">
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
            <div v-for="user in users" :key="user.id">
                <div
                    class="p-2 d-flex justify-content-between align-items-center"
                >
                    <span>
                        {{ user.name }}
                    </span>
                    <span> </span>
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
