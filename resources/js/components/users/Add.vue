<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="title-header option-title d-sm-flex d-block">
                    <h5>Thêm công việc</h5>
                    <div class="right-options">
                        <ul>
                            <li>
                                <a @click="$router.back()" class="btn btn-solid">
                                    Quay lại</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <form class="col-6" @submit.prevent="submit">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Tên công việc</label>
                                    <input type="text" class="form-control" v-model="tasks.ten_cong_viec">
                                    <!-- <span v-if="errors.ten_cong_viec" class="text-danger">
                                        {{ errors.ten_cong_viec[0] }}
                                    </span> -->
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select class="form-control" v-model="tasks.trang_thai">
                                        <option value="0">Chưa làm</option>
                                        <option value="1">Đang làm</option>
                                        <option value="2">Đã làm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Ngày hết hạn</label>
                                    <input type="date" class="form-control" v-model="tasks.ngay_het_han">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Người làm</label>
                                    <select class="form-control" v-model="tasks.user_id">
                                        <option v-for="user in users" :key="user.id" :value="user.id">
                                            {{ user.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tasks: {},
            users: {},
            // errors: {},
        }
    },
    mounted() {
        this.getUsers()
        // console.log(this.users);
    },
    methods: {
        async submit() {
            console.log(this.tasks);

            await axios
                .post('/api/task', this.tasks)
                .then(() => { this.$router.push({ name: "Home" }) })
                .catch((error) => {
                    // this.errors = error.response.data.errors
                    console.log(error);

                })
        },
        async getUsers() {
            await axios
                .get('/api/user')
                .then((response) => this.users = response.data)
                .catch(error => console.log(error))
        },
    },
}
</script>
