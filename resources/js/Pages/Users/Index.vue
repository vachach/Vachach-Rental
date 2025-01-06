<template>
    <v-container>
            <v-card-title>
                <h1 class="text-2xl font-bold">Users</h1>
            </v-card-title>
            <v-data-table
                :headers="headers"
                :items="users.data"
                class="elevation-1"
                item-value="id"
            >
            </v-data-table>
    </v-container>
</template>

<script>
export default {
    props: {
        users: Object,
    },
    data() {
        return {
            headers: [
                { title: 'ID', value: 'id' },
                { title: 'Name', value: 'name' },
                { title: 'Email', value: 'email' },
                { title: 'Phone Number', value: 'phone_number' },
                { title: 'Role', value: 'role' }
            ],
        };
    },
    methods: {
        fetchPage(page) {
            this.$inertia.get(`/users?page=${page}`);
        },
    },
};
</script>
