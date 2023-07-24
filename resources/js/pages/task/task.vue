<template>
  <div>
    <div class="input-group col-md-6 page_to_page"></div>
    <div class="row">
      <div class="col-md-12 mx-auto">
        <form @submit.prevent="addAccountType()">
          <div class="form-group mx-sm-3 mb-2 col-md-4">
            <label for="projectName" class="hkf_text">Select Client</label>
            <select
                  class="form-control status"
                  id="status"
                  v-model="forms.client_name"
                  required
                >
                  <option
                    v-for="(project, index) in clients"
                    :key="index"
                    :value="project.username"
                  >
                    {{ project.username }}
                  </option>
                </select>
          </div>
          <div class="form-group mx-sm-3 mb-2 col-md-4">
            <label for="projectName" class="hkf_text">Title</label>
             <input
          type="search"
          v-model="forms.title"
          class="form-control rounded"
          placeholder="Search by Type"
          aria-label="Search"
          aria-describedby="search-addon"
        />
          </div>
  <div class="form-group mx-sm-3 mb-2 col-md-4">
            <label for="projectName" class="hkf_text">Description</label>
             <input
          type="search"
          v-model="forms.description"
          class="form-control rounded"
          placeholder="Description"
          aria-label="Search"
          aria-describedby="search-addon"
        />
          </div>  <div class="form-group mx-sm-3 mb-2 col-md-4">
            <label for="projectName" class="hkf_text">Deadline</label>
             <input
          type="date"
          v-model="form.deadline"
          class="form-control rounded"
          placeholder="Search by Type"
          aria-label="Search"
          aria-describedby="search-addon"
        />
          </div>
          <button type="submit" class="btn btn-primary mb-2">Save</button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "add_reference",
  beforeRouteEnter(to, from, next) {
    next((vm) => {
      // Access the $router property here
      if (!User.hasLoggedIn()) {
        vm.$router.push({ name: "home" });
      } else {
        vm.$router.push({ name: "task" });
      }
    });
  },
  data() {
    return {
        forms:{
            client_name:"",
            title:"",
            description:"",
            deadlline:"",
        },
      form: {
        username: "",
      },
      clients:[],
      errors: {},
    };
  },
  created() {
    this.form.username = User.getUserName();

    axios
      .post("/api/checkClient", this.form)
      .then((res) => {
        this.clients = res.data;
        console.log(res.data);
      })
      .catch((err) => {
        console.log(err.res);
      });
  },
  methods: {
    addAccountType() {
      axios
        .post("/api/task_approve", this.forms, {
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
          },
        })
        .then((res) => {
            console.log(res.data);
        })
        .catch((error) => {
          this.errors = JSON.parse(error.response.data);
        });
    },
  },
};
</script>
