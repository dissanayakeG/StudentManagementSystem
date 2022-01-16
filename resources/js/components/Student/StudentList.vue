<template>
    <div class="content-wrapper margin-inside">
        <div class="row d-flex flex-row-reverse m-3">
            <button type="button"
                    class="btn btn-light"
                    @click.prevent="addNewStudent"
            >Add New Student
            </button>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(student, index) in student">
                        <td>{{student.first_name}}</td>
                        <td>{{student.last_name}}</td>
                        <td>{{student.email}}</td>
                        <td>
                            <ion-icon name="pencil-outline" @click.prevent="editStudent(student.id)"></ion-icon>
                        </td>
                        <td>
                            <ion-icon name="trash-outline" @click.prevent="deleteStudent(student.id)"></ion-icon>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <pagination :data="studentPagination" @pagination-change-page="getAllStudent"></pagination>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "StudentList",

        data() {
            return {
                student: [],
                studentPagination: {}
            }
        },

        mounted() {
            this.getAllStudent();
        },

        methods: {
            addNewStudent() {
                this.$router.push({name: 'student-add'});
            },

            getAllStudent(page = 1) {
                axios.get('student-list?page=' + page).then(response => {
                    if (response.data) {
                        this.student = response.data.data;
                        this.studentPagination = response.data;
                    }
                });
            },

            editStudent(id) {
                this.$router.push({path: '/edit-student/' + id});
            },

            deleteStudent(id) {
                axios.post('student-delete/' + id).then(response => {
                    if (response.data) {
                        this.getAllStudent()
                    }
                });
            },

        }
    }
</script>

<style scoped>

</style>
