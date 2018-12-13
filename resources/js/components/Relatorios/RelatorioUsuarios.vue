<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isAdminOrAuthor()">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Usuários</h3>
                <div class="card-tools">
                    <button class="btn color-secondary" @click.prevent="printme">
                        Salvar como PDF
                        <i class="fas fa-print"></i>
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
                  </tr>
                  <tr v-for="user in users.data" :key="user.id">
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.type | upText}}</td>
                    <td>{{user.created_at | myDate }}</td>
                  </tr>
                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer paginacao-users">
                <pagination :data="users" @pagination-change-page="getResults"></pagination>                  
              </div>
            <!-- /.card -->
            </div>
            </div>
        </div>

        <div v-if="!$gate.isAdminOrAuthor()">
            <not-found></not-found>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                users: {},
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: 'profile.png',
                })
            }
        },
        methods:{
            printme(){
                window.print();
            },
            getResults(page = 1) {
                this.$Progress.start();
                        axios.get('api/user?page=' + page)
                            .then(response => {
                                this.users = response.data;
                                this.$Progress.finish();
                            })
                            .catch(() => {
                                swal(
                                    'Oops...!',
                                    'Algo de errado não está certo.',
                                    'error'
                                )
                                this.$Progress.fail();
                            });
            },
            loadUsers(){
                if(this.$gate.isAdminOrAuthor){
                    axios.get("api/users").then(({ data }) => (this.users = data));
                } 
            }
        },

        mounted() {
            this.loadUsers();
            console.log('Users Component mounted.');
        },
    }
</script>