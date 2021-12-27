<template>
    <div>
        <div>
            <a :href="'/post/' + post.id"
                ><img :src="'/storage/' + post.image" alt="" class="w-100"
            /></a>
        </div>
        <div>
            <p class="pt-2">
                <a
                    style="text-decoration: none"
                    :href="'/profile/' + post.user.id"
                >
                    <span class="pe-1 text-dark"
                        ><strong>{{ post.user.username }}</strong></span
                    >
                </a>
                <span>{{ post.caption }}</span>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: ["post"],
};
</script>

<style></style>
