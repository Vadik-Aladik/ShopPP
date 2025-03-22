<script>
import { Link } from '@inertiajs/vue3';

export default{
    name: "CardComponent",
    props: [
        'productInfo'
    ],
    components:{
        Link
    },
    methods:{
        async addBasket(idProduct){
            const res = await axios.post(route('basket.add', idProduct));
            console.log(res);
        },
    }
}
</script>

<template>
    <Link :href="route('show', productInfo.id)" class=" w-[200px] cursor-pointer">
        <img class="w-[200px] h-[200px] bg-gray-500 rounded-md" :src="productInfo.img" alt="image">
        <div class="overflow-hidden text-ellipsis text-lg">{{ productInfo.title }}</div>
        <div class=" flex justify-between text-lg">
            <p>${{ productInfo.price }}</p>
        </div>
    </Link>
        <!-- <button class=" w-[200px] h-9 bg-gray-300 rounded mt-1 hover:bg-yellow-500 transition-all duration-300" @click="addBasket(productInfo.id)">add product</button> -->
</template>
