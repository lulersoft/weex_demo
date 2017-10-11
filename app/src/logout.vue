<template>
    <div class="wrapper">
        <text id="toast">logout</text>
    </div>
</template>

<script>
    var stream = weex.requireModule('stream')
    var modal = weex.requireModule('modal');
  
    export default {
        data(){
          return{
            userNumber:'',
            userPassword:''
          }
        },
        methods:{  },
    }

</script>

<style>
    .wrapper {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    } 
</style>