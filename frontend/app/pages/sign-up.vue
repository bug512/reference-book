<template>
  <v-row justify="center" align="center">
    <v-col cols="12" sm="8" md="6">
      <div class="text-center">
        <logo/>
        <vuetify-logo/>
      </div>
      <form @submit.prevent="submit">
        <v-card>
          <v-card-title class="headline">Sign Up</v-card-title>
          <v-card-text>

            <v-text-field
              label="Name"
              :rules="requiredRules"
              hide-details="auto"
            ></v-text-field>
            <v-text-field
              label="Email"
              :rules="emailRules"
              hide-details="auto"
            ></v-text-field>
            <v-text-field
              label="Password"
              :type="'password'"
              :rules="requiredRules"
              hide-details="auto"
            ></v-text-field>
          </v-card-text>
          <v-card-actions>
            <v-spacer/>
            <v-btn color="primary" nuxt>Submit</v-btn>
          </v-card-actions>
        </v-card>
      </form>
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
      emailRules: [
        value => !!value || 'Required.',
        value => !value || /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(value) || 'E-mail must be valid',
      ],
      requiredRules: [
        value => !!value || 'Required.',
      ],
    }),

    methods: {
      submit() {
        alert('sdsdsd')
      },
    },
  };
</script>
