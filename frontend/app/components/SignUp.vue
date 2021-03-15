<template>
  <form @submit.prevent="submit">
    <v-card>
      <v-card-title class="headline">Sign Up</v-card-title>
      <v-card-text>
        <div>
          <v-text-field
            label="Name"
            :rules="passwordRules"
            hide-details="auto"
            v-model="name"
            :error="!!errors.name"
          ></v-text-field>
          <v-alert
            v-if="!!errors.name"
            border="left"
            dense
            outlined
            type="error"
          >{{getMessage(errors.name)}}
          </v-alert>
          <v-text-field
            label="Email"
            :rules="emailRules"
            hide-details="auto"
            v-model="email"
            :error="!!errors.email"
          ></v-text-field>
          <v-alert
            v-if="!!errors.email"
            border="left"
            dense
            outlined
            type="error"
          >
            {{getMessage(errors.email)}}
          </v-alert>
          <v-text-field
            label="Password"
            :type="'password'"
            :rules="passwordRules"
            hide-details="auto"
            v-model="password"
            :error="!!errors.password"
          ></v-text-field>
          <v-alert
            v-if="!!errors.password"
            border="left"
            dense
            outlined
            type="error"
          >
            {{getMessage(errors.password)}}
          </v-alert>
          <v-text-field
            label="Confirm password"
            :type="'password'"
            :rules="passwordRules"
            hide-details="auto"
            v-model="password_confirmation"
            :error="!!errors.password_confirmation"
          ></v-text-field>
          <v-alert
            v-if="!!errors.password_confirmation"
            border="left"
            dense
            outlined
            type="error"
          >
            {{getMessage(errors.password_confirmation)}}
          </v-alert>
        </div>
      </v-card-text>
      <v-card-actions>
        <v-spacer/>
        <v-btn color="primary" :type="'submit'" nuxt>Submit</v-btn>
      </v-card-actions>
      <v-overlay :value="hover">
        <v-progress-circular
          indeterminate
          size="64"
        ></v-progress-circular>
      </v-overlay>
    </v-card>
  </form>
</template>

<script>
  import {mapState} from 'vuex'
  import {getMessage} from '~/helpers/methods.js'

  export default {
    data: () => ({
      hover: false,
      loggedIn: false,
      email: '',
      password: '',
      password_confirmation: '',
      errors: {},
      emailRules: [
        value => !!value || 'Required.',
        value => !value || /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(value) || 'E-mail must be valid',
      ],
      passwordRules: [
        value => !!value || 'Required.',
      ],
    }),
    computed: {
      ...mapState('api', [
        'endpoints'
      ])
    },

    methods: {
      getMessage,
      submit() {
        this.hover = true
        this.$axios.$post(this.endpoints.signUp, {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
        }).then(response => {
          if (response === 'ok') {
            this.$router.push('/login');
          }
        }).catch(error => {
          const code = parseInt(error.response && error.response.status)
          if (code === 400 && error.response.data) {
            this.errors = error.response.data
          }
        }).finally(() => this.hover = false)
      },
    },
  };
</script>
