<script>
import MainComponent from '@/Layout/Main.vue';
import BasketComponent from '@/Components/Basket.vue';
import axios from 'axios';
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
export default{
    name: 'ProductShowComponent',
    components:{
        MainComponent,
        BasketComponent,
        Link
    },
    props:{
        product: Array,
        basket: Object
    },
    data(){
        return{
            data: this.product[0].img[0]['url']
        }
    },
    methods:{
        async addBasket(idProduct){
            const res = await axios.post(route('basket.add', idProduct));
            console.log(res);
        },
        
        slide(elem){
            this.data = elem;
        }
    },
    mounted(){
        console.log(this.product);
        console.log(this.basket);
    }
}
</script>

<template>
    <MainComponent>
        <div class="flex gap-x-5">
            <div class="flex flex-col border-2 border-black pl- rounded-2xl w-full h-[705px]">
                <div class="mx-auto inline-block my-auto">
                    <div class="flex mb-5">
                        <div class=" font-bold text-2xl">{{ product[0].title }}</div>
                    </div>

                    <div class="flex">
                        <div class="flex">
                            <div class=" h-[380px] flex flex-col justify-between" >
                                <div v-for="elem in product[0].img" :key="elem">
                                    <div v-for="item in elem" :key="item">
                                        <img class="bg-slate-400 h-[80px] w-[80px] rounded-md cursor-pointer" @click.prevent="slide(item)" :src="item">
                                    </div>
                                </div>
                                <!-- <div class="bg-slate-400 h-[80px] w-[80px] rounded-md"></div>
                                <div class="bg-slate-400 h-[80px] w-[80px] rounded-md"></div>
                                <div class="bg-slate-400 h-[80px] w-[80px] rounded-md"></div>
                                <div class="bg-slate-400 h-[80px] w-[80px] rounded-md"></div> -->
                            </div>
                            <img class=" h-[380px] w-[380px] bg-slate-400 rounded-md mx-5" :src="data">
                        </div>

                        <div>
                            <div class=" text-xl font-bold">Description</div>
                            <div class="w-[480px]">{{product[0].description}}</div>
                        </div>
                    </div>

                    <div class=" my-5">
                        <div class="text-xl font-semibold text-green-700 mb-2">{{ product[0].price }}$</div>
                        <div class="flex items-center">
                            <div v-if="basket[0] != null">
                                <button class="rounded px-8 py-3 bg-black mr-5 text-white">go to basket</button>
                            </div>
                            <div v-else>
                                <button @click.prevent="addBasket(product[0].id)" class="rounded px-8 py-3 bg-gray-300 mr-5 hover:bg-yellow-500 transition-all duration-300">add to basket</button>
                            </div>
                            <!-- <button @click.prevent="addBasket(product[0].id)" class="rounded px-8 py-3 bg-gray-300 mr-5 hover:bg-yellow-500 transition-all duration-300">add to basket</button> -->
                            <div class="group transition-all duration-300 cursor-pointer">
                                <img class="group-hover:hidden w-9" src="/public/icons/favorite.svg" alt="Favorite">
                                <img class="hidden group-hover:block w-9" src="/public/icons/FavoriteHover.svg" alt="Favorite">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <BasketComponent></BasketComponent>
        </div>
    </MainComponent>
</template>
