import { createRouter, createWebHistory } from "vue-router";

import Home from "../pages/Home.vue";
import List from "../pages/List.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
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
