<template lang="html">
  <div class="notification">
    <h1>{{message}}</h1>
  </div>
</template>

<script>
export default {
  data(){
    return{
      message: 'Vue plugin test'
    };
  }
}
</script>

<style lang="scss">
.notification {
    background: red;
}
</style>
