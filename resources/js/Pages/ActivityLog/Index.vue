<template>
  <transition name="fade" mode="out-in" v-if="userHasPermission('setup.activitylog')">
    <div>
      <page-title :heading="heading" :subheading="subheading" :icon="icon"></page-title>
      <div class="card-hover-shadow-2x mb-3 card">
        <div class="card-header-tab card-header">
          <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
            <i class="header-icon lnr-list icon-gradient bg-amy-crisp"></i>
            Activity Log
          </div>
        </div>
        <div class="card-body">
          <div class="row mb-3">
                <div class="col-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">User</span>
                        </div>
                        <div>
                          <input autocomplete="off" type="text" v-model="query" @keyup="searchUser"  
                          class="form-control input-circle-right" placeholder="Search for User..." >
                          <div class="panel-footer bg-light" v-if="users.length" style="position:absolute; z-index:1000;">
                            <ul class="list-group">
                              <li v-for="user in users" :key="user.id" class="list-group-item" id="hover" @click="setCurrUser(user.id)">
                                  {{ '  '+ '  '+ user.fullname + '  '+ ' - '+'  ' + '('+ user.user_id + ')' }}
                              </li>
                            </ul>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            <table class="table table-sm table-striped table-bordered table-hover table-responsive-sm">
                <thead>
                  <th>#</th>
                  <th>Activity</th>
                  <th>Time</th>
                  <th width="5%">Action </th>
                </thead>
                <tbody>
                  <VueElementLoading :active="loading" spinner="line-scale" color="var(--primary)" />
                   <tr v-for="(activity,index) in activities.data" :key="index">
                        <td>{{index + 1}}</td>
                        <td><span class="text-success"  >
                          <inertia-link style="width: 100% !important" :id="'user'+index"
                                  :href="$route('app.profile',{id: activity.causer_id})" class="profile"
                                >{{activity.fullname}}</inertia-link>
                                <!-- tool tip -->
                                <b-popover
                                    :target="'user'+index"
                                    :placement="'right'"
                                    title="Click to go to User's Profile"
                                    triggers="hover focus"
                                  ></b-popover>
                          </span> {{activity.description}} </td>
                        <td><span class="text-success"> {{activity.my_updated_at}}</span></td>
                        <td>
                            <div class="btn-actions-pane-right text-capitalize actions-icon-btn" v-if="userHasPermission('setup.activitylog.details')">
                            <b-dropdown toggle-class="btn-icon btn-icon-only" variant="link" right>
                                <span slot="button-content">
                                <font-awesome-icon icon="th" />
                                </span>
                                <div v-if="activity.properties.length != 0">
                                <button
                                    type="button"
                                    tabindex="0"
                                    class="dropdown-item"
                                    @click="setCurrent(activity); $bvModal.show('activityDetails')"
                                    
                                >
                                    <i class="pe-7s-note icon-gradient bg-happy-itmeo mr-2"></i>
                                    <span>View Details</span>
                                </button>
                                </div>
                            </b-dropdown>
                            </div>
                        </td> 
                  </tr>                     
                </tbody>
            </table>            
        </div>
        <div v-if="activities.data == ''" class="alert alert-info text-center">
          <h5>No User Activity Logged</h5>
        </div>
        <div v-if="activities.data != ''" class="card-footer">
          <pagination :links="activities.links" v-on:fetchDataFrom="getNextPage($event)"></pagination>
        </div>
      </div>
      <!-- View Activity Details  -->
    <b-modal id="activityDetails" hide-footer title="Activity Details">
      <activityDetails :activity="current_activity" :my_modal="this.$bvModal" />
    </b-modal>
    </div>
  </transition>
</template>

<script>
import Main from "@/Layout/Wrappers/baseLayout";
import PageTitle from "@/Layout/Components/PageTitle";
import VuePerfectScrollbar from "vue-perfect-scrollbar";
import VueElementLoading from "vue-element-loading";
import Slick from "vue-slick";
import Spinner from "vue-spinkit";
import Trend from "vuetrend";
// import Pagination from "@/AppLayouts/Components/Pagination.vue";
import activityDetails from "./ActivityDetails";
import { library } from "@fortawesome/fontawesome-svg-core";
import {
  faTrashAlt,
  faCheck,
  faCalendarAlt,
  faAngleDown,
  faAngleUp,
  faTh,
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(faTrashAlt, faCheck, faAngleDown, faAngleUp, faTh, faCalendarAlt);

export default {
  props: {
  },
  components: {
    PageTitle,
    VuePerfectScrollbar,
    VueElementLoading,
    Slick,
    "font-awesome-icon": FontAwesomeIcon,
    trend: Trend,
    Spinner,
    // Pagination,
    activityDetails,
  },
  layout: (h, page) => h(Main, [page]),
  data () {
    return {
    heading: "Activity Log",
    subheading:"Manage the activities of the users in the application.",
    icon: "pe-7s-plane icon-gradient bg-tempting-azure",
    activities:[],
    current_activity:"",
    query:'',                       //  variable to hold text from search field
    users:{},                    //  variable to hold all users from the DB
    loading:false,
    selectedUser:"",
    slickOptions2: {
      slidesToShow: 1,
      dots: true,
    },

  }},

  methods: {
    //set current activity
    setCurrent(activity) {
      this.current_activity = activity;
    },
    //function to get all activities
    getAllActivities(url = false) {  
      this.loading = true;
      let uri = url ? url : this.$route("activitylog.get");
      axios
        .get(uri)
        .then((res) => {
          this.activities = res.data;
          this.activities.data.forEach(activity=>{
            if(activity.mname == null){
              Object.assign(activity,{fullname: activity.lname + '   ' + activity.fname})
            }else{
              Object.assign(activity,{fullname: activity.lname + ' ' + activity.fname + '  ' + activity.mname })
            }
            this.loading = false;
          }) 
              
        })
        .catch((err) => {
          swal("Error", this.getMessage("fetchError", ['Activities']), "error");
        })
        .finally(() => {
          // this.POSloading = false;
        });
    },
    getNextPage(k) {
      this.getAllActivities(k);
    },
    // function to search user (returns 5 at a time)
        searchUser(filters = null, url = false){
            // this.loading = true;
            let uri = url ? url : this.$route("activity.search_user");
            axios
                .post(uri, { filters: this.query })
                .then((res) => {
                    this.users = res.data;
                    // this.loading = false;
                    this.users.forEach(user => {
                        if(user.mname == null){
                            Object.assign(user, { fullname: user.lname + '  ' + user.fname   });
                        }     else{
                            Object.assign(user, { fullname: user.lname + '  ' + user.fname + '  ' + user.mname   });
                        }             
                    });       
                })
                .catch((err) => {
                    toastr['error'](this.getMessage("fetchError", ['User']), "error");
                })
                this.users = [];
        },
        // function to query DB based on the user selected
        setCurrUser(data){
            if(data !== 0) {
                this.loading = true;
              let uri = this.$route("activitylog.getSingleUser",data);
                axios
                  .get(uri)
                  .then((res) => {
                    this.activities = res.data;
                    this.loading = false;
                    this.activities.data.forEach(activity=>{
                      if(activity.mname == null){
                        Object.assign(activity,{fullname: activity.lname + '   ' + activity.fname})
                      }else{
                        Object.assign(activity,{fullname: activity.lname + ' ' + activity.fname + '  ' + activity.mname })
                      }
                    });
                    this.query = '';
                    this.users = '';
                        
                  })
                  .catch((err) => {
                    swal("Error", this.getMessage("fetchError", ['Activities']), "error");
                  })
                  .finally(() => {
                    // this.POSloading = false;
                  });
                
            } else {
              console.log("error");
            }
        },

  },
  mounted:function(){
    this.getAllActivities();
  },
};
</script>
<style scoped>
</style>
