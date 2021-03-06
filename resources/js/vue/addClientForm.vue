<template>
    <div class="addClient">
        <input type="text" v-model="client.name"/>
        <font-awesome-icon
        icon="plus-square"
        @click="addClient()"
        :class="[client.name ? 'active': 'inactive', 'plus']"
        />
    </div>
</template>

<script>
export default {
    data: function(){
        return {
            client: {
                name: ""
            }
        }
    },
    methods: {
        addClient() {
            if(this.client.name == ''){
                return;
            }
            axios.post('/api/clients/store', {
                client: this.client
            })
            .then( response => {
                if(response.status == 201){
                    this.client.name = "";
                    this.$emit('reloadlist');
                }
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>
 <style scoped>
.addClient{
    display: flex;
    justify-content: center;
    align-content: center;
}
input {
    background: #f7f7f7;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width:100%
}
.plus {
    font-size: 20px;
    margin-top: 2%;
}
.active {
    color: #00CE25;
}
.inactive{
    color: #9999999
}

 </style>
