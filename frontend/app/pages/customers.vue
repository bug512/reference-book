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
            label="Used database"
            v-model="database"
            @change="handleChange"
          ></v-select>
        </v-card-subtitle>
        <v-divider></v-divider>
        <v-card-text>
          <customers-table />
        </v-card-text>
        <v-card-actions v-if="loggedIn">
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
  import CustomersTable from "~/components/CustomersTable.vue";
  import {mapState, mapActions} from 'vuex'

  export default {
    data: () => ({
      database: '',
    }),

    components: {
      Logo,
      VuetifyLogo,
      CustomersTable,
    },

    watch: {
      usedStorage(val) {
        this.database = val
        this.getCustomers(val)
      },
    },

    computed: {
      ...mapState('auth', [
        'loggedIn',
      ]),
      ...mapState('customer', [
        'storage',
        'usedStorage',
      ]),
    },

    methods: {
      ...mapActions('customer', [
        'getCustomers',
        'setUsedStorage',
      ]),

      handleChange(value) {
        this.setUsedStorage(value)
      },
    },

    mounted() {
      this.database = this.usedStorage
    },
  };
</script>
