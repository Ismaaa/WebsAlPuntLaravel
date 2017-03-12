<template>
        <div class="multiselect">
            <!-- <form  method="post" enctype="multipart/form-data"> -->
            <form method="GET"  action="/buscar?" accept-charset="UTF-8">
              <table>
                <tr>
                  <td>
              <div>
                  <multiselect
                    v-model="selectedIngredients"
                   :options="options"
                   :placeholder="placeholder"
                   :multiple="true"
                   :close-on-select="false"
                   :searchable = "true"
                   label="name"
                   trackBy="id"
                   ></multiselect>
              </div>
            </td>
            <td>
              <button type="submit">Buscar</button>
            </td>
          </tr>
          </table>
          <input type="hidden" name="ingredients" :value= "computedValue" id="ingredients">
            </form>
        </div>
</template>
<style>
div.multiselect table{
  width: 70%;
  margin: 0 auto;
}
</style>
<script>
    import { Multiselect } from 'vue-multiselect';
    import axios from 'axios';
    export default{
        data(){
            return {
                selectedIngredients: '',
                options: []
            }
        },
        computed: {
          computedValue: function (){
            var ingredientList = this.selectedIngredients;
            var str = '';
            for(var ing in ingredientList){
              str += ingredientList[ing].name+' '
            }
            return str;
          }
        },
        methods: {

        },
        created(){
          axios.get('/ingredients/get').then(response => {
            this.options = response.data
          })
          .catch(e => {
            this.errors.push(e)
          })
        },
        components: {Multiselect},
        props: {
            placeholder:{
                type: String,
                required: true,
                default: 'placeholder'
            },
            arr: {
               type: Array,
               default: function () { return [] }
             }
        },
    }
</script>
