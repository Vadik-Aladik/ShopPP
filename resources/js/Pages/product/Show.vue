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
        basket: Object,
        favorite: Object
    },
    data(){
        return{
            data: this.product[0].img[0]['url'],
            favoriteFlag: false,
            basketFlag: false,
        }
    },
    methods:{
        async addBasket(idProduct){
            const res = await axios.post(route('basket.add', idProduct));
            console.log(res);
            if(res.data.user){
                return this.basketFlag = !this.basketFlag;
            }
        },

        async addFavorite(idProduct){
            const res = await axios.post(route('favorite.add', idProduct));
            console.log(res);
            return this.favoriteFlag = !this.favoriteFlag;
        },

        async removeFavorite(idProduct){
            const res = await axios.post(route('favorite.remove', idProduct));
            console.log(res);
            return this.favoriteFlag = !this.favoriteFlag;
        },
        
        slide(elem){
            this.data = elem;
        }
    },
    // mounted(){
    //     console.log(this.favorite[0], this.basket[0]);
    // }
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
                            <div v-if="basket[0] != null || basketFlag">
                                <Link :href="route('order')" class="rounded px-8 py-3 bg-black mr-5 text-white">go to basket</Link>
                            </div>
                            <div v-else>
                                <button @click="addBasket(product[0].id)" class="rounded px-8 py-3 bg-gray-300 mr-5 hover:bg-yellow-500 transition-all duration-300">add to basket</button>
                            </div>
                            <!-- <button @click.prevent="addBasket(product[0].id)" class="rounded px-8 py-3 bg-gray-300 mr-5 hover:bg-yellow-500 transition-all duration-300">add to basket</button> -->
                            <div v-if="favorite[0] != null || favoriteFlag">
                                <img class="w-9 cursor-pointer" src="\public\icons\FavoriteAdded.svg" alt="" @click.prevent="removeFavorite(product[0].id)">
                            </div>
                            <div v-else>
                                <div class="group transition-all duration-300 cursor-pointer" @click.prevent="addFavorite(product[0].id)">
                                    <img class="group-hover:hidden w-9" src="/public/icons/favorite.svg" alt="Favorite">
                                    <img class="hidden group-hover:block w-9" src="/public/icons/FavoriteHover.svg" alt="Favorite">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainComponent>
</template>
