<template>
    <div>
     <VueElementLoading :active="loading" spinner="line-wave" color="var(--primary)" />
     <form @submit.prevent="UpdateUser">
     <div class="row mb-3 mt-3">

      <div class="col-md-6 mb-4">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Full name</span>
            </div>
                <input type="text"  class="form-control" v-model="form.name" name="fname" :class="{ 'is-invalid': form.errors.has('fname') }" required />
                <has-error :form="form" field="fname"></has-error>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Phone</span>
            </div>
                <input type="text"  class="form-control"  placeholder="08012345678" required
                v-model="form.phone" name="phone" :class="{ 'is-invalid': form.errors.has('phone') }" />
                <has-error :form="form" field="phone"></has-error>
            </div>
        </div>

        <!-- <div class="col-md-6 mb-4">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Email</span>
            </div>
                 <input type="email"  class="form-control" v-model="form.email" name="email" :class="{ 'is-invalid': form.errors.has('email') }" />
                 <has-error :form="form" field="email"></has-error>
            </div>
        </div> -->

        <div class="col-md-6 mb-4 ">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Gender</span>
            </div>
                <select
                      class="custom-select form-control" v-model="form.gender" required>
                      <option value="">-- select gender -- </option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="other">Other</option>
                      <option value="prefer not to say">Prefer not to say</option>
                    </select>
            </div>
        </div>

        <div class="col-md-6 mb-4 ">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Marital Status</span>
            </div>
                <select
                      class="custom-select form-control" v-model="form.marital_status" required>
                      <option value="">-- select marital status -- </option>
                      <option value="married">married</option>
                      <option value="single">single</option>
                      <option value="divorced">divorced</option>
                      <option value="separated">separated</option>
                    </select>
            </div>
        </div>

        <div class="col-md-6 mb-4 ">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Religion</span>
            </div>
                <select
                      class="custom-select form-control" v-model="form.religion" required>
                      <option value="">-- select religion -- </option>
                      <option value="christianity">christianity</option>
                      <option value="islam">islam</option>
                      <option value="traditional">traditional</option>
                      <option value="other">other</option>
                      <option value="none">none</option>
                    </select>
            </div>
        </div>

        <div class="col-md-6 mb-4 ">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">DOB</span>
            </div>
                <input type="date"  class="form-control" v-model="form.dob" required/>
            </div>
        </div>

        <!-- <div class="col-md-6 mb-4">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> State</span>
            </div>
                <select
                v-if="form.lgas != null"
                class="form-control custom-select"
                v-model="form.state_id"
                @change="getLga(form.state_id)"
                required
              >
                <option value>-- Choose --</option>
                <option v-for="state in states" :key="state.id" :value="state.id">{{state.stname}}</option>
              </select>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Lga</span>
            </div>
                  <select class="form-control custom-select" v-model="form.lga_id" required>
                <option>-- Choose --</option>
                <option v-for="lga in lgas" :key="lga.id" :value="lga.id">{{lga.lganame}}</option>
              </select>
            </div>
        </div> -->

        <div class="col-md-6 mb-4">
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> Address</span>
            </div>
                <textarea id class="form-control" v-model="form.address" name="address" :class="{ 'is-invalid': form.errors.has('address') }" required ></textarea>
                <has-error :form="form" field="address"></has-error>
            </div>
        </div>

        <div class="col-md-12 mb-4 ">
            <strong class="text-info mb-2">Enter your password to verify that it is you</strong>
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Password</span>
            </div>
                <input type="password"  class="form-control" v-model="form.password" name="password" placeholder="enter your password"
                  :class="{ 'is-invalid': form.errors.has('password') }" required />
                <has-error :form="form" field="password"></has-error>
            </div>
        </div>

        </div>
        <div class="d-block text-right card-footer">
          <button type="button" class="mr-2 btn btn-link btn-sm" @click="closeMe">Cancel</button>
          <button type="submit" class="btn btn-hover-shine btn-primary btn-sm">Update</button>
        </div>
      </form>



  </div>
</template>

<script>
import toastr from "toastr";
export default {
  props: {
    my_modal: Object,
    user:Object,
  },
  components: {
  },

  data: function () {
    return {
      states: {},
      lgas: {},
      form: new Form(
            this.user,
        ),
      loading:false,

  }},

  methods: {
    //update user
    UpdateUser () {
          this.loading = true;
          this.form.post('/profile/update')
            .then(() => {
                this.$page.props.user.name = this.form.name;
                this.$emit('update-user');
                this.loading = false;
                this.closeMe();
                toastr["success"]('Profile updated successfully', "Success");

            })
            .catch((err) => {
                this.loading = false;
                if (err.response.data.message == 'Your email address is not verified.' || err.response.status == 403) {
                  toastr["error"]('you have not verified your email address', "Email verification");
                  this.loading = true;
                  axios
                    .post("/profile/verify-email")
                    .then(res =>{
                        this.loading= false;
                        this.$inertia.visit("/email/verify");

                    })
                    .catch((err) => {
                        this.loading= false;

                    })
                }
                 else if(err.response.data.message == 'incorrect password' || err.response.status == 422) {
                  toastr["error"]('Incorrect Password', "Password validation");
                }
                else {
                  toastr["error"]('profile not updated', "error");
                }
            })
        },

      getAllState() {
      this.loading = true;
      axios
        .get(this.route("get-states"))
        .then(res => {
          this.states = res.data;
        })
        .catch(err => {
          //swal("Error", "Unable to fetch State Data ", "error");
        })
        .finally(() => {
          this.loading = false;
        });
    },
     getLga(id) {
       this.loading = true;
      axios
        .get(this.route("get-lgas", id))
        .then(res => {
          this.lgas = res.data;
        })
        .catch(err => {
         // swal("Error", "Unable to fetch Local Govt Data ", "error");
        })
        .finally(() => {
            this.loading = false;
        });
    },
     closeMe() {
      this.my_modal.hide("edit-profile");
    },
  },
    mounted() {
    // this.getAllState();
    // if(this.form.lgas != null){
    //   this.getLga(this.form.state_id)
    // }
  },
};
</script>
