<template>
  <v-row justify="center" align="center">
    <v-col cols="12" sm="8" md="6">
      <div class="text-center">
        <logo/>
        <vuetify-logo/>
      </div>
      <add-customer-form />
    </v-col>
  </v-row>
</template>

<script>
  import Logo from "~/components/Logo.vue";
  import VuetifyLogo from "~/components/VuetifyLogo.vue";
  import AddCustomerForm from "~/components/AddCustomerForm.vue";

  export default {
    middleware: 'auth',
    components: {
      Logo,
      VuetifyLogo,
      AddCustomerForm,
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
        this.$axios.$post('')
      },
    },
  };
</script>
