<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">List of Clients</h2>
            <div class="divbutton">
                <button class="sortbutton">
                    ASC
                    <font-awesome-icon
                        class="sortAsc"
                        icon="sort-up"
                        @click="sortAsc()"
                        v-on:reloadlistAsc="getListSortAsc()"
                    />
                </button>
                <button  class="sortbutton">
                    DESC
                    <font-awesome-icon
                        class="sortDesc"
                        icon="sort-down"
                        @click="sortDesc()"
                        v-on:reloadlistDesc="getListSortDesc()"
                    />
                </button>
            </div>

            <addClientForm v-on:reloadlist="getList()"/>
        </div>
        <listView :clients="clients"
            v-on:reloadlist="getList()"
            v-on:reloadlistAsc="getListSortAsc()"
            v-on:reloadlistDesc="getListSortDesc()"
        />
    </div>
</template>

<script>
import addClientForm from "./addClientForm";
import listView from "./listView";
export default {
    components: {
        addClientForm,
        listView
    },
    data: function (){
        return {
            clients: []
        }
    },
    methods: {
        sortAsc(){
            axios.get('/api/clients/asc')
            .then( response => {
                if(response.status == 200){
                    this.clients = response.data;
                    this.$emit('reloadlistAsc');
                }
            })
            .catch(error => {
                console.log(error);
            })
            //alert('okAsx');
        },
        sortDesc(){
            alert("hello");
            axios.get('/api/clients/desc')
            .then( response => {
                if(response.status == 200){
                    this.clients = response.data;
                    this.$emit('reloadlistDesc');
                }
            })
            .catch(error => {
                console.log(error);
            })
            //alert('okDsx');
        },
        getListSortDesc(){
            axios.get('/api/clients/desc')
            .then( response => {
                this.clients = response.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        getListSortAsc(){
            axios.get('/api/clients/asc')
            .then( response => {
                this.clients = response.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        getList(){
            axios.get('/api/clients')
            .then( response => {
                this.clients = response.data
            })
            .catch(error => {
                console.log(error);
            })
        }
    },
    created(){
        this.getList();
        this.getListSortAsc();
        this.getListSortDesc();

    }

}
</script>

<style scoped>
.todoListContainer {
    width: 350px;
    margin:auto
}
.heading{
    background: #e6e6e6;
    padding: 10px;
}
#title{
    text-align: center;
}
.sortbutton{
    background: #e6e6e6;
    color: goldenrod;
    outline: goldenrod;
    margin-right: 2%;
}
.divbutton{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 5%;
}
.sortAsc{
    padding-top: 5%;
}
.sortDesc{
    padding-bottom: 5%;
}
</style>
