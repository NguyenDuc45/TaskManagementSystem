<template>
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper m-0">
                <div class="header-logo-wrapper p-0">
                    <div class="logo-wrapper">
                        <a href="index.html">
                            <img class="img-fluid main-logo" src="@assets/images/logo/1.png" alt="logo">
                            <img class="img-fluid white-logo" src="@assets/images/logo/1-white.png" alt="logo">
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                        <a href="index.html">
                            <img src="@assets/images/logo/1.png" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="nav-right col-6 pull-right right-header p-0">
                    <ul class="nav-menus">
                        <li>
                            <span class="header-search">
                                <i class="ri-search-line"></i>
                            </span>
                        </li>
                        <li v-if="loggedIn" class="onhover-dropdown">
                            <div class="notification-box">
                                <i class="ri-notification-line"></i>
                                <span class="badge rounded-pill badge-theme">4</span>
                            </div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>
                                    <i class="ri-notification-line"></i>
                                    <h6 class="f-18 mb-0">Notitications</h6>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-primary"></i>Delivery processing <span
                                            class="pull-right">10 min.</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-success"></i>Order Complete<span
                                            class="pull-right">1 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-info"></i>Tickets Generated<span
                                            class="pull-right">3 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-circle me-2 font-danger"></i>Delivery Complete<span
                                            class="pull-right">6 hr</span>
                                    </p>
                                </li>
                                <li>
                                    <a class="btn btn-primary" href="javascript:void(0)">Check all notification</a>
                                </li>
                            </ul>
                        </li>

                        <li v-if="loggedIn" class="profile-nav onhover-dropdown pe-0 me-0">
                            <div class="media profile-media">
                                <img class="user-profile rounded-circle" src="@assets/images/users/4.jpg" alt="">
                                <div class="user-name-hide media-body">
                                    <span>{{ name }}<i class="middle ri-arrow-down-s-line"></i></span>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#" @click="logout">
                                        <i data-feather="log-out"></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div>
                    <div class="logo-wrapper logo-wrapper-center">
                        <a href="index.html" data-bs-original-title="" title="">
                            <img class="img-fluid for-white" src="@assets/images/logo/full-white.png" alt="logo">
                        </a>
                        <div class="back-btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="toggle-sidebar">
                            <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
                        </div>
                    </div>
                    <div class="logo-icon-wrapper">
                        <a href="index.html">
                            <img class="img-fluid main-logo main-white" src="@assets/images/logo/1-white.png"
                                alt="logo">
                            <img class="img-fluid main-logo main-dark" src="@assets/images/logo/logo-white.png"
                                alt="logo">
                        </a>
                    </div>
                    <nav class="sidebar-main">
                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li v-if="loggedIn" class="sidebar-list m-4">
                                    <router-link :to="{ name: 'Home' }" class="sidebar-link sidebar-title link-nav">
                                        <span>
                                            <h3>Danh sách công việc</h3>
                                        </span>
                                    </router-link>
                                </li>

                                <li v-if="loggedIn" class="sidebar-list m-4">
                                    <router-link :to="{ name: 'ListUser' }" class="sidebar-link sidebar-title link-nav">
                                        <span>
                                            <h3>Danh sách người dùng</h3>
                                        </span>
                                    </router-link>
                                </li>

                                <li v-if="!loggedIn" class="sidebar-list m-4">
                                    <router-link :to="{ name: 'Register' }" class="sidebar-link sidebar-title link-nav">
                                        <span>
                                            <h3>Đăng ký</h3>
                                        </span>
                                    </router-link>
                                </li>

                                <li v-if="!loggedIn" class="sidebar-list m-4">
                                    <router-link :to="{ name: 'Login' }" class="sidebar-link sidebar-title link-nav">
                                        <span>
                                            <h3>Đăng nhập</h3>
                                        </span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->

            <!-- Container-fluid starts-->
            <div class="page-body">
                <router-view @update-login="loggedIn = true"></router-view>
            </div>
        </div>
    </div>
    <!-- page-wrapper End-->
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            // overlayVisibility: false,
            loggedIn: false,
            name: ''
        }
    },
    methods: {
        // showOverlay() {
        //     this.overlayVisibility = true
        // },

        // hideOverlay() {
        //     this.overlayVisibility = false
        // },

        // updateLoginStatus() {
        //     this.loggedIn = true
        //     console.log('updated');
        // },

        getUserName() {
            axios
                .get('/api/user')
                .then((response) => this.name = response.data.name)
                .catch(error => console.log(error))
        },

        logout() {
            axios
                .post("api/logout")
                .then((response) => (this.$router.push({ name: "Login" })))
                .catch((error) => console.log(error))

            localStorage.removeItem('authenticated')
            this.loggedIn = false
        }
    },
    mounted() {
        if (localStorage.getItem('authenticated')) {
            this.loggedIn = true
            this.getUserName()
            console.log('success')

        } else {
            this.loggedIn = false
            this.$router.push({ name: "Login" })
        }

        // console.log(localStorage.getItem('authenticated'));
        // console.log(this.loggedIn);
    }
}
</script>
