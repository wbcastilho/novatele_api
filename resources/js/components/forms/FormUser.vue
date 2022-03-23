<template>
    <span>        
        <form>           
            <div class="box-body">                 
                <div v-if="obj != null" class="row"> 
                    <div class="form-group col-md-2 col-sm-2 col-xs-12 ">
                        <label for="id">Cód.</label>
                        <input v-model="form.id" type="text" name="id" class="form-control text-center" disabled/>  
                    </div>             
                </div>                

                <div class="row">                
                    <div class="form-group col-md-6 col-sm-6 col-xs-12" :class="{'has-error' : $v.form.name.$error}">
                        <label for="name">Nome</label>
                        <input v-model="form.name" type="text" name="name" class="form-control" /> 
                        <small v-if="$v.form.name.$error && !$v.form.name.required" class="help-block">*Campo requerido</small>                                                                     
                    </div>
                </div>  

                <div class="row">                
                    <div class="form-group col-md-6 col-sm-6 col-xs-12" :class="{'has-error' : $v.form.email.$error}">
                        <label for="name">Email</label>
                        <input v-model="form.email" type="text" name="email" class="form-control" /> 
                        <small v-if="$v.form.email.$error && !$v.form.email.required" class="help-block">*Campo requerido</small>                                                                     
                    </div>
                </div>  
                
                <div class="row">    
                    <div class="form-group has-feedback col-md-4 col-sm-6 col-xs-12" :class="{'has-error' : $v.form.password.$error}">
                        <label for="password">Senha</label>
                        <input v-model="form.password" @input="cleanMessage()" @keyup.enter.stop.prevent type="password" name="password" class="form-control">                   
                        <small v-if="$v.form.password.$error && !$v.form.password.required" class="help-block">*Preenchimento obrigatório</small>                                                                     
                    </div>             
                </div>             
               
            </div>  
            <div class="box-footer">
                <button id="btnSalvar" class="btn btn-success" @click.prevent="save()">Salvar</button>
                <a style="margin-left:5px;" :href="redirect" id="btnCancelar" class="btn btn-default">Voltar</a>                       
            </div>
        </form> 

        <transition name="slide-fade">
            <div v-if="showMessage" style="display:block;" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{ fail == true ? 'Atenção' : 'Mensagem' }}</h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ message }}</p>
                        </div>
                        <div class="modal-footer">
                            <a v-if="fail == false" :href="redirect" class="btn btn-primary">Ok</a> 
                            <button v-else type="button" class="btn btn-primary" @click="closeModalMessage()">Ok</button>                       
                        </div>
                    </div>
                </div>
            </div>
        </transition> 
    </span>
</template>
 
<script> 
    import { required } from "vuelidate/lib/validators"; 
     
    export default {
        props: {            
            obj: {
                type: Object
            },            
            route: {
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
                message: '',
                fail: false,                                           
                showMessage: false, 
                form: {
                    id: 0,                                      
                    name: '',
                    email: '',
                    password: ''                                      
                },                                                                             
            }
        },
        validations: {
            form: {                              
                name: {                                       
                    required,                  
                },                                             
                email: {                                       
                    required,                  
                },                                             
                password: {                                       
                    required,                  
                },                                             
            }         
        },
        methods: {
            cleanMessage: function() {
                this.message = "";
            },  
            closeModalMessage: function(){
                this.showMessage = false;                
            },            
            create: async function() {
                await axios.post(this.route, this.form)
                .then(response => {                      
                    this.fail = response.data.fail;                                         
                    this.message = response.data.message; 
                    this.showMessage = true;            
                })
                .catch(e => {
                    console.log(e);
                });
            },
            update: async function() {
                await axios.put(this.route, this.form)
                .then(response => {                      
                    this.fail = response.data.fail;                       
                    this.message = response.data.message; 
                    this.showMessage = true;           
                })
                .catch(e => {
                    console.log(e);
                });  
            },           
            save() {
                if (this.$v.$invalid)
                    this.$v.$touch();                                     
                else {                    
                    this.$v.$reset();
                    if(this.obj == null)
                        this.create();                    
                    else
                        this.update();                                                   
                }              
            },      
        },
        created() {                                      
            if (this.obj != null) {                            
                this.form.id = this.obj['id'];
                this.form.name = this.obj['name'];                             
                this.form.email = this.obj['email'];                             
            }   
        }        
    }
</script>

<style scoped>
    .slide-fade-enter-active {
        transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to {
        transform: translateX(10px);
        opacity: 0;
    }  
</style>
