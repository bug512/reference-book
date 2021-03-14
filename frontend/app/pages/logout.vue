<template>
  <v-overlay :value="hover">
    <v-progress-circular
      indeterminate
      size="64"
    ></v-progress-circular>
  </v-overlay>
</template>

<script>
  import {mapState} from 'vuex'
  import {getMessage} from '~/helpers/methods.js'

  export default {
    data: () => ({
      hover: true,
    }),
    computed: {
      ...mapState('api', [
        'endpoints'
      ])
    },

    mounted() {
      this.hover = true
      this.$auth.logout('laravelSanctum')
      this.$router.push('/');
    }
  };
</script>
