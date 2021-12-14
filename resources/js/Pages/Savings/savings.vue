<template>
    <div class=" mt-5 mb-3">
        <div class="flex flex-col lg:flex-row mb-5" style="margin: 0px -0.5rem; width: calc(100% + 1rem); ">
            <div class="row">
                <div class="col-md-8 mb-3 ">
                    <div class="flex flex-shrink-0 items-center rounded-t rounded-br border p-4 flex-1 card shadow-lg">
                        <div class="flex flex-col mr-2 w-full">
                            <h3 class="font-body text-xs text-gray-700 whitespace-pre-wrap">Total Balance</h3>
                            <h3 class="font-body text-xs text-4xl font-display font-bold text-primary whitespace-pre-wrap">₦1,205,748.21</h3>
                        </div>
                        <div class="flex flex-col flex-1 self-start"></div>
                    </div>
                </div>
                <div class="flex justify-between items-center mb-2 ml-3 ">
                        <a href="#">
                            <img src="/images/savings.jpg"
                                alt="Welcome to Save2Invest" class="rounded shadow-lg" style=" width: 350px; height: 115px;">
                        </a>
                </div>

            </div>
        </div>

        <div class=" mt-5 mb-3">
            <div class="row">
                    <div class="col-md-3">
                        <div class="card mb-3 bg-happy-green widget-chart text-white card-border savingtypes shadow-lg" @click="normalSavings">
                            <div class="icon-wrapper rounded-circle mb-1 ">
                                <div class="icon-wrapper-bg bg-white opacity-2 "></div>
                                <i class="lnr-diamond text-white"></i></div>
                            <div class="widget-heading" style="font-size:15px; font-weight:bold;">NORMAL SAVINGS</div>
                            <p>This is your normal savings account. 10% pa</p>
                            <div class="widget-numbers" style="font-size:17px; font-weight:bold;">₦40,000,000</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-3 bg-warm-flame widget-chart text-white card-border savingtypes shadow-lg" @click="realEstateSavings">
                            <div class="icon-wrapper rounded-circle mb-1 ">
                                <div class="icon-wrapper-bg bg-white opacity-2 "></div>
                                <i class="lnr-apartment text-white"></i></div>
                            <div class="widget-heading" style="font-size:15px; font-weight:bold;">Save for Real Estate</div>
                            <p>This is your savings for Real Estate account. 22% pa</p>
                            <div class="widget-numbers" style="font-size:17px; font-weight:bold;">₦40,000,000</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-3 bg-ripe-malin widget-chart text-white card-border savingtypes shadow-lg" @click="mortgageSavings">
                            <div class="icon-wrapper rounded-circle mb-1 ">
                                <div class="icon-wrapper-bg bg-white opacity-2 "></div>
                                <i class="lnr-briefcase text-white"></i></div>
                            <div class="widget-heading" style="font-size:15px; font-weight:bold;">Save for Mortgage</div>
                            <p>This is your savings for Mortgage account. 35% pa</p>
                            <div class="widget-numbers" style="font-size:17px; font-weight:bold;">₦40,000,000</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mb-3 bg-mixed-hopes widget-chart text-white card-border savingtypes shadow-lg" @click="lockSavings">
                            <div class="icon-wrapper rounded-circle mb-1 ">
                                <div class="icon-wrapper-bg bg-white opacity-2 "></div>
                                <i class="lnr-lock text-white"></i></div>
                            <div class="widget-heading" style="font-size:15px; font-weight:bold;">Lock Savings</div>
                            <p>This is your Lock Savings account. 40% pa</p>
                            <div class="widget-numbers" style="font-size:17px; font-weight:bold;">₦40,000,000</div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import {library} from '@fortawesome/fontawesome-svg-core'
    import {
        faArrowRight,
        faArrowLeft,
        faAngleUp,
        faEllipsisH,
        faAngleDown,
    } from '@fortawesome/free-solid-svg-icons'
    import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

    library.add(
        faArrowRight,
        faAngleUp,
        faArrowLeft,
        faEllipsisH,
        faAngleDown,
    );
export default {
components: {
    'font-awesome-icon': FontAwesomeIcon,

},
methods:{
    //go-to normal savings
    normalSavings(){
        Inertia.get('/savings/normal')
    },
    //go-to realEstate savings
    realEstateSavings(){
        Inertia.get('/savings/real-estate')
    },
    //go-to mortgage savings
    mortgageSavings(){
        Inertia.get('/savings/mortgage')
    },
    //go-to lock savings
    lockSavings(){
        Inertia.get('/savings/lock')
    },
},
}
</script>

<style scoped>
.savingtypes{
    border-radius: 1.25rem 1.25rem 1.25rem 0% !important;
    cursor: pointer;
}
.border {
    border: 1px solid #3d77b1 !important;
}
</style>
