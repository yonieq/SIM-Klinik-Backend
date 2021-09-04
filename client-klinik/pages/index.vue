<template>
  <div>
    <center>
      <img src="@/static/sri.jpeg" class="img-fluid w-25" alt="" />
      <div>
        <h3 class="mt-4 mb-1">
          <a>APOTEK & KLINIK </a>
          <a class="primary">SURYA RAHAYU INDONESIA</a>
        </h3>
      </div>
    </center>
    <br />
    <div>
      <center>
        <div>
          <b-dropdown
            id="dropdown-left"
            text="Login Sebagai"
            variant="primary"
            class="m-2"
          >
            <b-dropdown-item href="/admin/login/">Admin</b-dropdown-item>
            <b-dropdown-item href="/pendaftaran/login/">Pendaftaran</b-dropdown-item>
            <b-dropdown-item href="/medis/login/">Medis</b-dropdown-item>
            <b-dropdown-item href="/kasir/login/">Kasir</b-dropdown-item>
            <b-dropdown-item href="/apotek/login/">Apotek</b-dropdown-item>
          </b-dropdown>
        </div>
      </center>
    </div>
    <div>
      <footer class="text-center text-lg-start bg-light text-muted">

        <!-- Section: Links  -->
        <section class="">
          <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
              <!-- Grid column -->
              
              <!-- Grid column -->

              <!-- Grid column -->
              
              <!-- Grid column -->

              <!-- Grid column -->
              
              <!-- Grid column -->

              <!-- Grid column -->
              
              <!-- Grid column -->
            </div>
            <!-- Grid row -->
          </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div
          class="text-center p-4"
          style="background-color: rgba(0, 0, 0, 0.05)"
        >
          © 2021 Copyright:
          <a class="text-reset fw-bold" href="/"
            >PT. SRI </a
          >
        </div>
        <!-- Copyright -->
      </footer>
    </div>
  </div>
</template>