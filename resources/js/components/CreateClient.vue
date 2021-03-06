<template>
    <div>
        <h3 class="text-center">Create Client</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addClient" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="client.name">
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>List of Clients </h2>
                <div v-for="client in clients" :key="client.id">{{client.name}}</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                clients: [],
                client: { name }
                //name: null
            }
        },
        //through this method I create all Categories
		created(){
			this.axios
                    .get('/api/clients')
                    .then(response => (
                        this.clients = response.data.data
                    ))
                    .catch(err => console.log(err))
        },
        methods: {
            addClient() {
                this.axios
                    .post('/api/clients', this.client)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }

        }
    }
</script>
