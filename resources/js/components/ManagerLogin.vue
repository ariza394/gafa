<template>
    <div class="container pt-5">
        <div class="row justify-content-center pt-5">
            <div class="col-md-6 pt-5">
                <div class="card">
                    <div class="card-header text-center">MANAGER LOGIN</div>

                    <div class="card-body">
                        <div>
                            <!-- Email Address -->
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input 
                                        id="email" 
                                        type="email" 
                                        class="form-control" 
                                        name="email"
                                        v-model="user.email"
                                        required 
                                    >
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">password</label>
                                <div class="col-md-6">
                                    <input 
                                        id="password" 
                                        type="password" 
                                        class="form-control" 
                                        name="password" 
                                        v-model="user.password"
                                        required 
                                    >
                                </div>
                            </div>
                            <p style="color:red;" class="is-invalid text-center">{{error}}</p>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="button" @click="login" class="btn btn-primary">
                                        Login
                                    </button>
                                    <button type="button" @click="info" class="btn btn-primary">
                                        info
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            user:{
                email:'',
                password:''
            },
            error:''
        }
    },
    methods:{
        login(){
           //this.$store.dispatch('loginUser',this.user);
           axios.post('http://127.0.0.1:8000/api/login',{
               email:this.user.email,
               password:this.user.password
           })
           .then(response => {
               //console.log(response.data);
               console.log(response.data);
               if(response.data.token){
                localStorage.setItem('token',response.data.token);
                this.error='';
                //this.$router.push({name:'managerlist'});
                window.location.replace('/api/manager');
               }
               else{
                this.error = response.data.message;
               }
           })
            
        },
        info(){
            axios
            .get('http://127.0.0.1:8000/api/prueba')
            .then(response => {
                //this.$store.commit('set_users',response.data)
                console.log(response.data);
            });
        }
    }
}
</script>