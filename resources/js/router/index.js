import { createRouter, createWebHistory } from "vue-router";

import Login from "../components/Login.vue";
import Register from "../components/Register.vue";
import ListTask from "../components/tasks/List.vue";
import AddTask from "../components/tasks/Add.vue";
import EditTask from "../components/tasks/Edit.vue";
import MyTask from "../components/tasks/MyTask.vue";
import ListUser from "../components/users/List.vue";
import ShowUser from "../components/users/Show.vue";

const routes = [
    {
        path: "/",
        name: "ListTask",
        component: ListTask,
    },
    {
        path: "/register",
        name: "Register",
        component: Register,
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
    {
        path: "/task/add",
        name: "AddTask",
        component: AddTask,
    },
    {
        path: "/task/:id/edit",
        name: "EditTask",
        component: EditTask,
    },
    {
        path: "/task/mytask",
        name: "MyTask",
        component: MyTask,
    },
    {
        path: "/user/",
        name: "ListUser",
        component: ListUser,
    },
    {
        path: "/user/:id/",
        name: "ShowUser",
        component: ShowUser,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
