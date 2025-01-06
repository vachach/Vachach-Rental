<template>
    <v-container>
        <v-card class="my-4">
            <v-card-title>
                <h1 class="text-2xl font-bold">Users</h1>
            </v-card-title>
            <v-data-table
                :headers="headers"
                :items="users.data"
                class="elevation-1"
                item-value="id"
            >
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Users</v-toolbar-title>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                </template>
                <template v-slot:[`item.created_at`]="{ item }">
                    {{ new Date(item.created_at).toLocaleDateString() }}
                </template>
            </v-data-table>
        </v-card>
        <v-pagination
            v-model="page"
            :length="users.last_page"
            @input="fetchPage"
            class="my-4"
        ></v-pagination>
    </v-container>
</template>

<script>
export default {
    props: {
        users: Object,
    },
    data() {
        return {
            page: this.users.current_page,
            headers: [
                { text: 'ID', value: 'id' },
                { text: 'Name', value: 'name' },
                { text: 'Email', value: 'email' },
                { text: 'Created At', value: 'created_at' },
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
