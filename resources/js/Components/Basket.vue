<script>
import BasketCardComponent from '@/Components/Cards/BasketCard.vue'
import axios from 'axios';
export default{
    name:"BasketComponent",
    components:{
        BasketCardComponent
    },
    data(){
        return{
            basket: null,
        }
    },  
    methods:{
        async infoBasket(){
            let res = await axios.post('basket');
            console.log(res);
            this.basket = res.data;
        }
    },
    mounted(){
        this.infoBasket();
    }
}
</script>

<template>
    <div class="px-2 py-5 border-2 border-black rounded-2xl w-[260px] shrink-0 h-[500px]">
        <div class=" text-xl font-bold text-center">Basket</div>
        <div class="overflow-auto h-[180px] mt-7 border-b-2 border-black">
            <div v-for="elem in basket" :key="elem">
                <BasketCardComponent :basketInfo="elem"></BasketCardComponent>
            </div>
        </div>

        <div class="flex flex-col items-end mt-3 text-lg">
            <div class="flex justify-end">total price - <span class=" font-bold text-green-700"> 999.999$</span></div>
            <button class="mt-3 h-8 w-32 bg-gray-300 rounded hover:bg-yellow-500 transition-all duration-300">go to basket</button>
        </div>

    </div>
</template>
