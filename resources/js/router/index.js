import { createRouter, createWebHistory } from "vue-router";

import Home from "../pages/Home.vue";
import List from "../pages/List.vue";
import Login from "../pages/Login.vue";
import Register from "../pages/Register.vue";

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
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
