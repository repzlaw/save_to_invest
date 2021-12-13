<template>
    <div>
        <div class="row mt-4 container">
            <VueElementLoading :active="loading" spinner="line-wave" color="var(--primary)"/>
            <div class="col-md-6 col-lg-5 col-xl-5">
                <div class="card-shadow-primary profile-responsive card-border mb-3 card shadow-lg">
                    <div class="dropdown-menu-header">
                        <div class="dropdown-menu-header-inner bg-info">
                            <div class="menu-header-image" style="background-image: url('assets/images/dropdown-header/abstract1.jpg')"></div>
                            <div class="menu-header-content btn-pane-right">
                                <div class="avatar-icon-wrapper mr-2 avatar-icon-xl" @click="$bvModal.show('edit-image')">
                                    <div class="avatar-icon btn-hover-shine mr-3 profile-pic" style="cursor:pointer; ">
                                        <img v-if="user"
                                        :src="'storage/images/profile_pic/' + user.image"
                                        alt="pic">
                                        <div class="pic-edit"><i class="lnr-camera btn-icon-wrapper text-light" ></i></div>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="menu-header-title">{{user.name}} </h5>
                                    <h6 class="menu-header-subtitle">{{user.email}}</h6>
                                    <h6 class="menu-header-subtitle">{{user.phone}}</h6>
                                </div>
                                <!-- <div class="menu-header-btn-pane">
                                    <button class="btn-icon mr-2 btn-icon-only btn btn-warning btn-sm"><i class="pe-7s-config btn-icon-wrapper"> </i></button>
                                    <button class="btn-icon btn btn-success btn-sm">View Profile</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item btn-transition btn btn-outline-link"
                            v-if="!user.email_verified_at" style="cursor:pointer"
                            @click="verifyEmail"
                        >
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left ">
                                        <div class="icon-wrapper m-0">
                                            <div class="progress-circle-wrapper">
                                                <i class="lnr-user btn-icon-wrapper" ></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Verify your account

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr>

                        <li class="list-group-item btn-transition btn btn-outline-link" style="cursor:pointer"
                            @click="$bvModal.show('edit-profile')"
                        >
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left ">
                                        <div class="icon-wrapper m-0">
                                            <div class="progress-circle-wrapper">
                                                <i class="lnr-pencil btn-icon-wrapper" ></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Update Profile </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr>

                            <li class="list-group-item btn-transition btn btn-outline-link" style="cursor:pointer" @click="activityLog">
                        <!-- <inertia-link :href="'/activity-log/' + $page.props.user.id"
                            class="list-group-item btn-transition btn btn-outline-link hover:text-primary" style="cursor:pointer; color:black;"
                            active-link="text-primary"> -->
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="icon-wrapper m-0">
                                            <div class="progress-circle-wrapper">
                                                <i class="lnr-thumbs-up btn-icon-wrapper"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading">See your recent activities </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </inertia-link> -->
                            </li>

                        <hr>

                        <li class="list-group-item btn-transition btn btn-outline-link" @click="$bvModal.show('edit-bank')"
                            style="cursor:pointer">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left ">
                                        <div class="icon-wrapper m-0">
                                            <div class="progress-circle-wrapper">
                                                <i class="lnr lnr-apartment btn-icon-wrapper" ></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Edit withdrawal bank details </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr>

                        <li class="list-group-item btn-transition btn btn-outline-link" style="cursor:pointer" v-b-toggle="'collapse-2'" >
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left ">
                                        <div class="icon-wrapper m-0">
                                            <div class="progress-circle-wrapper">
                                                <i class="lnr-phone btn-icon-wrapper" ></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Contact us</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Element to collapse -->
                            <b-collapse id="collapse-2">
                                <b-card>
                                    <div>
                                        <p><strong><span class="mr-1 lnr lnr-phone-handset"></span> +234 813 759 6257</strong></p>
                                        <p><strong><span class="mr-1 lnr lnr-envelope"></span> save2invest@lifecard.com</strong></p>
                                        <p><strong><span class="lnr lnr-map-marker"></span> No. 2 Femi Okunnu Rd osapa London Jakunde, lagos Island, Lagos</strong></p>

                                    </div>
                                </b-card>
                            </b-collapse>
                        </li>
                        <hr>

                    </ul>
                    <div class="text-center d-block card-footer">
                        <inertia-link
                            :href="route('logout')"
                            method="post"
                            class="btn-icon btn-shadow btn-dashed btn btn-outline-danger btn-sm"
                            as="button"
                            type="button"
                            >
                            <i class="lnr-exit r-2"></i>
                            Log out
                        </inertia-link>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-shadow-primary profile-responsive card-border mb-3 card shadow-lg">

                    <ul class="list-group list-group-flush">

                        <li class="p-0 list-group-item">
                            <div class="grid-menu grid-menu-2col overflow-hidden">
                                <div class="no-gutters row">
                                    <div class="col-sm-6">
                                        <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                            <i class="lnr-apartment btn-icon-wrapper btn-icon-lg mb-3"> </i>
                                            <h6> <strong>3455676898</strong>  </h6>
                                            <small>
                                            Account number by Sterling

                                            </small>
                                        </button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                            <i class="fa fa-money btn-icon-wrapper btn-icon-lg mb-3"> </i>
                                            <h6> <strong v-if="user"> {{Number(cash).toLocaleString() }}</strong>  </h6>
                                            <small>
                                            E Cash
                                            </small>
                                        </button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                            <i class="lnr-chart-bars btn-icon-wrapper btn-icon-lg mb-3"> </i>
                                            <h6> <strong>{{stat.score}}</strong>  </h6>
                                            <small>
                                            Credit Score
                                            </small>
                                        </button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                            <i class="fa fa-share-alt btn-icon-wrapper btn-icon-lg mb-3"> </i>
                                            <h6> <strong>{{stat.refer}}</strong>  </h6>
                                            <small>
                                            My Referrals
                                            </small>
                                        </button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                            <i class="lnr-camera-video btn-icon-wrapper btn-icon-lg mb-3"> </i>
                                            <h6> <strong>{{stat.courses}}</strong>  </h6>
                                            <small>
                                            My Courses
                                            </small>
                                        </button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link">
                                            <i class="lnr-map btn-icon-wrapper btn-icon-lg mb-3"> </i>
                                            <h6> <strong>{{stat.train}}</strong>  </h6>
                                            <small>
                                            My Training
                                            </small>
                                        </button>
                                    </div>
                                    <!-- <div class="col-sm-6">
                                        <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link"><i class="lnr-music-note btn-icon-wrapper btn-icon-lg mb-3"> </i>Credit Score</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="btn-icon-vertical btn-square btn-transition btn btn-outline-link"><i class="lnr-heart btn-icon-wrapper btn-icon-lg mb-3"> </i>My Courses</button>
                                    </div> -->
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Edit Profile modal  -->
        <b-modal id="edit-profile" size="lg" hide-footer title="Update Profile">
            <EditProfile :my_modal="this.$bvModal" :user="user"  @update-user="getUser"/>
        </b-modal>
        <!-- End Profile modal -->

        <!-- Edit bank modal  -->
        <b-modal id="edit-bank"  hide-footer title="Update withdrawal bank details">
            <EditBank :my_modal="this.$bvModal" :user="user" />
        </b-modal>
        <!-- End bank modal -->

        <!-- Edit image modal  -->
        <b-modal id="edit-image"  hide-footer title="Update profile picture" >
            <EditImage :my_modal="this.$bvModal" :user_id="user.id" @update-user="getUser" />
        </b-modal>
        <!-- End image modal -->
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import VuePerfectScrollbar from 'vue-perfect-scrollbar'
import VueCircle from 'vue2-circle-progress'
import EditProfile from './editProfile'
import EditBank from './editBankDetails'
import EditImage from './imageUpload'

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

export default {
    components: {
        'font-awesome-icon': FontAwesomeIcon,
        VuePerfectScrollbar,
        VueCircle,
        EditProfile,
        EditBank,
        EditImage,
    },
    props: {
        // user: Object,
    },
    data() {
        return{
        icon: 'pe-7s-science icon-gradient bg-happy-itmeo',
        loading:false,
        user:{},
        stat:{},
        cash:0,
    }},

    methods: {
        //get user
        getUser() {
            this.loading = true;
        axios
            .post(this.route("profile.get-user"))
            .then((res) => {
            this.user = res.data.user;
            this.stat = res.data;
            this.cash = res.data.cash;
            this.loading = false;

            })
            .catch((err) => {
            //   swal("Error", "unable to get data", "error");
            // console.log("error");
            });
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

        //get user activity
        activityLog(){
            let user_id = this.user.id;
            Inertia.get('/activity-log/'+user_id)
        },
    },
    mounted(){
        this.getUser();
    }
}

</script>
<style scoped>
li {
color: black;
}
hr {
margin-top: 0em !important;
margin-bottom: 0em !important;
border-width: 1px;
}

.profile-pic {
position: relative;
display: inline-block;
}

.profile-pic:hover .pic-edit {
display: block;
}

.pic-edit {
padding-top: 7px;
padding-right: 7px;
position: absolute;
right: 0;
bottom: 0;
font-size: 1.99em;
display: none;
}


</style>
