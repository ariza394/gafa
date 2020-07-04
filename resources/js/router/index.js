import Vue from 'vue';
import VueRouter from 'vue-router';
import ManagerList from '../components/ManagerList';
//import VuePageTransition from 'vue-page-transition';

const routes = [
    {
        path:'/api/manager',
        component:ManagerList
    }

]

const router = new VueRouter({
    mode:'history',
    routes
});

Vue.use(VueRouter);
//Vue.use(VuePageTransition);

export default router;