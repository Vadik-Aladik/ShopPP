<script>
import BasketCardComponent from '@/Components/Cards/BasketCard.vue'
import axios from 'axios';
import { Link } from '@inertiajs/vue3';
export default{
    name:"BasketComponent",
    components:{
        BasketCardComponent,
        Link
    },
    data(){
        return{
            basket: [],
            favoriteProduct: [],
            sum: 0,
            totalPrice: 0,
        }
    },  
    methods:{
        // price(){
        //     this.totalPrice = 0;
        //     this.basket.forEach(elem =>{
        //         this.totalPrice+=Number(elem.price);
        //     });
        //     console.log(this.basket);
        // },
        favoriteCheck(elem){
            return this.favoriteProduct.some(favorElem => elem === favorElem.id_product);
        },
        async infoBasket(){
            const res = await axios.post('basket');
            if(res || res.data){
                this.basket = res.data.products;
                this.favoriteProduct = res.data.favorite;
                console.log(res);
            }
            this.basket.forEach(elem =>{
                this.totalPrice+=Number(elem.price);
            });
            console.log(this.basket);
        },
        async deleteProduct(id, index){
            const res = await axios.post(route('delete', id));
            this.basket.splice(index, 1);
            console.log(`product del`, res);
            this.totalPrice = 0;
            this.basket.forEach(elem =>{
                this.totalPrice+=Number(elem.price);
            });
        },
        async addFavorite(idProduct){
            const res = await axios.post(route('favorite.add', idProduct));
            console.log(res);
            this.favoriteProduct.push({ id_product: idProduct });
        },

        async removeFavorite(idProduct, index){
            const res = await axios.post(route('favorite.remove', idProduct));
            console.log(res);
            this.favoriteProduct = this.favoriteProduct.filter(favorElem => favorElem.id_product !== idProduct);
        },
        
    },
    mounted(){
        this.infoBasket();
    }
}
</script>

<template>
    <div v-if="basket.length > 0">
        <div class="px-2 py-5 border-2 border-black rounded-2xl w-[260px] shrink-0 h-[500px]">
            <div class=" text-xl font-bold text-center">Basket</div>
            <div class="overflow-auto h-[180px] mt-7 border-b-2 border-black">
                <div v-for="(elem, index) in basket" :key="elem">
                    <!-- <BasketCardComponent :basketInfo="elem"></BasketCardComponent> -->

                    <div class="flex mb-2 h-[60px]">
                        <img class="w-[60px] rounded-md" :src="elem.img" alt="imgProductInfo">
                        <div class="flex flex-col justify-between ml-2">
                            <div class=" break-all leading-none line-clamp-2">{{elem.title}}</div>
                            <div class="flex justify-between w-12">
                                <div v-if="favoriteCheck(elem.id)">
                                    <img class="w-6" src="/public/icons/FavoriteAdded.svg" alt="Favorite" @click.prevent="removeFavorite(elem.id, index)">
                                </div>
                                <div v-else>
                                    <div class="group transition-all duration-300 cursor-pointer" @click.prevent="addFavorite(elem.id)">
                                        <img class=" w-6 group-hover:hidden" src="/public/icons/favorite.svg" alt="Favorite">
                                        <img class=" w-6 hidden group-hover:block" src="/public/icons/FavoriteHover.svg" alt="Favorite">
                                    </div>
                                </div>

                                <div class="group transition-all duration-300 cursor-pointer" @click.prevent="deleteProduct(elem.id, index)">
                                    <img class="group-hover:hidden" src="/public/icons/trash.svg" alt="Favorite">
                                    <img class="hidden group-hover:block" src="/public/icons/TrashHover.svg" alt="Favorite">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex flex-col items-end mt-3 text-lg">
                <div class="flex justify-end">total price - <span class=" font-bold text-green-700">{{totalPrice}}$</span></div>
                <Link :href="route('order')" class="mt-3 h-8 w-32 bg-gray-300 rounded hover:bg-yellow-500 transition-all duration-300 text-center">go to basket</Link>
            </div>

        </div>
    </div>
    
</template>
