<template>
    <div class="wrapper">
        <!-- <div class="header"><Header /></div> -->

        <div class="content">
            <div class="side-bar">
                <Nav/>
            </div>
            <div class="dashboard">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from "./LayoutComponents/Header.vue";
    import Nav from "./LayoutComponents/SideNav.vue";

    export default {
        name: "App",

        components: {
            Header,
            Nav,
        },

        mounted() {
            if (this.$route.name == "dashboard") {
                this.$router.push({path: "/dashboard"}).catch((err) => {
                });
            }
        },
    };
</script>

<style>
    .wrapper {
        display: flex;
        flex-direction: column;
        position: relative;
        height: auto;
    }

    .header {
        min-height: 10vh;
        width: 100%;
        position: relative;
        background-color: rgb(44, 50, 59);
    }

    .content {
        display: flex;
        flex-direction: row;
        min-height: 100vh;
        width: 100%;
        background-color: rgb(223, 217, 218);
    }

    .side-bar {
        width: 20%;
    }

    .dashboard {
        width: 80%;
    }
</style>
