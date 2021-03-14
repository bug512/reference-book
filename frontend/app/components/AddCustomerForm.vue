<template>
  <form @submit.prevent="submit">
    <v-card>
      <v-card-title class="headline">Add customer</v-card-title>
      <v-card-text>
        <div>
          <v-select
            :items="storage"
            label="Used database"
            v-model="customer.database"
            @change="handleChange"
            :error="!!errors.database"
          ></v-select>
          <v-alert
            v-if="!!errors.database"
            dense
            outlined
            type="error"
          >
            {{getMessage(errors.database)}}
          </v-alert>
        </div>
        <v-divider></v-divider>
        <div>
          <v-text-field
            label="Full name"
            :rules="requiredRules"
            hide-details="auto"
            v-model="customer.full_name"
            :error="!!errors.full_name"
          ></v-text-field>
          <v-alert
            v-if="!!errors.full_name"
            border="left"
            dense
            outlined
            type="error"
          >
            {{getMessage(errors.full_name)}}
          </v-alert>
          <v-text-field
            label="Email"
            :rules="emailRules"
            hide-details="auto"
            :error="!!errors.email"
            v-model="customer.email"
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
            label="Phone"
            :rules="requiredRules"
            hide-details="auto"
            :error="!!errors.phone"
            v-model="customer.phone"
          ></v-text-field>
          <v-alert
            v-if="!!errors.phone"
            border="left"
            dense
            outlined
            type="error"
          >
            {{getMessage(errors.phone)}}
          </v-alert>
        </div>
      </v-card-text>
      <v-card-actions>
        <v-spacer/>
        <v-btn
          color="primary"
          :type="'submit'"
          nuxt
        >Save
        </v-btn>
      </v-card-actions>
      <v-overlay :value="hover">
        <v-progress-circular
          indeterminate
          size="64"
        ></v-progress-circular>
      </v-overlay>
      <v-overlay
        :absolute="true"
        :value="success"
      >
        <v-btn
          color="success"
          @click="handleSuccess"
        >
          {{success}}
        </v-btn>
      </v-overlay>
    </v-card>
  </form>
</template>

<script>
  import {mapState, mapActions} from 'vuex'
  import {getMessage} from '~/helpers/methods.js'

  export default {
    data: () => ({
      hover: false,
      success: false,
      customer: {
        database: '',
        full_name: '',
        email: '',
        phone: '',
      },
      errors: {},

      emailRules: [
        value => !!value || 'Required.',
        value => !value || /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(value) || 'Email must be valid',
      ],

      requiredRules: [
        value => !!value || 'Required.',
      ],
    }),

    watch: {
      usedStorage(val) {
        this.customer.database = val
      },

      success(val) {
        val && setTimeout(() => {
          this.handleSuccess()
        }, 10000)
      },
    },

    computed: {
      ...mapState('api', [
        'endpoints',
      ]),
      ...mapState('customer', [
        'storage',
        'usedStorage',
      ]),
    },

    methods: {
      getMessage,
      ...mapActions('customer', [
        'setUsedStorage',
      ]),

      submit() {
        this.hover = true
        const token = this.$auth.strategy.token.get()
        this.$axios.$post(
          this.endpoints.addCustomer,
          this.customer,
          {headers: {"Authorization": `${token}`}}
        ).then(response => {
          this.success = this.getMessage(response)
          this.errors = {}
        }).catch(error => {
          const code = parseInt(error.response && error.response.status)
          if (code === 400 && error.response.data) {
            this.errors = error.response.data
          }
        }).finally(() => this.hover = false)
      },

      handleChange(value) {
        this.setUsedStorage(value)
      },

      handleSuccess() {
        this.success = false
        this.errors = {}
        this.customer = this.getClearCustomer()
      },

      getClearCustomer() {
        return {
          database: this.usedStorage,
          full_name: '',
          email: '',
          phone: '',
        }
      },
    },

    mounted() {
      this.customer.database = this.usedStorage
    },
  };
</script>
<style lang="scss" scoped>
  .v-alert {
    margin-top: 8px;
  }

  .v-input {
    margin-top: 10px;
  }
</style>
