<template>
<<<<<<< HEAD
    <div class="iq-comingsoon">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-8 text-center">
                    <div class="iq-comingsoon-info">
                        <a>
                            <img src="" class="img-fluid w-25" alt="">
                        </a>
                        <h3 class="mt-4 mb-1">
                            <a>APOTEK & KLINIK PRATAMA </a>
                            <a class="text-danger">HARAPAN BERSAMA</a>
                        </h3>
                        <hr>
                        <p>Jl. Mataram No 9 (belakang terminal) Pesurungan Lor Kota Tegal, Jawa Tengah Indonesia</p>
                    </div>
                    <a href="/" id="btnGroupDrop1" type="button" class=" px-lg-5 py-2 btn btn-primary">
                        Sign In
                    </a>
                    <div class="btn-group " role="group">
                        <button id="btnGroupDrop1" type="button" class=" px-lg-5 py-2 btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sign In
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                           <a class="dropdown-item" href="">Admin</a>
                           <a class="dropdown-item" href="">Medis</a>
                           <a class="dropdown-item" href="}}">Apoteker</a>
                           <a class="dropdown-item" href="">Kasir</a>
                        </div>
                     </div>
                </div>
            </div>
            <br>
            <br>
        </div>
        <footer class="bg-white iq-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a>Tugas Akhir-2021</a></li>
                            <li class="list-inline-item"><a href="https://informatika.poltektegal.ac.id/">DIV Teknik
                                    Informatika</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 text-right">
                        Copyright |<a> Klinik Pratama -</a><a href="https://poltektegal.ac.id/"> Politeknik Harapan
                            Bersama.</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>
=======
  <v-app id="login" class="primary">
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4 lg4>
            <v-card class="elevation-1 pa-3">
              <v-card-text>
                <div class="layout column align-center">
                  <img src="../../static/m.png" alt="Vue Material Admin" width="120" height="120">
                  <h1 class="flex my-4 primary--text">Material Admin Template</h1>
                </div>
                <v-form>
                  <v-text-field append-icon="person" name="login" label="Login" type="text"
                                v-model="model.username"></v-text-field>
                  <v-text-field append-icon="lock" name="password" label="Password" id="password" type="password"
                                v-model="model.password"></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-btn block color="warning">Kembali</v-btn>
                <v-spacer></v-spacer>
                <v-btn block color="primary" @click="login" :loading="loading">Masuk</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
  export default {
    layout: 'default',
    data: () => ({
      loading: false,
      model: {
        username: 'admin@example.com',
        password: 'password'
      }
    }),

    methods: {
      login() {
        this.loading = true;
        setTimeout(() => {
          this.$router.push('/dashboard');
        }, 1000);
      }
    }

  };
</script>
<style scoped lang="css">
  #login {
    height: 50%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    content: "";
    z-index: 0;
  }
</style>
>>>>>>> 8ac550bc3b57a057a930a47d6b30fd36605564c7
