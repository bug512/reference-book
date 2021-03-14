export default {
  state: () => ({
    customers: [],
    storage: [],
    usedStorage: process.env.DEFAULT_STORAGE || 'json',
  }),

  mutations: {
    setCustomers(state, payload) {
      state.customers = payload
    },
    setStorage(state, payload) {
      state.storage = payload
    },
    setUsedStorage(state, payload) {
      state.usedStorage = payload
    },
  },

  actions: {
    getCustomers({commit, state, rootState}, payload) {
      let suffix = state.usedStorage ? '?usedStorage=' + state.usedStorage : ''
      if (payload) {
        suffix = '?usedStorage=' + payload
      }
      const url = rootState.api.endpoints.customers + suffix
      this.$axios.$get(url)
        .then(response => {
          commit('setCustomers', response);
        })
    },

    getStorage({commit, rootState}) {
      const url = rootState.api.endpoints.storages
      this.$axios.$get(url)
        .then(response => {
          commit('setStorage', response);
        })
    },

    setUsedStorage({commit}, payload) {
      commit('setUsedStorage', payload);
    },
  },
}
