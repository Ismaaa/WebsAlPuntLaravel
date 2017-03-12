                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <template>
        <div class="multiselect">
          <table><tr><td><form method="GET"  action="/buscar?" accept-charset="UTF-8">
              <div class="shadow" style="display: inline-flex;">
                  <multiselect
                    v-model="selectedIngredients"
                   :options="options"
                   :placeholder="placeholder"
                   :select-label="selectLabel"
                   :deselect-label="deselectLabel"
                   :selected-label="selectedLabel"
                   :multiple="true"
                   :close-on-select="false"
                   :searchable = "true"
                   label="name"
                   trackBy="id"
                   :options-limit="5"
                   :loading="isLoading"
                   :hide-selected="true"
                   :internal-search="internalSearch"
                   @search-change="asyncFind"
                   id="ajax"
                   ></multiselect>
                   <button type="submit">Buscar</button>
              </div>
              <input type="hidden" name="ingredients" :value= "computedValue" id="ingredients">
        </form></td></tr></table>
        </div>
</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
  div.multiselect table{
    margin: 0 auto;
        width: 50%;
  }

  div.shadow{
        width: 100%;
    box-shadow:
            1px 1px 0 rgb(52, 73, 94),
            2px 2px 0 rgb(52, 73, 94),
            3px 3px 0 rgb(52, 73, 94),
            4px 4px 0 rgb(52, 73, 94),
            5px 5px 0 rgb(52, 73, 94),
            6px 6px 0 rgb(52, 73, 94),
            7px 7px 0 rgb(52, 73, 94)
  ;
  }
  .multiselect__tags{
    border: none;
  }

  button{
    border: none;
    cursor: pointer;
    background: white;
    padding: 5px;
    color: rgb(52, 73, 94);
  }
  .multiselect__select:before{
    color: rgb(52, 73, 94);
    border-color: rgb(52, 73, 94) transparent transparent;
  }
</style>
<script>
    import { Multiselect } from 'vue-multiselect';
    import axios from 'axios';
    export default{
        data(){
            return {
                selectedIngredients: '',
                options: [],
                isLoading: false,
                internalSearch: true
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
          asyncFind: function(query){
            this.isLoading = true;
            this.internalSearch = false;
            var otherResults = [];
            axios.get('/ingredients/get/'+query).then(response => {
                this.options = response.data;
                this.isLoading = false;
                this.internalSearch = false;
            })
            .catch(function (error) {
              console.log(error);
            });

          },
          shuffle: function(a) {
            for (let i = a.length; i; i--) {
              let j = Math.floor(Math.random() * i);
              [a[i - 1], a[j]] = [a[j], a[i - 1]];
            }
          }
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
            selectLabel:{
                type: String,
                required: false,
                default: 'placeholder'
            },
            deselectLabel:{
                type: String,
                required: false,
                default: 'placeholder'
            },
            selectedLabel:{
                type: String,
                required: false,
                default: 'placeholder'
            },
            arr: {
               type: Array,
               default: function () { return [] }
             }
        },
    }
</script>
