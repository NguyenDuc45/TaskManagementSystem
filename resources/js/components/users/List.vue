<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title d-sm-flex d-block">
                            <h5>Danh sách người dùng</h5>
                            <div class="right-options">
                                <ul>
                                    <li>
                                        <router-link :to="{ name: 'AddTask' }" class="btn btn-solid">
                                            Thêm công việc</router-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package theme-table table-product" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Tên công việc</th>
                                            <th>Trạng thái</th>
                                            <th>Ngày hết hạn</th>
                                            <th>Người được phân công</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>

                                    <tbody v-if="tasks.length > 0">
                                        <tr v-for="(task, key) in tasks" :key="key">
                                            <td>{{ task.ten_cong_viec }}</td>
                                            <td>
                                                <span v-if="task.trang_thai == 0" class="text-danger">Chưa làm</span>
                                                <span v-if="task.trang_thai == 1" class="text-primary">Đang làm</span>
                                                <span v-if="task.trang_thai == 2" class="text-success">Đã làm</span>
                                            </td>
                                            <td>{{ task.ngay_het_han }}</td>
                                            <td>{{ task.name }}</td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="order-detail.html">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <router-link
                                                            :to='{ name: "EditTask", params: { id: task.id } }'>
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
            tasks: {}
        }
    },
    mounted() {
        this.getTasks()

        // if (!localStorage.getItem('authenticated')) {
        //     this.$router.push({ name: "Login" })
        // }
    },
    methods: {
        async getTasks() {
            await axios
                .get('/api/task')
                .then((response) => this.tasks = response.data)
                .catch(error => console.log(error))
        },
        deleteTask(id) {
            if (confirm("Xác nhận xóa công việc này?")) {
                axios.delete(`/api/task/${id}`).then(response => {
                    this.getTasks()
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
}
</script>
