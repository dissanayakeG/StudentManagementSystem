<template>
    <div class="nav-list">
        <ul>
            <li class="item" @click="checkCurrentRoute">
                <router-link to="/dashboard">
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                    <span
                        :class="currentRoute == 'dashboard' ? 'text highlight' : 'text'"
                    >{{ "dashboard" }}</span
                    >
                </router-link>
            </li>
            <li class="item" @click="checkCurrentRoute">
                <router-link to="/student">
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                    <span
                        :class="currentRoute == 'student-list' ? 'text highlight' : 'text'"
                    >{{ "Student" }}</span
                    >
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "SideNave",

        data() {
            return {
                currentRoute: "Dashboard",
            };
        },

        methods: {
            checkCurrentRoute() {
                this.currentRoute = this.$route.name;
            },
        },
    };
</script>

<style scoped>
    .highlight {
        color: aqua;
    }
</style>

