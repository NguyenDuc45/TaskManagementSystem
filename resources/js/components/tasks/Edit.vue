<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="title-header option-title d-sm-flex d-block">
                    <h5>Chỉnh sửa công việc</h5>
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
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
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
            tasks: { _method: "patch" },
            users: {},
        }
    },
    mounted() {
        this.getUsers()
        this.showTask()
    },
    methods: {
        async showTask() {
            await axios.get(`/api/task/${this.$route.params.id}`).then(response => {
                const { ten_cong_viec, trang_thai, ngay_het_han, user_id, } = response.data
                this.tasks.ten_cong_viec = ten_cong_viec
                this.tasks.trang_thai = trang_thai
                this.tasks.ngay_het_han = ngay_het_han
                this.tasks.user_id = user_id
                console.log(response);

            }).catch(error => {
                console.log(error)
            })
        },
        async getUsers() {
            await axios
                .get('/api/users')
                .then((response) => this.users = response.data)
                .catch(error => console.log(error))
        },
        async submit() {
            await axios.post(`/api/task/${this.$route.params.id}`, this.tasks).then(response => {
                this.$router.push({ name: "Home" })
            }).catch(error => {
                console.log(error)
            })
        }
    }
}
</script>
