<template>
    <span>         
        <button v-if="text == '' || text == null" 
                title="Reativar" 
                @click="showModalReactivate()" 
                class="btn bg-purple btn-sm">
            <i class="fa fa-undo"></i>
        </button> 
        <button v-else @click="showModalReactivate()" class="btn bg-purple btn-sm">
            &nbsp;<i class="fa fa-undo"></i>&nbsp;&nbsp;{{ text }}&nbsp;
        </button> 
      
        <transition name="slide-fade">
            <div v-if="showReactivate" style="display:block;" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Reativar</h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ message }}</p>
                        </div>
                        <div class="modal-footer">                       
                            <button title="Reativar" @click.stop.prevent="reactivate()" class="btn btn-primary">OK</button>                                          
                            <button type="button" @click.stop.prevent="closeModalReactivate()" class="btn btn-default">Cancelar</button>                    
                        </div>
                    </div>
                </div>
            </div>
        </transition>
       
        <transition name="slide-fade">
            <div v-if="showMessage" class="modal" style="display:block;" tabindex="-1" role="dialog">
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
    export default {
        props: {                     
            route: {
                type: String,
                required: true
            },              
            message: {
                type: String,
                required: true
            }, 
            redirect: {
                type: String,
                required: true
            },           
            text: {
                type: String
            }               
        },         
        data () {
            return {                                               
                fail: false,               
                successMessage: '',
                showReactivate: false,
                showMessage: false,
            }
        },
        methods: {                                             
            showModalReactivate: function(){
                this.showReactivate = true;                
            },
            closeModalReactivate: function(){
                this.showReactivate = false;                 
            },
            closeModalMessage: function(){
                this.showMessage = false;                
            },
            reactivate: async function(){                
                await axios.post(this.route, this.form)
                .then(response => { 
                    this.fail = response.data.fail;                      
                    this.successMessage = response.data.message;                   
                    this.showReactivate = false;
                    this.showMessage = true;           
                })
                .catch(e => {
                    console.log(e);
                });   
            }           
        },            
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
