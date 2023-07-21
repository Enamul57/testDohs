<template>
    <div>

<nav class="navbar navbar-expand navbar-light admin_nav topbar mb-4 static-top shadow" v-show ="!hideNavbarSidebar ">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">

</button>

<!-- Topbar Search -->
<div class="text-center d-none d-md-inline ">
<button @click="toggleData"  class="rounded-circle border-0" id="sidebarToggle" style='background:#605CA8;color:white'><i class="fa fa-bars" style='font-size:1.5rem' aria-hidden="true"> </i></button>
</div>
    <div class="sidebar-brand-text mx-3">
    </div>
<!-- <form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form> -->

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <!-- Nav Item - Alerts -->




    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{username}}</span>
            <img class="img-profile rounded-circle" src="/img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">


            <button @click='logout' class="dropdown-item"  >
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </button>
        </div>
    </li>

</ul>

</nav>



    </div>
</template>
<script>
export default {
    name:'navcomponent',
    data(){
        return{
            clicked:false,
            logout_admin : false,
            username:"",
        }
    },
    created(){
        this.username = User.getUserName();

    },
    methods:{
        toggleData(){
            this.clicked = !this.clicked;
            this.$emit('toggleButton',this.clicked)
        },

        logout(){


             User.logout();




             this.$router.push({name:'login_admin'});


        }
    },
    computed:{
        hideNavbarSidebar(){
            return this.$route.path==='/admin/register' || this.$route.path==='/admin/login';
        }
    }
}
</script>
