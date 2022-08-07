import { createWebHistory, createRouter } from "vue-router";

import Home from "../views/Home";
import Register from "../views/Register";
import Login from "../views/Login";
import Bills from "../views/Bills";
import Payments from "../views/Payments";
import Users from "../views/Users";

function authGuard(to, from, next) {
    if (!localStorage.getItem("token")) {
        return next("/login");
    } else {
        next();
    }
}

export const routes = [
    {
        name: "home",
        path: "/",
        component: Home,
        meta: { title: "Home" },
        beforeEnter: authGuard,
    },
    {
        name: "register",
        path: "/register",
        meta: { title: "Register" },
        component: Register,
    },
    {
        name: "login",
        path: "/login",
        component: Login,
        meta: { title: "Login" },
        // beforeEnter: authGuard,
    },
    {
        name: "users",
        path: "/users",
        component: Users,
        meta: { title: "Users" },
        // beforeEnter: authGuard,
    },
    {
        name: "bills",
        path: "/bills",
        component: Bills,
        meta: { title: "bills" },
        beforeEnter: authGuard,
    },
    {
        name: "payments",
        path: "/payments",
        component: Payments,
        meta: { title: "payments" },
        beforeEnter: authGuard,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
