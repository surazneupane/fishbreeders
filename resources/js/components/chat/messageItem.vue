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
