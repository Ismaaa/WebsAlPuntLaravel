<template>
   <div class="searchIngredients">

     <h1>Selecciona els ingredients</h1>
     <form @submit.prevent="submitSearch" method="post" enctype="multipart/form-data">
       <multiselect
               v-model="ingredient.value"
               :options="options"
               :show-labels="false"
               :placeholder="placeholder"
               :searchable="true"
               :allow-empty="true"
               :multiple="true"
               :close-on-select="false"
               :hide-selected="true"
               :options-limit="5"
               :block-keys="['Tab']"
               :track-by="trackBy"
               key="name"
               label="name"
               v-on:input="onInput"
       ></multiselect>
         <button class="btn btn-primary" type="submit">Enviar</button>
     </form>
   </div>
</template>
<script>
   import { Multiselect } from 'vue-multiselect';
   export default {
    components: { Multiselect },
    data () {
            return {
                selected: null
            }
        },
    props: {
        trackBy: {
                type: String,
                default: 'id'
        },
        value: {
            default: null
        },
        options: {},
        placeholder: {
            default: 'Select one'
        },
        showLabel: {
            type: Boolean,
            default: true
        },

        title: {
              type: String,
              default: null
          },
            formName: {
                type: String,
                default: null
            }
    },
    methods: {
      onInput(event) {
            this.$emit('input', event);
      }
    }
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
