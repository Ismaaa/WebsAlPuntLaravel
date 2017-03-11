<template>
   <div class="dropdown">
       <multiselect
               :selected.sync="selected"
               :show-labels="false"
               :options="options"
               :placeholder="placeholder"
               :searchable="true"
               :allow-empty="true"
               :multiple="true"
               :close-on-select="false"
               :hide-selected="true"
               :options-limit="5"
               :block-keys="['Tab', 'Enter']"
               key="name"
               label="name"
       ></multiselect>
       <label v-show="showLabel" for="multiselect"><span></span>Language</label>
   </div>
</template>

<script>
   import { Multiselect } from 'vue-multiselect';

   export default {
       components: { Multiselect },

       props: {
           options: {},
           placeholder: {
               default: 'Select one'
           },
           showLabel: {
               type: Boolean,
               default: true
           },
           selected: ''
       }
   };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
