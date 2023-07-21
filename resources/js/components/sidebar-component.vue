<template>
  <ul
    class="navbar-nav sidebar sidebar-dark accordion"
    :class="{ sidemenuChange: sideMenu }"
    id="accordionSidebar"
    v-show="!hideRegisterLogin"
  >
    <!-- bg-gradient-primary -->
    <div
      class="logo_container sidebar-brand d-flex align-items-center justify-content-center"
    >
      <div class="sidebar-brand-icon">
        <img class="logo" src="/img/logo.png" alt="" />
      </div>
    </div>
    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
      <div class="sidebar-brand-icon rotate-n-15"></div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />
    <div class="dashboard-lists">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active" style="background: #605ca8">
        <router-link class="nav-link" :to="{name:'admin_dashboard'}" :class="{ collapse_link: sideMenu }">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></router-link
        >
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Interface</div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a
          class="nav-link collapsed"
          :class="{ collapse_link: sideMenu }"
          href="#"
          data-toggle="collapse"
          data-target="#admininistrator"
          aria-expanded="true"
          aria-controls="admininistrator"
        >
          <i class="fa fa-user"></i>
          <span>Administrator</span>
        </a>
        <div
          id="admininistrator"
          class="collapse"
          aria-labelledby="headingPages"
          data-parent="#accordionSidebar"
        >
          <div class="sub_menu py-2 collapse-inner rounded">
            <router-link
              class="collapse-item"
              :class="{ collapse_Font: sideMenu }"
              :to="{ name: 'task' }"
              >Task</router-link
            >
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->


      <!-- Nav Item - Charts -->

      <!-- Nav Item - Tables -->
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <!-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> -->

    <!-- Sidebar Message -->
  </ul>
</template>
<script>
export default {
  name: "sidebar",
  data() {
    return {
      registerRoute: true,
    };
  },
  props: {
    sideMenu: {
      type: Boolean,
      required: true,
    },
  },
  computed: {
    hideRegisterLogin() {
      return (
        this.$route.path === "/admin/register" ||
        this.$route.path === "/admin/login" ||
        this.$route.path === "/manager/register" ||
        this.$route.path === "/manager/login" ||
        this.$route.path === "/" ||
        this.$route.path === "/:catchAll(.*)"
      );
    },
  },
};
</script>
<style>
.sidemenuChange {
  width: 11rem !important;
}
.collapse_Font {
  font-size: 0.8em;
  width: 9rem !important;
}
.collapse_link {
  width: 11rem !important;
}
.logo {
  background-size: cover;
  width: 100%;
  height: 100%;
  margin-top: 2em;
  margin-bottom: 2em;
}
.logo_container {
  height: 115px !important;
}
</style>
