<template>
  <transition name="fade" mode="out-in">
    <div>
      <page-title :heading="heading" :subheading="subheading" :icon="icon"></page-title>
      <div class="card-hover-shadow-2x mb-3 card">
        <div class="card-header-tab card-header">
          <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
            <i class="header-icon lnr-list icon-gradient bg-amy-crisp"></i>
            My Activity
          </div>
          <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
            <button type="submit" class="btn btn-focus"
                @click="back"><span class="lnr lnr-arrow-left"></span> Back
            </button>
          </div>
        </div>
        <div class="card-body">
          <VueElementLoading :active="loading" spinner="line-wave" color="var(--primary)" />
          <div class="header-dots ml-5" v-if="activities.data != ''">
            <div class="scroll-gradient">
                <!-- <div class="scroll-area-lg"> -->
                    <!-- <VuePerfectScrollbar class="scrollbar-container"> -->
                        <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column" >
                            <div class="vertical-timeline-item vertical-timeline-element"  v-for="(activity,index) in activities.data" :key="index">
                                <div><span class="vertical-timeline-element-icon bounce-in">
                                    <i class="badge badge-dot badge-dot-xl badge-success" :class="{'badge-success': index % 3 === 0, 'badge-alternate': index % 2 !== 0 }"></i>
                                    </span>
                                    <div class="vertical-timeline-element-content bounce-in"><h6 class="timeline-title">
                                      <span class="text-success"  >
                                        <!-- <inertia-link style="width: 100% !important" :id="'user'+index"
                                                :href="$route('app.profile',{id: activity.causer_id})" class="profile"
                                              >{{activity.name}}</inertia-link> -->
                                              <!-- tool tip -->
                                              <!-- <b-popover
                                                  :target="'user'+index"
                                                  :placement="'right'"
                                                  title="Click to go to User's Profile"
                                                  triggers="hover focus"
                                                ></b-popover> -->
                                        </span> {{activity.description}}</h6>
                                        <p> <span class="text-success"
                                                :class="{'text-primary': index % 3 === 0, 'text-alternate': index % 2 !== 0 }"> {{activity.my_updated_at}}</span></p><span class="vertical-timeline-element-date"></span></div>
                                        <div v-if="activity.properties.length != 0">
                                          <button
                                              type="button"
                                              class="dropdown-item"
                                              @click="setCurrent(activity); $bvModal.show('activityDetails')"
                                          >
                                              <i class="pe-7s-info icon-gradient bg-happy-itmeo ml-3 mr-1"></i>
                                              <span class="">View Details</span>
                                          </button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    <!-- </VuePerfectScrollbar> -->
                <!-- </div> -->
            </div>
          </div>
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
import Pagination from "@/Layout/Components/Pagination.vue";
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
    user_id:String,
    username:String,
  },
  components: {
    PageTitle,
    VuePerfectScrollbar,
    VueElementLoading,
    Slick,
    "font-awesome-icon": FontAwesomeIcon,
    trend: Trend,
    Spinner,
    Pagination,
    activityDetails,
  },
  layout: (h, page) => h(Main, [page]),
  data () {
    return {
    heading: "Activity Log",
    subheading: "view my activities.",
    icon: "header-icon lnr-list icon-gradient bg-amy-crisp",
    activities:[],
    current_activity:"",
    loading:false,
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
    //function to get a user activity
    getActivity(url = false) {
      this.loading = true;
      let uri = url ? url : this.route("activity-log.single.get", this.user_id);
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
    getNextPage(k) {
      this.getActivity(k);
    },
    back(){
        window.history.go(-1); return false;
    },
  },
  mounted:function(){
    this.getActivity();
  },
};
</script>
<style scoped>
</style>
