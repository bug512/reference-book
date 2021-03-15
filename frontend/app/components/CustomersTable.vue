<template>
  <v-simple-table
    fixed-header
    height="400px"
    >
    <template v-slot:default>
      <thead>
      <tr>
        <th class="text-left">Full name</th>
        <th class="text-left">Email</th>
        <th class="text-left">Phone</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="item in customers" :key="item.id">
        <td>{{ item.full_name }}</td>
        <td>{{ item.email }}</td>
        <td>{{ item.phone }}</td>
      </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
  import {mapState, mapActions} from 'vuex'

  export default {
    computed: {
      ...mapState('customer', [
        'customers',
      ]),
    },

    methods: {
      ...mapActions('customer', [
        'getCustomers',
      ]),
    },

    mounted() {
      this.database = this.defaultStorage
      this.getCustomers()
    },
  };
</script>
