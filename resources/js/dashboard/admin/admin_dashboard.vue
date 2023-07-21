<template>
  <div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="hkf_text text-center mb-4" style="font-weight: 400">Dashboard</h2>
      </div>

      <!-- Content Row -->
      <div class="row">
        <!-- Earnings (Monthly) Card Example -->

      </div>

      <!-- Content Row -->





    </div>
  </div>
</template>
<script>
export default {
  name: "admin_dashboard",
  data() {
    return {
      activeGuard: "",

    };
  },

  created() {
    this.activeGuard = User.getGuard();
    if (!User.hasLoggedIn()) {
      this.$router.push({ name: "login_admin" });
    } else if (User.getGuard() == "admin") {
      this.$router.push({ name: "admin_dashboard" });
    }
    else{
         this.$router.push({ name: "admin_login" });
    }

    //dashboard

  },

  methods: {},
};
</script>
