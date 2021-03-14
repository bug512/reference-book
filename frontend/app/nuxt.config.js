import colors from 'vuetify/es5/util/colors'

export default {
  // Target: https://go.nuxtjs.dev/config-target
  target: 'static',

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    titleTemplate: '%s - reference-book',
    title: 'reference-book',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      {charset: 'utf-8'},
      {name: 'viewport', content: 'width=device-width, initial-scale=1'},
      {hid: 'description', name: 'description', content: ''}
    ],
    link: [
      {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'}
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/vuetify
    '@nuxtjs/vuetify',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/auth-next'
  ],

  auth: {
    redirect: {
      login: '/',
      logout: '/',
      callback: '/login',
      home: '/'
    },
    strategies: {
      'laravelSanctum': {
        token: {
          property: 'token',
          required: true,
          type: 'Bearer'
        },
        endpoints: {
          login: {
            url: process.env.API_URL + '/api/login',
            method: 'post',
            propertyName: 'token',
          },
          logout: {
            url: process.env.API_URL + '/api/logout',
            method: 'post'
          },
          user: {
            url: process.env.API_URL + '/api/get-user',
            method: 'get',
          },
        },
        provider: 'laravel/sanctum',
        url: process.env.API_URL,
      },
    }
  },

  // Vuetify module configuration: https://go.nuxtjs.dev/config-vuetify
  vuetify: {
    customVariables: ['~/assets/variables.scss'],
    theme: {
      dark: true,
      themes: {
        dark: {
          primary: colors.blue.darken2,
          accent: colors.grey.darken3,
          secondary: colors.amber.darken3,
          info: colors.teal.lighten1,
          warning: colors.amber.base,
          error: colors.deepOrange.accent4,
          success: colors.green.accent3
        }
      }
    }
  },

  axios: {
    baseURL: process.env.API_URL,
    proxy: true,
    withCredentials: true,
    credentials: true,
    debug: true
  },

  proxy: {
    '/laravel': {
      target: process.env.API_URL,
      pathRewrite: {'^/laravel': '/'}
    }
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {}
}
