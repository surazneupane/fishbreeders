<template>
    <div class="">
        <div class="mx-1 my-2 border-bottom p1-2">
            Chat Rooms
        </div>
        <div v-for="(room, idx) in rooms" :key="idx">
            <button
                @click="$emit('roomchanged', room)"
                class="w-100 btn btn-transparent border-bottom shadow-none"
                :class="room == currentRoom ? 'active' : 'room-hover'"

            >
                {{ room.name }}
            </button>

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
</style>
