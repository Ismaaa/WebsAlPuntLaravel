require("./bootstrap");


import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex)

import multiselect from './components/multiselect.vue';
import multiselectSubmit from './components/multiselectSubmit.vue';

const store = new Vuex.Store({
  state: {
    value: 'Vuex',
    options: ['Vuex', 'Vue', 'Vuelidate', 'Vue-Multiselect', 'Vue-Router']
  },
  mutations: {
    updateValue (state, value) {
      state.value = value
    }
  },
  actions: {
    updateValueAction ({ commit }, value) {
      commit('updateValue', value)
    }
  }
})

const app = new Vue({
    el: '#app',
    components: {
        'multiselect' : multiselectSubmit
    }
});
