// Login-Signin
new Vue({
    el: "#app",
    data:{
        type:"password",
    },
    methods:{
        displayPassword:function(){
            if(this.type == "password")
                this.type = "text";
            else
                this.type = "password";
        }
    }
});