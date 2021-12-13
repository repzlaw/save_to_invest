<template>
    <div :class="sidebarbg" class="app-sidebar sidebar-shadow" @mouseover="toggleSidebarHover('add','closed-sidebar-open')" @mouseleave="toggleSidebarHover('remove','closed-sidebar-open')">
        <div class="app-header__logo">
            <div class="logo-src"/>
            <div class="header__pane ml-auto">
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" v-bind:class="{ 'is-active' : isOpen }" @click="toggleBodyClass('closed-sidebar')">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-sidebar-content">
            <VuePerfectScrollbar class="app-sidebar-scroll" v-once>
                <sidebar-menu showOneChild :menu="menu"/>
            </VuePerfectScrollbar>
        </div>

    </div>
</template>

<script>
    import {SidebarMenu} from 'vue-sidebar-menu'
    import VuePerfectScrollbar from 'vue-perfect-scrollbar'

    export default {
        components: {
            SidebarMenu,
            VuePerfectScrollbar
        },
        data() {
            return {
                isOpen: false,
                sidebarActive: false,

                menu: [
                    {
                        header: true,
                        title: 'Menu',
                    },
                    {
                        title: 'Home',
                        icon: 'fa fa-home text-white',
                        href: '/',
                    },
                    {
                        title: 'Savings',
                        icon: 'fa fa-bullseye text-white',
                        href: '/savings',
                    },
                    {
                        title: 'Properties',
                        icon: 'fa fa-university text-white',
                        href: '/profile',
                    },
                    {
                        title: 'Account',
                        icon: 'fa fa-user text-white',
                        href: '/profile',
                    },
                    // {
                    //     title: 'Pages',
                    //     icon: 'pe-7s-browser',
                    //     child: [
                    //         {
                    //             href: '/pages/login',
                    //             title: 'Login',
                    //         },
                    //         {
                    //             href: '/pages/forgot-password-boxed',
                    //             title: 'Forgot Password Boxed',
                    //         },
                    //     ]
                    // },
                    // {
                    //     title: 'Applications',
                    //     icon: 'pe-7s-plugin',
                    //     child: [
                    //         {
                    //             href: '/apps/mailbox',
                    //             title: 'Mailbox',
                    //         },
                    //         {
                    //             href: '/apps/chat',
                    //             title: 'Chat',
                    //         },
                    //         {
                    //             title: 'Forums Section',
                    //             child: [
                    //                 {
                    //                     href: '/apps/forums-listing',
                    //                     title: 'Listing',
                    //                 },
                    //                 {
                    //                     href: '/apps/forums-threads',
                    //                     title: 'Threads',
                    //                 },
                    //                 {
                    //                     href: '/apps/forums-discussion',
                    //                     title: 'Discussions',
                    //                 },
                    //             ]
                    //         },
                    //     ]
                    // },
                ],
                collapsed: true,

                windowWidth: 0,

            }
        },
        props: {
            sidebarbg: String,

        },
        methods: {

            toggleBodyClass(className) {
                const el = document.body;
                this.isOpen = !this.isOpen;

                if (this.isOpen) {
                    el.classList.add(className);
                } else {
                    el.classList.remove(className);
                }
            },
            toggleSidebarHover(add, className) {
                const el = document.body;
                this.sidebarActive = !this.sidebarActive;

                this.windowWidth = document.documentElement.clientWidth;

                if (this.windowWidth > '992') {
                    if (add === 'add') {
                        el.classList.add(className);
                    } else {
                        el.classList.remove(className);
                    }
                }
            },
            getWindowWidth() {
                const el = document.body;

                this.windowWidth = document.documentElement.clientWidth;

                if (this.windowWidth < '1350') {
                    el.classList.add('closed-sidebar', 'closed-sidebar-md');
                } else {
                    el.classList.remove('closed-sidebar', 'closed-sidebar-md');
                }
            },
        },
        mounted() {
            this.$nextTick(function () {
                window.addEventListener('resize', this.getWindowWidth);

                //Init
                this.getWindowWidth()
            })
        },

        beforeDestroy() {
            window.removeEventListener('resize', this.getWindowWidth);
        }
    }
</script>

<style >
.app-theme-white .app-sidebar .app-sidebar-content {
    background-color: #062863 !important;
}

.v-sidebar-menu .vsm-link {
    color:white !important;
    margin-bottom:15px !important;

}

.v-sidebar-menu .vsm-header {
    color:white !important;
}

.app-theme-white .app-sidebar .app-header__logo {
    background-color: #0e377d !important;
}

.hamburger .hamburger-inner {
    color:white !important;

}
.v-sidebar-menu .vsm-item.active-item > .vsm-link {
    background-color: #a69a9a !important;
}

.v-sidebar-menu .vsm-title {
    font-size:14px !important;
}

.vsm-link:hover{
    background-color:#a69a9a  !important;
    /* color: white!important; */

}

</style>
