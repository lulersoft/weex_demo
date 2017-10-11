<template>
    <div>
    </div>
</template>

<script>
    const storage = weex.requireModule('storage')
    const stream = weex.requireModule('stream')
    const modal = weex.requireModule('modal')
    const navigator = weex.requireModule('navigator')
  
    export default {
        data(){
          return{
            userNumber:'',
            userPassword:''
          }
        },
        methods:{
            getData(key){
              storage.getItem(key, event => {
                console.log('get value:', event.data)
                return event.data
              })
            },
            jump_url(url,animated="true",callback){
              navigator.push({
              url: url,
              animated: animated
              }, callback)
            }
        },
        created () {
          
          var user_id=this.getData('user_id')
          var user_name=this.getData('user_name')
          
          var hospital_id=this.getData('hospital_id')
          var dpartment_id=this.getData('dpartment_id')
          var hospital_name=this.getData('hospital_name')
          var dpartment_name=this.getData('dpartment_name')
          var sign=this.getData('sign')
          
          var _url="login";
          if(user_id==null ||sign==null )
          {
            _url="login";
          }else{
            _url="home";
          }
          
          var baseURL = 'file://assets/'+_url+'.js';
          
          this.jump_url(baseURL,"false",event => {
              //modal.toast({ message: 'callback: ' + event +baseURL});
              navigator.pop({url:baseURL,animated:"false"},ev=>{});
          })
          
        }
      
    }
</script>

<style>

</style>