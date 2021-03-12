<template>
  <v-row justify="center" align="center">
    <v-col cols="12" sm="8" md="6">
      <div class="text-center">
        <logo />
        <vuetify-logo />
      </div>
      <v-card>
        <v-card-title class="headline"> Customers </v-card-title>
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
          <v-spacer />
          <v-btn color="primary" nuxt to="/inspire"> Add customer </v-btn>
        </v-card-actions>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import Logo from "~/components/Logo.vue";
import VuetifyLogo from "~/components/VuetifyLogo.vue";

export default {
  components: {
    Logo,
    VuetifyLogo,
  },
  data: () => ({
    customers: [
      {
        id: 1,
        full_name: 'Welcome',
        email: 'email1@test.com',
        phone: '123456',
      },
      {
        id: 2,
        full_name: 'Inspire',
        email: 'email2@test.com',
        phone: '1231232334',
      },
      {
        id: 3,
        full_name: 'Welcome 2',
        email: 'email3@test.com',
        phone: '5435345345',
      },
      {
        id: 4,
        full_name: 'Inspire 2',
        email: 'email4@test.com',
        phone: '567567',
      }
    ]
  }),
};
</script>
