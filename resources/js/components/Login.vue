<template>
    <div class="container-fluid-lg w-100">
        <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
            <div class="log-in-box">
                <div class="log-in-title mb-4">
                    <h3>Đăng nhập</h3>
                </div>

                <div class="input-box">
                    <form class="row g-4" @submit.prevent="submit">
                        <div class="col-12">
                            <div class="form-floating theme-form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Email"
                                    v-model="fields.email">
                                <label for="email">Email</label>
                                <span v-if="errors.email" class="text-danger">{{ errors.email[0] }}</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating theme-form-floating">
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    v-model="fields.password">
                                <label for="password">Password</label>
                                <span v-if="errors.password" class="text-danger">{{ errors.password[0] }}</span>
                            </div>
                        </div>

                        <!-- <div class="col-12">
                            <div class="forgot-box">
                                <div class="form-check ps-0 m-0 remember-box">
                                    <input class="checkbox_animated check-box" type="checkbox" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Ghi nhớ đăng nhập</label>
                                </div>
                                <a href="forgot.html" class="forgot-password">Quên mật khẩu</a>
                            </div>
                        </div> -->

                        <div class="col-12">
                            <button class="btn btn-animation w-100 justify-content-center" type="submit">
                                Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            fields: {},
            errors: {},
        }
    },
    methods: {
        submit() {
            axios.post('/api/login', this.fields).then(() => {
                this.$router.push({ name: "Home" })
                localStorage.setItem('authenticated', 'true')
                this.$emit("update-login")
            }).catch((error) => {
                this.errors = error.response.data.errors
            })
        }
    }
}
</script>
