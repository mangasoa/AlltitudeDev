<template>
    <div>
      <div v-for="(client,index) in clients" :key="index">
          <listClient
            :client="client"
            class="client"
            v-on:clientchanged="$emit('reloadlist')"
            v-on:reloadlistAsc="$emit('reloadlistAsc')"
            v-on:reloadlistDesc="$emit('reloadlistDesc')"
          />
      </div>
    </div>
</template>

<script>
import listClient from './listClient';
export default {
    props: ['clients'],
    components: {
        listClient
    }

}
</script>

<style scoped>
.client{
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>
