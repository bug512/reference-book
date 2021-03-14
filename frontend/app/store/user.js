export default {
  state: () => ({
    isGuest: true,
    isUser: false,
  }),

  mutations: {
    setUser(state, payload) {
      state.isUser = payload
      state.isGuest = !payload
    },
  },

  actions: {
    getUser({commit, state, rootState}) {
      const url = rootState.api.endpoints.getUser
      this.$axios.$get(url)
        .then(response => {
          console.log(response)
          commit('setUser', response);
        })
    },
  },
}
