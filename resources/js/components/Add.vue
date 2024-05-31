<template>
    <Header />
    <h1>Hello User, welcome add restaurant.</h1>
    <form class="add">
        <input type="text" name="name" placeholder="Enter Name" v-model="restaurant.name">
        <input type="text" name="contact" placeholder="Enter Contact" v-model="restaurant.contact">
        <input type="text" name="address" placeholder="Enter Address" v-model="restaurant.address">
        <button @click.prevent="addRestaurant">Add a new restaurant</button>
    </form>
</template>

<script>
    import Header from './Header.vue';
    import axiosInstance from '@/axios.js';
    export default {
        name: 'Add',
        data() {
            return {
                restaurant: {
                    name: '',
                    contact: '',
                    address: ''
                }
            }
        },
        components: { Header },
        mounted() {

        },
        methods: {
            async addRestaurant() { 
                const result = await axiosInstance.post('/api/restaurants', {
                    name: this.restaurant.name,
                    contact: this.restaurant.contact,
                    address: this.restaurant.address
                });

                if (result.status === 201) {
                    alert(result.data.pesan);
                    this.$router.push({ name: 'Home' })

                }
            
            }

        }

    }
</script>