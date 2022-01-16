<template>
    <div class="content-wrapper margin-inside">
        <h1 class="ml-5 mt-5">Add New Student</h1>
        <form class="m-5">
            <div class="mb-3">
                <label for="firstName" class="form-label">First name</label>
                <input
                    type="text"
                    class="form-control"
                    id="firstName"
                    placeholder="Enter first name"
                    v-model="student.first_name">
                <span v-if="errors.first_name" class="text-danger">
                    {{errors.first_name[0]}}
                </span>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last name</label>
                <input
                    type="text"
                    class="form-control"
                    id="lastName"
                    placeholder="Enter last name"
                    v-model="student.last_name">
                <span v-if="errors.last_name" class="text-danger">
                    {{errors.last_name[0]}}
                </span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Enter email"
                    v-model="student.email">
                <span v-if="errors.email" class="text-danger">
                    {{errors.email[0]}}
                </span>
            </div>
            <button type="submit" class="btn btn-primary"
                    @click.prevent="saveStudent"
                    :disabled="isClickedOnSave"
            >
                <span v-if="isClickedOnSave">
                    <span class="spinner-grow spinner-grow-sm"
                          role="status"
                          aria-hidden="true"
                    ></span>
                    Loading...
                </span>
                <span v-else>
                    Submit
                </span>
            </button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "AddNewStudent",

        data() {
            return {
                student: {
                    first_name: '',
                    last_name: '',
                    email: ''
                },
                isClickedOnSave: false,
                errors: {}
            }
        },

        methods: {
            saveStudent() {
                this.isClickedOnSave = true;
                let saveData = {
                    first_name: this.student.first_name,
                    last_name: this.student.last_name,
                    email: this.student.email,
                }
                axios.post('student-add', saveData).then(response => {
                    if (response.data && response.data.data && response.data.data.errors) {
                        this.errors = response.data.data.errors.validations;
                    } else {
                        this.isClickedOnSave = false;
                        this.$router.push({name: 'student-list'});
                    }
                    this.isClickedOnSave = false;
                });
            }
        }
    }
</script>

<style scoped>

</style>
