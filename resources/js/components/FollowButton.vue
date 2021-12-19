<template>
    <div>
        <button
            class="btn btn-primary ms-3"
            @click="followUser"
            v-text="buttonText"
        ></button>
    </div>
</template>

<script>
export default {
    props: ["user_id", "follows"],

    data: function () {
        return {
            status: this.follows,
        };
    },

    methods: {
        followUser() {
            axios
                .post("/follow/" + this.user_id)
                .then((response) => {
                    this.status = !this.status;
                    console.log(response);
                })
                .catch((error) => {
                    if (error.response.status == 401) {
                        window.location = "/login";
                    }
                });
        },
    },

    computed: {
        buttonText() {
            return this.status ? "Unfollow" : "Follow";
        },
    },
};
</script>
