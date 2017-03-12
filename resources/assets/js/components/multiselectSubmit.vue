<template>
        <div>
            <h1>{{title}}</h1>
            <!-- <form  method="post" enctype="multipart/form-data"> -->
            <form method="GET"  action="http://unitedcode.local/buscar?" accept-charset="UTF-8">
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
  table{
    display: flex;
      margin: 5em auto;
      margin-bottom: 0;
      width: 70%;
      flex-direction: row;
      box-shadow: 1px 1px 0 rgb(52, 73, 94), 2px 2px 0 rgb(52, 73, 94), 3px 3px 0 rgb(52, 73, 94), 4px 4px 0 rgb(52, 73, 94), 5px 5px 0 rgb(52, 73, 94), 6px 6px 0 rgb(52, 73, 94), 7px 7px 0 rgb(52, 73, 94);
  }
  button{
    padding: 0.6em 0.8em;
    background-color: rgb(52, 73, 94);
    color: white;
    border: none;
  }
  div.multiselect {
    flex: 1;
    padding: 0.6em;
    border: 0.2em solid rgb(52, 73, 94);
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
            title:{
                type: String,
                required: true,
                default: 'title'
            },
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
