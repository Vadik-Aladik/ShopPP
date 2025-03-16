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
            basket: [],
            sum: 0,
        }
    },  
    methods:{
        async infoBasket(){
            const res = await axios.post('basket');
            this.basket = res.data;
            console.log(this.basket);
        },
        sumAll(){
            this.basket.forEach(elem => {
                // this.sum+=element.price;
                console.log(`price this product - ${elem}`);
            });
            console.log(this.sum);
        }
    },
    mounted(){
        this.infoBasket();
        this.sumAll();
    }
}
</script>

<template>
    <div v-if="basket.length > 0">
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
    </div>
    
</template>
