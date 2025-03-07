<script>
import { Link } from '@inertiajs/vue3';

export default{
    name: "CardComponent",
    props: [
        'productInfo'
    ],
    components:{
        Link
    }
}
</script>

<template>
    <Link :href="route('show')" class=" w-[200px] cursor-pointer">
        <img class="w-[200px] h-[200px] bg-gray-500 rounded-md" :src="productInfo.img" alt="image">
        <div class="overflow-hidden text-ellipsis text-lg">{{ productInfo.title }}</div>
        <div class=" flex justify-between text-lg">
            <p>${{ productInfo.price }}</p>
            <p class=" bg-green-700 text-white font-semibold w-9 text-center rounded-sm">{{ productInfo.grade }}</p>
        </div>
        <button class=" w-[200px] h-9 bg-gray-300 rounded mt-1 hover:bg-yellow-500 transition-all duration-300">add product</button>
    </Link>
</template>
