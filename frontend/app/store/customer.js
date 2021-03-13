export default {
  state: () => ({
    customers: [],
    storage: [],
    useStorage: false,
  }),

  mutations: {
    setCustomers(state, payload) {
      state.customers = payload
    },
    setStorage(state, payload) {
      state.storage = payload
    },
    setUseStorage(state, payload) {
      state.useStorage = payload
    },
  },

  actions: {
    getCustomers({ commit, state, rootState }) {
      const suffix = state.useStorage ? '?useStorage=' + state.useStorage : ''
      const url = rootState.api.endpoints.customers + suffix
      return this.$axios.$get(url)
        .then(response => {
          commit('setCustomers', response);
        })
    },

    getStorage({ commit, rootState }) {
      const url = rootState.api.endpoints.storages
      return this.$axios.$get(url)
        .then(response => {
          commit('setStorage', response);
        })
    },

    setUseStorage({commit}, payload) {
      commit('setUseStorage', payload);
    },
  },
}
