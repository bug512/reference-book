<template>
  <form @submit.prevent="submit">
    <v-card>
      <v-card-title class="headline">Login</v-card-title>
      <v-card-text>
        <div>
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
      email: '',
      password: '',
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
        this.$auth.loginWith('laravelSanctum', {
          data: {
            email: this.email,
            password: this.password,
          }
        }).then(response => {
         console.log(response.data)
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
