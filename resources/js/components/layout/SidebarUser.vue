<template>
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img :src="fotoDePerfil" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{this.user.name}}
          </a>
          <p>
            {{this.user.type}}
          </p>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                user: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: '',
                }),
            }
        },
        computed: {
          fotoDePerfil: function () {
              if(this.user.photo != ""){
                  return "img/profile/" + this.user.photo
              }              
          }
        },

        methods:{
            loadInfo(){
                axios.get("api/profile")
                .then(({ data }) => (this.user.fill(data)));
            }
        },
        created(){
            this.loadInfo();
            Fire.$on('AfterUpdate', () => {
                this.loadInfo();
            });    
        },
    }
</script>