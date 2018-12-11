<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Usuários</h3>

                <div class="card-tools">
                    <button class="btn btn-success" @click="newModal">
                        Adicionar
                        <i class="fas fa-user-plus fa-fw"></i>
                    </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Registrado em</th>
                    <th>Modificar</th>
                  </tr>
                  <tr v-for="user in users" :key="user.id">
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.type | upText}}</td>
                    <td>{{user.created_at | myDate }}</td>
                    <td>
                        <a href="#" @click="editModal(user)">
                            <i class="fa fa-edit blue"></i>
                        </a>
                        /
                        <a href="#" @click="deleteUser(user.id)">
                            <i class="fa fa-trash red"></i>
                        </a>
                    </td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
                    <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editmode ? updateUser() : createUser()">
                <div class="modal-body">
                     <div class="form-group">
                        <input v-model="form.name" type="text" name="name"
                            placeholder="Nome"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                    </div>

                     <div class="form-group">
                        <input v-model="form.email" type="email" name="email"
                            placeholder="Email Address"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                    </div>

                     <div class="form-group">
                        <textarea v-model="form.bio" name="bio" id="bio"
                        placeholder="Short bio for user (Optional)"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                        <has-error :form="form" field="bio"></has-error>
                    </div>


                    <div class="form-group">
                        <select name="type" v-model="form.type" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                            <option value="">Select User Role</option>
                            <option value="admin">Admin</option>
                            <option value="user">Standard User</option>
                            <option value="author">Author</option>
                        </select>
                        <has-error :form="form" field="type"></has-error>
                    </div>

                    <div class="form-group">
                        <input v-model="form.password" type="password" name="password" id="password"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                        <has-error :form="form" field="password"></has-error>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                    <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                </div>

                </form>

                </div>
            </div>
            </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                editmode: false,
                users: {},
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: 'admin-icon.png',
                })
            }
        },
        methods:{
            updateUser(){
                this.$Progress.start();

                this.form.put('api/user/' + this.form.id)
                .then(() => {
                    //success
                    $('#addNew').modal('hide');
                    swal(
                        'Atualizado!',
                        'Usuário atualizado com sucesso.',
                        'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('AfterCreate');
                })
                .catch(() => {
                    //error
                    this.$Progress.fail();
                })
            },
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
            },

            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },

            deleteUser(id){
                swal({
                    title: 'Tem certeza que deseja deletar?',
                    text: "Você não poderá reverter isso!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, quero deletar',
                    }).then((result) => {
                        this.$Progress.start();
                        // Send request to the server
                            if (result.value) {
                                this.form.delete('api/user/'+id).then(()=>{
                                        swal(
                                        'Deletado!',
                                        'Usuário deletado com sucesso.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreate');
                                    this.$Progress.finish();
                                }).catch(()=> {
                                    this.$Progress.fail();
                                    swal("Falhou!", "Algo de errado não está certo.", "warning");
                                });
                         }                      
                    })
            },

            loadUsers(){
                axios.get("api/user").then(({ data }) => (this.users = data.data));
            },

            createUser(){
                this.$Progress.start();

                this.form.post('api/user')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    $('#addNew').modal('hide')

                    toast({
                        type: 'success',
                        title: 'Usuário criado com sucesso'
                        })
                    this.$Progress.finish();

                })
                .catch(()=>{
                    this.$Progress.fail();
                })
            },
        },
        mounted() {
            this.loadUsers();
            console.log('Users Component mounted.');
        },
        created(){
            this.loadUsers();
            Fire.$on('AfterCreate', () => {
                this.loadUsers();
            });
            //setInterval( () => this.loadUsers(), 3000);
        }
    }
</script>
