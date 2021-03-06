<template>
    <div>
        <h2 class="text-center">Clients List</h2>

        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="client in clients" :key="client.id">
                <td>{{ client.id }}</td>
                <td>{{ client.name }}</td>

                <!--<td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: client.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteClient(client.id)">Delete</button>
                    </div>
                </td>-->
            </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
import CreateClient from "./CreateClient";
    export default {
        components: {
            CreateClient
        },
        data() {
            return {
                clients: [],
                //clients: {}
                //meta: {}
            }
        },
        created() {
            this.axios
                .get("/api/clients")
                .then(response => {
                    this.clients = response.data;
                });
        },
        /*created() {
            this.axios
                .get(`/api/clients`)
                .then(response => {
                    this.clients = response.data.data;
                    this.meta = response.data.meta
                });
        },
        methods: {
            deleteClient(id) {
                this.axios
                    .delete(`/api/clients/${id}`)
                    .then(response => {
                        let i = this.clients.map(data => data.id).indexOf(id);
                        this.clients.splice(i, 1)
                    });
            }
        }*/

    }
</script>
