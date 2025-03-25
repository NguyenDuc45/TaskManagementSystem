import { createRouter, createWebHistory } from "vue-router";

import Home from "../components/Home.vue";
import List from "../components/List.vue";
import Login from "../components/Login.vue";
import Register from "../components/Register.vue";
import AddTask from "../components/tasks/Add.vue";
import EditTask from "../components/tasks/Edit.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
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
        path: "/list",
        name: "List",
        component: List,
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
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
