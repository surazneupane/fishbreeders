<template>
    <div class="py-2" style="font-size: 13px">
        <div class="d-flex w-100">
            <div>
                <img
                    :src="message.user.profile_photo_url"
                    alt=""
                    width="50"
                    class="rounded-circle "
                />
            </div>
            <div class="w-100 px-2">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>
                            {{ message.user.name }}
                            <span v-if="message.user.roles[0].id !== 3">
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
                        </strong>
                    </div>
                    <div class="text-muted">
                        {{ time }}
                    </div>
                </div>

                <div class="py-1">
                    {{ message.message }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";
export default {
    props: ["message"],
    computed: {
        time: function() {
            const date = new Date(this.message.created_at);
            return moment(date).calendar();
        }
    }
};
</script>

<style>
.d-flex {
    display: flex;
}
</style>
