<template>
  <v-row justify="center" align="center">
    <v-col cols="12" sm="8" md="6">
      <div class="text-center">
        <logo/>
        <vuetify-logo/>
      </div>
      <sign-up />
    </v-col>
  </v-row>
</template>

<script>
  import Logo from "~/components/Logo.vue";
  import VuetifyLogo from "~/components/VuetifyLogo.vue";
  import SignUp from "~/components/SignUp.vue";

  export default {
    components: {
      Logo,
      VuetifyLogo,
      SignUp,
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
