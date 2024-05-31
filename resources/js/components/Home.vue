<template>
    <Header />
    <h1>Good Morning {{ name }}</h1>

    <table border="1"> 
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Contact</td>
                <td>Address</td>
                <td>Action</td>
            </tr>
        </thead>
        <tr v-for="restaurant in restaurants" :key="restaurant.id">
            <td>{{ restaurant.id }}</td>
            <td>{{ restaurant.name }}</td>
            <td>{{ restaurant.contact }}</td>
            <td>{{ restaurant.address }}</td>
            <td><router-link :to="`/update/${restaurant.id}`">Update</router-link>
            <button @click="deleteRestaurant(restaurant.id)">Delete</button>
            </td>
        </tr>
    </table>


</template>

<script>
import Header from './Header.vue';
import axiosInstance from '@/axios.js';
export default {
    name: 'Home',
    data() {
        return {
            restaurants: [],
            name: ''
        }
    },
    components: {
        Header
    },
    async mounted() {
        let user = localStorage.getItem('user-info');
        if (!user) {
            this.$router.push({ name: 'SignUp' });
        } else {
            this.name = JSON.parse(user).name;
        }
        this.loadData();

    },
    methods: {
        async loadData() {
            let result = await axiosInstance.get('/api/restaurants');
            this.restaurants = result.data.restaurants;
        },
        async deleteRestaurant(id) {
            let result = await axiosInstance.delete('/api/restaurants/' + id);
            if (result.status === 204) {
                alert('Data restaurant '  + id + ' sukses dihapus.');
                this.loadData();
            }
        }
    }
}
</script>

<style>
td {
    height: 29px;
    width: 160px;
}

</style>