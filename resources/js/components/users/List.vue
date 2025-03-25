<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title d-sm-flex d-block">
                            <h5>Danh sách người dùng</h5>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package theme-table table-product">
                                    <thead>
                                        <tr>
                                            <th class="col-1">STT</th>
                                            <th>Tên người dùng</th>
                                            <th class="col-1">Hành động</th>
                                        </tr>
                                    </thead>

                                    <tbody v-if="users.length > 0">
                                        <tr v-for="(user, key) in users" :key="key">
                                            <td>{{ key + 1 }}</td>
                                            <td>{{ user.name }}</td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <router-link
                                                            :to='{ name: "ShowUser", params: { id: user.id } }'>
                                                            <i class="ri-eye-line"></i>
                                                        </router-link>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            users: {}
        }
    },
    mounted() {
        this.getUsers()

        // if (!localStorage.getItem('authenticated')) {
        //     this.$router.push({ name: "Login" })
        // }
    },
    methods: {
        async getUsers() {
            await axios
                .get('/api/users')
                .then((response) => this.users = response.data)
                .catch(error => console.log(error))
        },
    }
}
</script>
