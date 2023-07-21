<template>
  <!-- sidebar-->

  <div id="wrapper" v-if="authenticatedRoutes($route.name)">
    <!-- Sidebar -->
    <SidebarComponent :sideMenu="clicked" v-if="admin_sidebar"></SidebarComponent>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <NavComponent
          @toggleButton="forSidebar"
          v-show="admin_sidebar || manager_sidebar"
        ></NavComponent>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" :class="containerDynamic">
          <!-- Page Heading -->
          <router-view></router-view>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white" v-show="admin_sidebar ">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span style="color: #3d388d; font-size: 1.2em"
              >Copyright &copy; Website 2021</span
            >
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div
    class="modal fade"
    id="logoutModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          Select "Logout" below if you are ready to end your current session.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">
            Cancel
          </button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
</template>
<style></style>
<script>
import NavComponent from "../components/nav.vue";
import SidebarComponent from "../components/sidebar-component.vue";

export default {
  data() {
    return {
      clicked: false,
      activeGuard: "",

      manager_sidebar: false,
      admin_sidebar: false,
    };
  },

  components: {
    NavComponent,
    SidebarComponent,

  },
  created() {
    this.isAuthenticated = User.hasLoggedIn();
    this.activeGuard = User.getGuard();
    this.updateSidebar();
  },
  computed: {
    validRoutes() {
      const routes = [

        "register_admin",
        "login_admin",
        "admin_dashboard",
        'task',
      ];
      return routes;
    },

    isAdmin() {
      return this.admin_sidebar;
    },
    containerDynamic() {
      return {
        container_custom:

          this.$route.path === "/admin/register" ||
          this.$route.path === "/admin/login"

      };
    },
  },

  watch: {
    $route: "updateSidebar",
    // $route: "hashchange",
  },
  methods: {
    forSidebar(data) {
      this.clicked = data;
    },
    authenticatedRoutes(routeName) {
      return this.validRoutes.includes(routeName);
    },
    updateSidebar() {
      if (User.getGuard() === "admin") {
        this.admin_sidebar = true;
        window.scrollTo(0, 0);
      } else {
        this.admin_sidebar = false;

        window.scrollTo(0, 0);
      }
    },
    hashchange() {
      // Scroll to the top of the page
      window.scrollTo(0, 0);
    },
  },
};
</script>
<style>
.container_custom {
  padding: 0 !important;
}
</style>
