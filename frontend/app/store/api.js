export default {
  state: () => ({
    endpoints: {
      storages: process.env.API_URL + '/api/storages',
      customers: process.env.API_URL + '/api/customers',
      addCustomer: process.env.API_URL + '/api/add-customer',
      getUser: process.env.API_URL + '/api/get-user',
      login: process.env.API_URL + '/api/login',
    },
  }),
}
