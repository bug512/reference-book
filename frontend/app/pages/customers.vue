<template>
  <v-row justify="center" align="center">
    <v-col cols="12" sm="8" md="6">
      <div class="text-center">
        <logo/>
        <vuetify-logo/>
      </div>
      <v-card>
        <v-card-title class="headline">Customers</v-card-title>
        <v-card-subtitle>
          <v-select
            :items="storage"
            label="Using database"
            v-model="database"
          ></v-select>
        </v-card-subtitle>
        <v-card-text>
          <v-simple-table>
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
        </v-card-text>
        <v-card-actions>
          <v-spacer/>
          <v-btn color="primary" nuxt to="/add-customer">Add customer</v-btn>
        </v-card-actions>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
  import Logo from "~/components/Logo.vue";
  import VuetifyLogo from "~/components/VuetifyLogo.vue";
  import {mapState, mapActions} from 'vuex'

  export default {
    data: () => ({
      database: false,
    }),

    components: {
      Logo,
      VuetifyLogo,
    },

    computed: {
      ...mapState('customer', [
        'customers',
        'storage',
      ]),
    },

    methods: {
      ...mapActions('customer', [
        'getCustomers',
        'getStorage',
      ]),
    },

    mounted() {
      this.getCustomers()
      this.getStorage()
    },
  };
</script>
