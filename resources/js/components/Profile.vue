<style>
    .widget-user-header{
    background-position: center center;
    background-size: cover;
    height: 300px !important;
  }
  .widget-user .card-footer{
    padding: 0;
  }
</style>
<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white" style="background-image:url('./img/capa.png')">
                    <h3 class="widget-user-username">{{this.form.name | upText}}</h3>
                    <h5 class="widget-user-desc">{{this.form.type | upText}}</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" :src="getProfilePhoto()" alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">Pontuação</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text">Indicados</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">Solicitações de troca</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                </div>
            </div>

            <!-- tab -->

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active show" href="#activity" data-toggle="tab">Atividades</a></li>
                        <li class="nav-item"><a class="nav-link" @click.prevent="setConfig()" href="#settings" data-toggle="tab">Configurações</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Activity Tab -->
                            <div class="tab-pane active show" id="activity">
                                <h3 class="text-center">Mostrando atividades...</h3>
                            </div>
                            <!-- Setting Tab -->
                            <div class="tab-pane " id="settings">
                                <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Nome</label>

                                    <div class="col-sm-12">
                                    <input type="" v-model="form.name" class="form-control" id="inputName" placeholder="Nome do Usuário" :class="{ 'is-invalid': form.errors.has('name') }">
                                     <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>

                                    <div class="col-sm-12">
                                    <input type="email" v-model="form.email" class="form-control" id="inputEmail" placeholder="E-mail"  :class="{ 'is-invalid': form.errors.has('email') }">
                                     <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Bio</label>

                                    <div class="col-sm-12">
                                    <textarea  v-model="form.bio" class="form-control" id="inputExperience" placeholder="Biografia" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                                     <has-error :form="form" field="bio"></has-error>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo" class="col-sm-2 control-label">Foto de Perfil</label>
                                    <div class="col-sm-12">
                                        <input type="file" @change="updateProfile" name="photo" class="form-input">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-sm-12 control-label">
                                        Senha (Se você deixar vazio, ela não mudará.)
                                    </label>

                                    <div class="col-sm-12">
                                    <input type="password"
                                        v-model="form.password"
                                        class="form-control"
                                        id="password"
                                        placeholder="Senha"
                                        :class="{ 'is-invalid': form.errors.has('password') }"
                                    >
                                     <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-12">
                                    <button @click.prevent="updateInfo" type="submit" class="btn btn-success">Atualizar perfil</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        <!-- /.Setting tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
          </div>
          <!-- end tabs -->
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: '',
                })
            }
        },

        methods: {
            setConfig(){
                this.form.reset();
                this.loadInfo();
            },
            getProfilePhoto(){
               let photo = (this.form.photo.length > 200) ? this.form.photo : "img/profile/"+ this.form.photo ;
                return photo;
            },

            updateInfo(){
              this.$Progress.start();
                if(this.form.password == ''){
                    this.form.password = undefined;
                }
                this.form.put('api/profile')
                .then(()=>{
                    swal(
                        'Atualizado!',
                        'Usuário atualizado com sucesso.',
                        'success'
                    )
                    Fire.$emit('AfterCreate');
                    Fire.$emit('AfterUpdate'); 
                    this.$Progress.finish();                                       
                })
                .catch(() => {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Algo de errado não está certo.',
                    })
                    this.$Progress.fail();
                });
            },

            updateProfile(e) {
                let file = e.target.files[0];
                let reader = new FileReader();

                let limit = 1024 * 1024 * 2;
                if (file['size'] > limit) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Você está submetendo uma foto muito grande.',
                    })
                    return false;
                }

                reader.onloadend = (file) => {
                    this.form.photo = reader.result;
                }
                reader.readAsDataURL(file);
            },
            loadInfo(){
                axios.get("api/profile")
            .then(({ data }) => (this.form.fill(data)));
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        created() {
            this.loadInfo();
        }
    }

</script>
