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
    getCustomers({ commit, state }) {
      const suffix = state.useStorage ? '?useStorage=' + state.useStorage : ''
      return this.$axios.$get('http://localhost:3002/api/customers' + suffix)
        .then(response => {
          commit('setCustomers', response);
        })
    },
    getStorage({ commit }) {
      return this.$axios.$get('http://localhost:3002/api/customers/storage')
        .then(response => {
          commit('setStorage', response);
        })
    },
    setUseStorage({commit}, payload) {
      commit('setUseStorage', payload);
    },
  },
}
