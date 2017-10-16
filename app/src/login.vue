<template>
    <div class="wrapper">
        <div class="login">
            <div class="input-wrapper">
		<input v-model="userNumber" class="input" type="text" placeholder="账号 " autofocus="true">

            </div>
            <div class="input-wrapper">
		<input v-model="userPassword" class="input" type="password" placeholder="密码 ">

            </div>
            <div class="input-wrapper">
                <div class="input-login" @click="login">
                    <text class="input-login-text">登录</text>
                </div>
            </div>

        </div>
        <text id="toast"></text>
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
        methods:{
         
            login(event) {
              
                if(this.userNumber.length < 1){
                  modal.toast({
                    message: '请输入账号',
                    duration: 2
                  });
                return;
                 
                }else if(this.userPassword.length < 1){
                  modal.toast({
                    message: '请输入密码',
                    duration: 2
                  });
                return;
                }
                //JSON.stringify
                var body=JSON.stringify({id:"2222222"});
                var headers={username:this.userNumber,pwd:this.userPassword}
                var v="code";

                this.checkLogin('login/'+v,headers,body, res => {            
                modal.toast({
                  message: JSON.stringify(res.data),
                  duration: 2
                });

                if(res.ok){
                    if(res.data.code==0)
                    {

                    }
                }else{
                    modal.toast({
                        message: '网络错误',
                        duration: 2
                    });
                }
                
                })
             
            },

            checkLogin (repo,headers,body,callback) {
                return stream.fetch({
                    method: 'POST',
                    type: 'json',
                    /* headers:headers,*/
                    body:body,
                    url: 'http://you_ip_address/m/' + repo
                }, callback)
            }
        
        }
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
    .login{
        margin-top: 180px;
    }
    .input-wrapper{
        width: 550px;
        margin-left: 100px;
        margin-right: 100px;
        margin-bottom: 30px;
    }
    .input {
        font-size: 30px;
        height: 80px;
        width: 550px;
        padding-left: 90px;
        padding-top: 15px;
        padding-bottom: 15px;
        border-width:1px;
        border-color: #48c9bf;
        border-radius:10px;
        outline: none;
    }
    .input-img{
        position: absolute;
        top:10px;
        left: 15px;
        width: 60px;
        height: 60px;
    }
    .input-login{
        height: 80px;
        width: 550px;
        background-color: #48c9bf;
        border-radius: 10px;
        margin-top: 40px;
    }
    .input-login-text{
        height: 80px;
        width: 550px;
        text-align: center;
        line-height: 80px;
        color: white;
        font-size: 35px;
    }
    .input-forget{
        position: absolute;
        left: 30px;
        font-size: 30px;
    }
    .input-register{
        position: absolute;
        right: 30px;
        font-size: 30px;
    }
</style>
