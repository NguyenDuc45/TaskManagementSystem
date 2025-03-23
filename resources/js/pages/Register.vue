<template>
    <div class="container-fluid-lg w-100">
        <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
            <div class="log-in-box">
                <div class="log-in-title mb-4">
                    <h3>Đăng kí</h3>
                </div>

                <div class="input-box">
                    <form class="row g-4" @submit.prevent="submit">
                        <div class="col-12">
                            <div class="form-floating theme-form-floating">
                                <input type="text" class="form-control" id="fullname" placeholder="Họ và tên"
                                    v-model="fields.name">
                                <label for="fullname">Họ và tên</label>
                                <span v-if="errors.name" class="text-danger">{{ errors.name[0] }}</span>
                            </div>
                        </div>
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

                        <div class="col-12">
                            <div class="form-floating theme-form-floating">
                                <input type="password" class="form-control" id="password_confirmation"
                                    placeholder="Password" v-model="fields.password_confirmation">
                                <label for="password_confirmation">Nhập lại Password</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-animation w-100" type="submit">Đăng ký</button>
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
            axios.post('/api/register', this.fields).then(() => {
                this.$router.push({ name: "Home" })
            }).catch((error) => {
                this.errors = error.response.data.errors
            })
        }
    }
}
</script>
