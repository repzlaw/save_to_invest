<template>
    <div>
        <div class="row mt-5 mb-3">
            <div class="col-md-8">
                <section class="mb-3 flex flex-shrink-0 items-center rounded-t rounded-br border flex-1 card shadow-md savingtypes">
                    <header class="flex justify-between items-center pt-4 px-3 md:px-4">
                        <strong class="uppercase font-display text-xss font-semibold text-gray-800">MY BALANCE</strong>
                    </header>
                    <div class="flex flex-col md:flex-row justify-between mt-2 mx-3 mb-3">
                        <strong class="text-4xl font-display font-bold mb-4 md:mb-0" style="color: rgb(13, 96, 216); font-size:24px"> ₦30,100.00</strong>
                        <a class="block disabled:opacity-75 disabled:cursor-not-allowed text-center whitespace-no-wrap rounded-t rounded-br flex flex-col md:flex-row items-center justify-center pt-3 py-2 px-8 font-display text-xs md:text-sm uppercase bg-primary-450 font-bold text-white hover:bg-primary-500" href="">+ Quick Save</a>
                    </div>
                    <div class="flex justify-center px-3 text-center">
                        <div class="row">
                            <a class="flex flex-shrink-0 items-center rounded-t rounded-br border p-4 flex-1" bgcolor="#CEE2FF" alert="1" image="" href="" style="border-color: rgb(226, 232, 240);">
                                <i class="fa fa-plus mb-1 mr-2" style="font-size: 16px; color: rgb(13, 96, 216);"></i>Fund Account
                            </a>
                            <a class="flex flex-shrink-0 items-center rounded-t rounded-br border p-4 flex-1" bgcolor="#CEE2FF" image="" href="" style="border-color: rgb(226, 232, 240);">
                                <i class="fa fa-bank mb-1 mr-2" style="font-size: 16px; color: rgb(13, 96, 216);"></i>Withdraw
                            </a>
                            <a class="flex flex-shrink-0 items-center rounded-t rounded-br border p-4 flex-1" bgcolor="#CEE2FF" image="" href=""
                                style="border-color: rgb(226, 232, 240); border-radius: 0% 0% 1.25rem 0% !important;">
                                <i class="fa fa-cog mb-1 mr-2" style="font-size: 16px; color: rgb(13, 96, 216);"></i>Settings
                            </a>

                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-4">
                <div class="flex flex-shrink-0 items-center rounded-t rounded-br border flex-1 card shadow-md savingtypes">
                        <header class="flex justify-between items-center pt-4 px-3 md:px-4">
                            <strong class="uppercase font-display text-xss font-semibold text-gray-800">INTEREST RATE</strong>
                        </header>
                        <div class="flex flex-col md:flex-row justify-between mt-2 mx-3 mb-3">
                            <strong class="text-4xl font-display font-bold mb-4 md:mb-0" style="color: rgb(13, 96, 216); font-size:24px"> 22%</strong>
                            <a class="block disabled:opacity-75 disabled:cursor-not-allowed text-center whitespace-no-wrap rounded-t rounded-br flex flex-col md:flex-row items-center justify-center pt-3 py-2 px-8 font-display text-xs md:text-sm uppercase bg-primary-450 font-bold text-white hover:bg-primary-500" href="">+ Quick Save</a>
                        <p>Per Annum</p>
                        </div>
                </div>
            </div>

        </div>

        <!-- <div class="col-md-8 mb-5"> -->
            <section class="mb-8 md:mb-12 border rounded-t rounded-br relative card shadow-md col-md-8 mb-5 savingtypes">
                <header class="flex justify-between items-center mb-2 pt-4 px-3 md:px-4">
                    <strong class="uppercase font-display text-xss font-semibold text-gray-800">Transactions</strong>
                </header>
                <main>
                    <div class="">
                        <div class="mx-4 overflow-x-auto">

                        </div>
                        <div class="infinite-scroll-component__outerdiv">
                            <div class="infinite-scroll-component" style="height: auto; overflow: auto;">
                                <ul class="mb-4 flex flex-col">
                                    <li class="mx-4 flex items-start py-4">
                                        <span class="w-4 h-4 rounded mt-2 flex-shrink-0 bg-red-600"></span>
                                        <span class="font-body text-gray-800 px-4 flex flex-col flex-1">
                                            <span class="text-xs">Funds locked away using SafeLock™.</span>
                                            <span class="text-xs text-gray-600">Tue, 19 Oct 2021 16:17:14 GMT</span></span><span class="font-body text-gray-800 flex flex-col">
                                            <span class="text-sm">₦100,000.00</span></span></li><li class="mx-4 flex items-start py-4">
                                            <span class="w-4 h-4 rounded mt-2 flex-shrink-0 bg-green-600"></span>
                                            <span class="font-body text-gray-800 px-4 flex flex-col flex-1">
                                            <span class="text-xs">Top up for SafeLock™</span>
                                            <span class="text-xs text-gray-600">Tue, 19 Oct 2021 16:17:13 GMT</span>
                                        </span>
                                    </li>
                                    <li class="mx-4 flex items-start py-4">
                                        <span class="w-4 h-4 rounded mt-2 flex-shrink-0 bg-green-600"></span>
                                        <span class="font-body text-gray-800 px-4 flex flex-col flex-1">
                                            <span class="text-xs">Monthly Savings Deposit.</span>
                                            <span class="text-xs text-gray-600">Tue, 19 Oct 2021 16:12:04 GMT</span>
                                        </span>
                                        <span class="font-body text-gray-800 flex flex-col">
                                            <span class="text-sm">₦30,000.00</span>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-block text-center card-footer">
                            <button class=" btn-icon btn-hover-shine btn-shadow btn-dashed btn btn-outline-success btn-sm" >View more</button>
                        </div>
                    </div>
                </main>
            </section>
        <!-- </div> -->

    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.border {
    border: 1px solid #d8dde2 !important;
}
.savingtypes{
    border-radius: 1.25rem 1.25rem 1.25rem 0% !important;
    cursor: pointer;
}
</style>
