<template>
    <span>                       
        <form>      
            <div class="form-group has-feedback" :class="{'has-error' : $v.form.email.$error}">
                <label for="email">Usuário</label>
                <input v-model="form.email" @input="limpar()" type="email" class="form-control" name="email">
                <span class="fa fa-user form-control-feedback"></span>
                <small v-if="$v.form.email.$error && !$v.form.email.required" @keyup.enter.stop.prevent class="help-block">*Preenchimento obrigatório</small>                                                                     
            </div>
            <div class="form-group has-feedback" :class="{'has-error' : $v.form.password.$error}">
                <label for="password">Senha</label>
                <input v-model="form.password" @input="limpar()" @keyup.enter.stop.prevent type="password" name="password" class="form-control">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <small v-if="$v.form.password.$error && !$v.form.password.required" class="help-block">*Preenchimento obrigatório</small>                                                                     
            </div>
            <div class="row">
                <div class="col-xs-8"><strong class="text-red">{{ localMensagem }}</strong></div>       
                <div class="col-xs-4">
                    <button @click.prevent="login()" type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div>        
            </div>
        </form>
    </span>
</template>
 
<script> 
    import { required } from "vuelidate/lib/validators";    
    export default {
        props: {            
            rota: {
                type: String,
                required: true
            },                                                      
            redirect: {
                type: String,
                required: true
            }                               
        },                        
        data () {
            return {                                                                                      
                localMensagem: '',
                localRota: '',
                localRedirect: '', 
                form: {
                    email: '',
                    password: '',                                    
                },                                                           
            }
        },
        validations: {
            form: {
                email: {                                       
                    required,                  
                },                                             
                password: {                                       
                    required,                  
                }                                             
            }         
        },
        methods: {
            limpar: function() {
                this.localMensagem = "";
            },                   
            login: async function() {
                if (this.$v.$invalid) {
                    this.$v.$touch();                                               
                } 
                else {                   
                    this.$v.$reset();                   
                    
                    await axios.post(this.localRota, this.form)
                    .then(response => {                                                                                  
                        window.location = this.localRedirect;
                    })
                    .catch(e => {
                        console.log(e);
                        this.form.email = '';
                        this.form.password = '';
                        this.localMensagem = "Login inválido";
                    });                   
                }               
            },                                                                           
        },
        created() {  
            this.localRedirect = this.redirect;
            this.localRota = this.rota;            
        }       
    }
</script>
