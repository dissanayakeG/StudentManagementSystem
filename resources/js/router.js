import Vue from 'vue';
import VueRouter from 'vue-router';
import DashBoard from "./components/DashBoard.vue";
import StudentList from "./components/Student/StudentList";
import AddNewStudent from "./components/Student/AddNewStudent";
import EditStudent from "./components/Student/EditStudent";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            name: 'dashboard',
            path: '/',
            component: DashBoard
        },
        {
            name: 'dashboard',
            path: '/dashboard',
            component: DashBoard
        },
        {
            name: 'student-list',
            path: '/student',
            component: StudentList
        },
        {
            name: 'student-add',
            path: '/add-new-student',
            component: AddNewStudent
        },
        {
            name: 'student-edit',
            path: '/edit-student/:id',
            component: EditStudent
        },
    ],

    mode: 'history'
});
