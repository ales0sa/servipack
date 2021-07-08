<template>
    <div class="mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="">
                    <div class="card-header">Iniciar sesión</div>

                    <div class="card-body">

                <p v-if="errors.length">
                    <b>Errores:</b>
                    <ul class="list-group">
                      <li v-for="error in errors" class="list-group-item list-group-item-danger">{{ error }}</li>
                    </ul>
                </p>

            
                <form @submit="checkForm" id="createAdministrator">
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input v-model="email" type="email" class="form-control" id="email" placeholder="Ingresa tu e-mail" name="email">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input v-model="password" type="password" class="form-control" id="password" placeholder="********" name="password">
                  </div>
                  <div class="form-group mt-3">
                  <button type="submit" 
                  class="btn btn-block btn-success">Ingresar</button>
                  </div>
                </form>
        
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="">
                    <div class="card-header">Registrarse</div>
<p v-if="rerrors.length">
                    <b>Errores:</b>
                    <ul class="list-group">
                      <li v-for="error in rerrors" class="list-group-item list-group-item-danger">{{ error }}</li>
                    </ul>
                </p>
                    <div class="card-body">
                        <form @submit="regForm" id="createAdministrator">
                            <div class="form-group">
                    <label for="email">Nombre:</label>
                    <input v-model="rname" type="text" class="form-control" id="name" placeholder="Nombre / Empresa" name="username">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input v-model="remail" type="email" class="form-control" id="email" placeholder="Ingresa tu e-mail" name="email">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input v-model="rpassword" type="password" class="form-control" id="password" placeholder="********" name="password">
                  </div>
                  <button type="submit" class="btn btn-primary mt-3">Registrarse</button>
                </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>


<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
         data() {
            return {
                errors: [],
                rerrors: [],
                    rname: '',
                    rpassword: '',
                    remail: '',
                    email: '',
                    password: ''
                
            }
        },
        methods:{
          regForm: function (e) {
           
          this.rerrors = [];
          if (!this.remail) {
            this.rerrors.push('Email required.');
          }
          if (!this.rpassword) {
            this.rerrors.push('Password required.');
          }
        else
        {
            console.log('reg')
                
          e.preventDefault();

          let formContents = new FormData()
          formContents.append('name', this.rname);
          formContents.append('email', this.remail);
          formContents.append('password', this.rpassword);

          axios.post('/vuereg', formContents).then(function(response, status, request) {  
                     
                     
                     window.location.href = "/client-area"
                        
                        
                    }, function() {
                        console.log('failed');
                    });
        }
        
          e.preventDefault();
      
      },
        checkForm: function (e) {
           
          this.errors = [];
          if (!this.email) {
            this.errors.push('Email required.');
          }
          if (!this.password) {
            this.errors.push('Password required.');
          }
        else
        {
            console.log('aca')
                
          e.preventDefault();

          let formContents = new FormData()
          formContents.append('email', this.email);
          formContents.append('password', this.password);

          axios.post('/vuelogin', formContents).then(function(response, status, request) {  
                     
                     
                      window.location.href = "/client-area"
                        
                        
                    }, function() {
                        console.log('failed');
                    });
        }
        
          e.preventDefault();
        }
      }
    }
</script>