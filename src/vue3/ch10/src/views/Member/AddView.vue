<template>
    <div>
        <h1>会員登録</h1>
        <p>
            <router-link to="/">TOP</router-link> ＞ 
            <router-link to="/member">会員リスト</router-link> ＞ 
            新規登録</p>
        <h1>Add Member</h1>

        <div>
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" v-model="member.name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" v-model="member.email" required>
            </div>
            <button @click="addMember" class="btn btn-primary">登録</button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';
const router = useRouter();

const member = ref({
    name: '',
    email: ''
});

function addMember() {
    // Logic to add member to the database or perform any other action
    console.log('Adding member:', member);
    // Reset the form
    member.value.name = '';
    member.value.email = '';

    // Redirect to the member list page
    // router.push('/member');
    router.back();
}
</script>

<style scoped>
/* Add your custom styles here */
</style>