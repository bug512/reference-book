export default {
  state: () => ({
    endpoints: {
      storages: process.env.API_URL + '/api/storages',
      customers: process.env.API_URL + '/api/customers',
      addCustomer: process.env.API_URL + '/api/customers/add-customer',
    },
  }),
}
