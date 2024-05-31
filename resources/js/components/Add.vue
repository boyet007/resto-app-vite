<template>
    <Header />
    <h1>Hello User, welcome add restaurant.</h1>
    <form class="add">
        <input type="text" name="name" placeholder="Enter Name" v-model="restaurant.name">
        <input type="text" name="contact" placeholder="Enter Contact" v-model="restaurant.contact">
        <input type="text" name="address" placeholder="Enter Address" v-model="restaurant.address">
        <button @click="addRestaurant">Add a new restaurant</button>
    </form>
</template>

<script>
    import Header from './Header.vue';
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
            addRestaurant() { console.log('add restaruant'); }
        }

    }
</script>