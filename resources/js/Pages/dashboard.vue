<template>
    <div>
        <page-title
        :heading="heading"
        :subheading="subheading"
        :icon="icon"
        ></page-title>
        <VueElementLoading :active="loading" spinner="line-wave" color="var(--primary)"/>
        <div class="flex justify-between overflow-x-auto card mb-3 shadow-lg">
            <div class="row card-body">
                <div class="col-md-3 mt-1 mb-1">
                    <div class="card  widget-chart widget-chart2 bg-primary text-left savingtypes shadow-lg">
                        <div class="widget-chart-content text-white ">
                            <div class="widget-chart-flex">
                                <div class="widget-title">Normal Savings</div>
                                <!-- <div class="widget-subtitle opacity-7">Monthly Goals</div> -->
                            </div>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers text-warning">
                                    <h6>₦100,000,000</h6>
                                </div>
                                <div class="icon-wrapper border-light rounded-circle">
                                    <div class="icon-wrapper-bg bg-light"></div>
                                    <i class="lnr-diamond icon-gradient bg-malibu-beach"> </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-1 mb-1">
                    <div class="card  widget-chart widget-chart2 bg-night-sky text-left savingtypes shadow-lg">
                        <div class="widget-chart-content text-white">
                            <div class="widget-chart-flex">
                                <div class="widget-title">Save for Real Estate</div>
                            </div>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers text-warning">
                                    <h6>₦100,000,000</h6>
                                </div>
                                <div class="icon-wrapper border-light rounded-circle">
                                    <div class="icon-wrapper-bg bg-light"></div>
                                    <i class="lnr-apartment icon-gradient bg-malibu-beach"> </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-1 mb-1">
                    <div class="card  widget-chart widget-chart2 bg-focus text-left savingtypes shadow-lg">
                        <div class="widget-chart-content text-white">
                            <div class="widget-chart-flex">
                                <div class="widget-title">Save for Mortgage</div>
                            </div>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers text-warning">
                                    <h6>₦100,000,000</h6>
                                </div>
                                <div class="icon-wrapper border-light rounded-circle">
                                    <div class="icon-wrapper-bg bg-light"></div>
                                    <i class="lnr-briefcase icon-gradient bg-malibu-beach"> </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mt-1 mb-1">
                    <div class="card  widget-chart widget-chart2 bg-vicious-stance text-left savingtypes shadow-lg">
                        <div class="widget-chart-content text-white">
                            <div class="widget-chart-flex">
                                <div class="widget-title">Lock Savings</div>
                            </div>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers text-warning"><h6>₦100,000,000</h6></div>

                                <div class="icon-wrapper border-light rounded-circle">
                                    <div class="icon-wrapper-bg bg-light"></div>
                                    <i class="lnr-lock icon-gradient bg-malibu-beach"> </i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- <div class=" col-12 col-md-12"> -->
            <div class="row">
                <div class="col-12 col-md-7 mb-3">
                    <div class="main-card card shadow-lg">
                        <div class="card-header">To-Do List</div>
                        <ul class="todo-list-wrapper list-group list-group-flush">
                            <li class="list-group-item" style="cursor:pointer; color:black;" v-if="!user.email_verified_at"
                                @click="verifyEmail">
                                <div class="todo-indicator bg-warning"></div>
                                <div class="widget-content p-0 mb-2 mt-2">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                <input type="checkbox" id="exampleCustomCheckbox12" class="custom-control-input" disabled>
                                                    <h6> <strong>Verify your account</strong> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item" style="cursor:pointer; color:black;" v-if="!user.gender"
                                @click="$bvModal.show('edit-profile')">
                                <div class="todo-indicator bg-focus"></div>
                                <div class="widget-content p-0 mb-2 mt-2">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                <input type="checkbox" id="exampleCustomCheckbox12" class="custom-control-input" disabled>
                                                    <h6> <strong>Update profile</strong> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item" style="cursor:pointer; color:black;" @click="$bvModal.show('edit-image')"
                                v-if="user.image === 'no_image.png'" >
                                <div class="todo-indicator bg-success"></div>
                                <div class="widget-content p-0 mb-2 mt-2">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                <input type="checkbox" id="exampleCustomCheckbox12" class="custom-control-input" disabled>
                                                    <h6> <strong>Update profile picture</strong> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item" style="cursor:pointer; color:black;"
                                v-if="withdrawal_account == 0">
                                <div class="todo-indicator bg-primary"></div>
                                <div class="widget-content p-0 mb-2 mt-2">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                <input type="checkbox" id="exampleCustomCheckbox12" class="custom-control-input" disabled>
                                                    <h6> <strong>Add withdrawal account details</strong> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item" style="cursor:pointer; color:black;">
                                <div class="todo-indicator bg-alternate"></div>
                                <div class="widget-content p-0 mb-2 mt-2">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                <input type="checkbox" id="exampleCustomCheckbox12" class="custom-control-input" disabled>
                                                    <h6> <strong>Get Sterling account number</strong> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item" style="cursor:pointer; color:black;">
                                <div class="todo-indicator bg-danger"></div>
                                <div class="widget-content p-0 mb-2 mt-2">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                <input type="checkbox" id="exampleCustomCheckbox12" class="custom-control-input" disabled>
                                                    <h6> <strong>Fund Normal Savings Account</strong> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item" style="cursor:pointer; color:black;">
                                <div class="todo-indicator bg-focus"></div>
                                <div class="widget-content p-0 mb-2 mt-2">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                <input type="checkbox" id="exampleCustomCheckbox12" class="custom-control-input" disabled>
                                                    <h6> <strong>Fund Real Estate Account</strong> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item" style="cursor:pointer; color:black;">
                                <div class="todo-indicator bg-success"></div>
                                <div class="widget-content p-0 mb-2 mt-2">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                <input type="checkbox" id="exampleCustomCheckbox12" class="custom-control-input" disabled>
                                                    <h6> <strong>Fund Mortgage Account</strong> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item" style="cursor:pointer; color:black;">
                                <div class="todo-indicator bg-info"></div>
                                <div class="widget-content p-0 mb-2 mt-2">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-2">
                                            <div class="custom-checkbox custom-control">
                                                <label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">
                                                <input type="checkbox" id="exampleCustomCheckbox12" class="custom-control-input" disabled>
                                                <h6> <strong>Fund Lock Savings Account</strong> </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=" col-12 col-md-5 mb-3">
                    <div class="card main-card shadow-lg">
                        <div class="card-header">Recent Activities</div>
                        <div class="header-dots ml-2" v-if="activities.data != ''">
                            <div class="scroll-gradient">
                                <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column" >
                                    <div class="vertical-timeline-item vertical-timeline-element"  v-for="(activity,index) in activities.data" :key="index">
                                        <div><span class="vertical-timeline-element-icon bounce-in">
                                            <i class="badge badge-dot badge-dot-xl badge-success"
                                            :class="{'badge-primary': index % 3 === 0, 'badge-alternate': index % 2 !== 0 }"></i>
                                            </span>
                                            <div class="vertical-timeline-element-content bounce-in"><h6 class="timeline-title">
                                             {{activity.description}}</h6>
                                                <p> <span class="text-success"
                                                    :class="{'text-primary': index % 3 === 0, 'text-alternate': index % 2 !== 0 }"> {{activity.my_updated_at}}</span></p><span class="vertical-timeline-element-date"></span></div>
                                                <div v-if="activity.properties.length != 0">
                                                <!-- <button
                                                    type="button"
                                                    class="dropdown-item"
                                                    @click="setCurrent(activity); $bvModal.show('activityDetails')"
                                                >
                                                    <i class="pe-7s-info icon-gradient bg-happy-itmeo ml-3 mr-1"></i>
                                                    <span class="">View Details</span>
                                                </button> -->
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block text-center card-footer">
                            <button class=" btn-icon btn-hover-shine btn-shadow btn-dashed btn btn-outline-success btn-sm" @click="activityLog">View more</button>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <!-- Edit Profile modal  -->
        <b-modal id="edit-profile" size="lg" hide-footer title="Update Profile">
            <EditProfile :my_modal="this.$bvModal" :user="user"  @update-user="getUser"/>
        </b-modal>
        <!-- End Profile modal -->

        <!-- Edit image modal  -->
        <b-modal id="edit-image"  hide-footer title="Update profile picture" >
            <EditImage :my_modal="this.$bvModal" :user_id="user.id" @update-user="getUser" />
        </b-modal>
        <!-- End image modal -->
    </div>

</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import Main from "@/Layout/Wrappers/baseLayout";
import PageTitle from "@/Layout/Components/PageTitle";
import {library} from '@fortawesome/fontawesome-svg-core'
import {
    faArrowRight,
    faArrowLeft,
    faAngleUp,
    faDotCircle,
    faAngleDown,
} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

library.add(
    faArrowRight,
    faAngleUp,
    faArrowLeft,
    faDotCircle,
    faAngleDown,
);
import EditProfile from './Profile/editProfile'
import EditImage from './Profile/imageUpload'


export default {
  components: {
    'font-awesome-icon': FontAwesomeIcon,
    PageTitle,
    EditProfile,
    EditImage,
  },
  data () {
      return{
    heading: 'Hello ' + this.$page.props.fname[0],
    subheading: "Wash your hands and stay safe 😷",
    icon: "fa fa-home icon-gradient bg-tempting-azure",
    activities:[],
    loading:false,
    user:{},
    withdrawal_account:0,

  }},
  layout: (h, page) => h(Main, [page]),
  methods:{
    //get user
    getUser() {
        this.loading = true;
    axios
        .post(this.route("profile.get-user"))
        .then((res) => {
        this.user = res.data.user;
        this.firstname = this.user.name.split(' ');
        this.heading ='Hello ' + this.firstname[0];
        this.withdrawal_account = res.data.withdrawal_account;
        // this.cash = res.data.cash;
        this.loading = false;

        })
        .catch((err) => {
        //   swal("Error", "unable to get data", "error");
        // console.log("error");
        });
    },
      //function to get a user activity
    getActivity(url = false) {
      this.loading = true;
      let uri = url ? url : this.route("activity-log.single.get", this.$page.props.user.id);
      axios
        .get(uri)
        .then((res) => {
          this.activities = res.data;
            this.loading = false;

        })
        .catch((err) => {
          swal("Error", this.getMessage("fetchError", ['Activities']), "error");
          this.loading = false;
        })
        .finally(() => {
          // this.POSloading = false;
          this.loading = false;

        });
    },

    //get user activity
    activityLog(){
        let user_id = this.$page.props.user.id;
        Inertia.get('/activity-log/'+user_id)
    },
    //verify email
    verifyEmail(){
        this.loading= true;
        axios
        .post("/profile/verify-email")
        .then(res =>{
            this.loading= false;
            this.$inertia.visit("/email/verify");

        })
        .catch((err) => {
    // swal("Error", this.getMessage("fetchError", ["Staff"]), "error");
        })

    },
  },

  mounted:function(){
    this.getActivity();
    this.getUser();

  },
};
</script>

<style scoped>
.widget-subheading{
    color:white !important;
}
.savingtypes{
    border-radius: 1.25rem 1.25rem 1.25rem 0% !important;
    cursor: pointer;
}

</style>
