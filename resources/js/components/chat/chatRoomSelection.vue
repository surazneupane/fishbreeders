<template>
    <div class="">
        <div class="mx-1 my-2 border-bottom p1-2">
            Chat Rooms
        </div>
        <div style="height: 500px; overflow-y: scroll">
            <div v-for="(room, idx) in rooms" :key="idx">
                <button
                    @click="$emit('roomchanged', room)"
                    class="w-100 btn btn-transparent border-bottom shadow-none"
                    :class="[
                        room == currentRoom ? 'active' : 'room-hover',
                        room.unviewed ? 'unviewed' : ''
                    ]"
                >
                    <span
                        v-if="room.users.length > 2 || room.users.length == 1"
                    >
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
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["rooms", "currentRoom"],
    data: function() {
        return {
            selected: ""
        };
    },
    created() {
        this.selected = this.currentRoom;
    }
};
</script>

<style>
.room-hover:hover {
    background-color: rgba(30, 143, 255, 0.527);
    color: #fff;
}
.active {
    background-color: dodgerblue;
    color: #fff;
}
.active:hover {
    color: #fff;
}
.unviewed {
    background-color: rgba(30, 143, 255, 0.527);
}
</style>
