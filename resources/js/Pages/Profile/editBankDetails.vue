<template>
  <div>
    <VueElementLoading :active="loading" spinner="line-wave" color="var(--primary)" />
    <form @submit.prevent="EditBankDetails" @keydown="form.onKeydown($event)">
      <div class="row mb-3">
        <div class="col-sm-12 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"> Bank Name</span>
                </div>
                <select class="form-control custom-select" v-model="form.bank" name="bank">
                  <option value>-- Choose Bank --</option>
                  <option
                    v-for="bank in banks.data"
                    :key="bank.id"
                    :value="bank.code + ', ' + bank.name "
                  >{{bank.name}}</option>
                </select>
                <has-error :form="form" field="bank"></has-error>
            </div>
        </div>

         <div class="col-sm-12 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text"> Account Number</span>
                </div>
                <input
                    type="text"
                    class="form-control"
                    v-model="form.account_number"
                    name="account_number"
                    :class="{ 'is-invalid': form.errors.has('account_number') }"
                    required
                  />
                <has-error :form="form" field="account_number"></has-error>
            </div>
        </div>

        <div class="col-md-12 mb-4 ">
            <strong class="text-info mb-2">Enter your password to verify that this is you</strong>
            <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Password</span>
            </div>
                <input type="password"  class="form-control" v-model="form.password" placeholder="enter your password"
                  :class="{ 'is-invalid': form.errors.has('password') }" required />
                <has-error :form="form" field="password"></has-error>
            </div>
        </div>

        <div class="col-md-12 mb-3">
          <b-button variant="primary" type="submit" class="float-right btn-hover-shine">Save</b-button>
          <button type="button" class="mr-2 btn btn-link btn-sm float-right" @click="closeMe">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import toastr from "toastr";
import swal from "sweetalert";
import VueElementLoading from "vue-element-loading";
export default {
  components: {
    VueElementLoading,
  },
  props: {
    my_modal: Object,
    user: Object,
  },
  data: function () {
    return {
      form: new Form({
        account_number: '',
        account_name: '',
        bank: '',
        password: '',
      }),
      banks: '',
      bank_details:{},
      loading: false,
    };
  },

  methods: {
      closeMe() {
        this.my_modal.hide("edit-bank");
      },
        getAllBankNames() {
        this.loading = true;
        axios
          .get(this.route("banks.all"))
          .then(res => {
            this.banks = res.data;
          })
          .catch(err => {
            // swal("Error", "Unable to fetch Bank Data ", "error");
          })
          .finally(er => {
            this.loading = false;
          });
      },
      EditBankDetails(){
        //get bank name and bank code
        var bank_details;
        bank_details = this.form.bank;
        bank_details = bank_details.split(", ");

           this.loading = true;
            this.form
                .post(this.route("banks.resolve-account"))
                .then(response => {
            //if no
            if (response.data.status == false) {
                this.loading = false;
                this.$swal(
                "Could not resolve account details.",
                " Check details and try again.",
                "error"
                );
            } else {
                //if returns true show the user his bank details to confirm
                this.form.account_name = response.data.data.account_name;
                this.$swal({
                icon: "info",
                title: "Your Account Details?",
                html:
                    "<b>Account Name:</b> " +
                    response.data.data.account_name +
                    "<br>" +
                    "<b>Account Number:</b> " +
                    response.data.data.account_number +
                    "<br>" +
                    "<b>Bank Name:</b> "
                    + bank_details[1],
                type: "info",
                showCancelButton: true,
                confirmButtonText: "Yes Continue",
                cancelButtonText: "No, Exit",
                cancelButtonColor: "#d92550",
                showCloseButton: true,
                //   showLoaderOnConfirm: true
                }).then(result => {
                //if the user clicks on continue
                    if (result.value) {
                        this.form
                        .post(this.route("banks.save-withdrawal-bank-details"))
                        .then(response => {
                        this.loading = false;
                        toastr["success"]('Withdrawal bank details saved',"Success");
                        this.$emit("bankdetailsUpdated");
                        this.closeMe();
                        })
                        .catch((err) => {
                        this.loading = false;
                        this.$swal("Error",err.response.data.message,"error");
                        });
                    }
                });
            }
            })
            .catch((err) => {
            this.loading = false;
            this.$swal("Error",err.response.data.message,"error");
            });

      },
      //get bank details
            getBankDetails() {
                this.loading = true;
            axios
                .post(this.route("banks.get-withdrawal-details"),{user_id:this.user.id})
                .then((res) => {
                this.bank_details = res.data;
                this.form.bank = res.data.bank_code + ', ' + res.data.bank_name;
                this.form.account_number = res.data.account_number;
                this.loading = false;

                })
                .catch((err) => {
                //   swal("Error", "unable to get data", "error");
                // console.log("error");
                });
            },
    },
  mounted() {
      this.getAllBankNames();
      this.getBankDetails();
  },
};
</script>

<style scoped>
</style>
