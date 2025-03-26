<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="title-header option-title d-sm-flex d-block">
                    <h5>Chi tiết người dùng</h5>
                    <div class="right-options">
                        <ul>
                            <li>
                                <a @click="$router.back()" class="btn btn-solid">
                                    Quay lại</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body m-4">
                    <h4><b>Tên người dùng: </b>{{ user.name }}</h4>
                </div>
                <div class="table-responsive">
                    <table class="table all-package theme-table table-product">
                        <thead>
                            <tr>
                                <th>Tên công việc</th>
                                <th>Trạng thái</th>
                                <th>Ngày hết hạn</th>
                                <th>Người phân công</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <tbody v-if="tasks.length > 0">
                            <tr v-for="(task, key) in filteredTasks" :key="key">
                                <td>{{ task.ten_cong_viec }}</td>
                                <td>
                                    <span v-if="task.trang_thai == 0" class="text-danger">Chưa làm</span>
                                    <span v-if="task.trang_thai == 1" class="text-primary">Đang làm</span>
                                    <span v-if="task.trang_thai == 2" class="text-success">Đã làm</span>
                                </td>
                                <td>{{ task.ngay_het_han }}</td>
                                <td>{{ task.nguoi_phan_cong_name }}</td>
                                <td>
                                    <ul>
                                        <!-- <li>
                                            <a href="order-detail.html">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </li> -->

                                        <li>
                                            <router-link :to='{ name: "EditTask", params: { id: task.id } }'>
                                                <i class="ri-pencil-line"></i>
                                            </router-link>
                                        </li>

                                        <li>
                                            <a href="javascript:void(0)" @click="deleteTask(task.id)">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
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
</template>

<script>
export default {
    data() {
        return {
            tasks: {},
            user: {},
            // errors: {},
        }
    },
    mounted() {
        this.getUser()
        this.getTasks()
    },
    methods: {
        async getUser() {
            await axios
                .get(`/api/users/${this.$route.params.id}`)
                .then((response) => this.user = response.data)
                .catch(error => console.log(error))
        },
        async getTasks() {
            await axios
                .get('/api/task')
                .then((response) => this.tasks = response.data)
                .catch(error => console.log(error))
        },
    },
    computed: {
        filteredTasks() {
            return this.tasks.filter(task => task.nguoi_lam_id == this.$route.params.id);
        }
    }
}
</script>
