<template>
    <span> 
        <span v-if="obj == null">        
            <button v-if="text == '' || text == null"                     
                    @click="showModalForm()" 
                    class="btn btn-primary btn-sm"
                    style="margin-bottom: 10px;">
                <i class="fa fa-plus"></i>
            </button> 
            <button v-else @click="showModalForm()" class="btn btn-primary btn-sm" style="margin-bottom: 10px;">
                &nbsp;<i class="fa fa-plus"></i>&nbsp;&nbsp;{{ text }}&nbsp;
            </button> 
        </span>
        <span v-else>        
            <button v-if="text == '' || text == null"                     
                    @click="showModalForm()" 
                    class="btn btn-warning btn-sm">
                <i class="fa fa-pencil"></i>
            </button> 
            <button v-else @click="showModalForm()" class="btn btn-warning btn-sm">
                &nbsp;<i class="fa fa-pencil"></i>&nbsp;&nbsp;{{ text }}&nbsp;
            </button> 
        </span>

        <transition name="slide-fade">   
            <div v-if="showForm" style="display:block;" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{ obj == null ? 'Adicionar Usuário' : 'Alterar Usuário' }}</h4>
                        </div>
                        <div class="modal-body">
                            <form> 
                                <div class="form-group has-feedback" :class="{'has-error' : $v.form.name.$error}">
                                    <label for="name">Username</label>
                                    <input v-model="form.name" type="text" class="form-control" name="name">                                    
                                    <small v-if="$v.form.name.$error && !$v.form.email.required" @keyup.enter.stop.prevent class="help-block">*Preenchimento obrigatório</small>                                                                     
                                </div>     
                                <div class="form-group has-feedback" :class="{'has-error' : $v.form.email.$error}">
                                    <label for="email">Email</label>
                                    <input v-model="form.email" type="email" class="form-control" name="email">                                    
                                    <small v-if="$v.form.email.$error && !$v.form.email.required" @keyup.enter.stop.prevent class="help-block">*Preenchimento obrigatório</small>                                                                     
                                </div>
                                <div class="form-group has-feedback" :class="{'has-error' : $v.form.password.$error}">
                                    <label for="password">Senha</label>
                                    <input v-model="form.password" @keyup.enter.stop.prevent type="password" name="password" class="form-control">                                    
                                    <small v-if="$v.form.password.$error && !$v.form.password.required" class="help-block">*Preenchimento obrigatório</small>                                                                     
                                </div>                                
                            </form>
                        </div>
                        <div class="modal-footer">                       
                            <button title="Deletar" @click.stop.prevent="save()" class="btn btn-primary">Salvar</button>                                          
                            <button type="button" @click.stop.prevent="closeModalForm()" class="btn btn-default">Cancelar</button>                    
                        </div>
                    </div>
                </div>
            </div> 
         </transition>       

        <transition name="slide-fade">   
            <div v-if="showMessage" class="modal" style="display:block;" id="myModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{ fail == true ? 'Atenção' : 'Mensagem'}}</h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ successMessage }}</p>
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
            },           
            text: {
                type: String
            },                     
        },             
        data () {
            return {                                                
                fail: false,               
                successMessage: '',                
                showForm: false,
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
            showModalForm: function(){                             
                this.showForm = true;                
            },
            closeModalForm: function(){
                this.showForm = false;                
            },
            closeModalMessage: function(){
                this.showMessage = false;                
            },
            save: async function(){ 
                if (this.isCreate()) {                            
                    await axios.post(this.route, this.form)
                    .then(response => { 
                        this.fail = response.data.fail;                      
                        this.successMessage = response.data.message;
                        this.showForm = false;
                        this.showMessage = true;                                                    
                    })
                    .catch(e => {
                        console.log(e);
                    }); 
                } 
                else {
                    await axios.put(this.route, this.form)
                    .then(response => { 
                        this.fail = response.data.fail;                      
                        this.successMessage = response.data.message;
                        this.showForm = false;
                        this.showMessage = true;                                                    
                    })
                    .catch(e => {
                        console.log(e);
                    }); 
                }                                           
            },
            isCreate: function(){
                if (this.obj == null)
                    return true;
            },               
            isUpdate: function(){
                if (this.obj != null)
                    return true;
            },               
        }, 
        created() { 
            if (this.isUpdate()) {                                        
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
