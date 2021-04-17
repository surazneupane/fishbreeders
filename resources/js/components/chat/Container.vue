<template>
    <div class="row">
        <div class="col-lg-3 col-xl-2 ">
            <div class="border h-100 ">
                <CreateChatRoom v-on:chatroomcreated="getRooms()" />
                <chat-room-selection
                    :rooms="chatRooms"
                    v-if="currentRoom.id"
                    :currentRoom="currentRoom"
                    v-on:roomchanged="setRoom($event)"
                />
            </div>
        </div>
        <div class="col" v-if="currentRoom.id">
            <message-container :messages="messages" />
            <input-message
                :room="currentRoom"
                v-on:messagesent="getMessages()"
            />
        </div>
        <div class="col-lg-3 col-xl-2" v-if="currentRoom.id">
            <chat-room-info
                :room="currentRoom"
                :users="users"
                v-on:useradded="getUsers()"
                v-on:userleave="getRooms()"
            />
        </div>
    </div>
</template>

<script>
import ChatRoomSelection from "./chatRoomSelection.vue";
import inputMessage from "./inputMessage.vue";
import messageContainer from "./messageContainer.vue";
import CreateChatRoom from "./createChatRoom.vue";
import ChatRoomInfo from "./ChatRoomInfo.vue";
export default {
    data() {
        return {
            chatRooms: [],
            currentRoom: [],
            messages: [],
            users: []
        };
    },
    components: {
        messageContainer,
        inputMessage,
        ChatRoomSelection,
        CreateChatRoom,
        ChatRoomInfo
    },
    methods: {
        getRooms() {
            axios
                .get("/chats/rooms")
                .then(response => {
                    this.chatRooms = response.data.reverse();
                    if (response.data[0]) this.setRoom(response.data[0]);
                    else this.currentRoom = [];
                })
                .catch(error => {
                    console.log(error);
                });
        },
        setRoom(room) {
            this.currentRoom = room;
            this.getUsers();
        },
        getUsers() {
            axios
                .get("/chats/rooms/" + this.currentRoom.id + "/users")
                .then(response => {
                    this.users = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getMessages() {
            axios
                .get("/chats/rooms/" + this.currentRoom.id + "/messages")
                .then(response => {
                    this.messages = response.data.reverse();
                })
                .catch(error => {
                    console.log(error);
                });
        },
        connect() {
            if (this.currentRoom.id) {
                let vm = this;
                this.getMessages();
                window.Echo.private("chat." + this.currentRoom.id).listen(
                    ".message.new",
                    e => {
                        vm.getMessages();
                    }
                );
            }
        },
        disconnect(room) {
            window.Echo.leave("chat." + room.id);
        }
    },
    watch: {
        currentRoom(val, oldVal) {
            if (oldVal.id) {
                this.disconnect(oldVal);
                this.messages = [];
            }
            this.connect();
        }
    },
    created() {
        this.getRooms();
    }
};
</script>

<style></style>
