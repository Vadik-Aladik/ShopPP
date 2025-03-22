<script>
import MainComponent from '@/Layout/Main.vue';
import BasketComponent from '@/Components/Basket.vue';
export default{
    name: 'BasketComponent',
    components:{
        MainComponent,
        BasketComponent
    },
    data(){
        return{
            product: this.basketUser_inOrder,
            favoriteProduct: this.favorite,
            totalPrice: 0,
            beginPrice:0,
            favoriteFlag: false
        }
    },
    props:[
        'basketUser_inOrder',
        'favorite'
    ],
    methods:{
        plus(index){
            this.price = Number(this.product[index].price);
            this.beginPrice = this.price / this.product[index].count;
            this.product[index].count ++;
            this.product[index].price = this.beginPrice * this.product[index].count;
            // console.log(this.beginPrice, this.product[index].count); 
        },
        minus(index){
            this.price = Number(this.product[index].price);
            this.beginPrice = this.price / this.product[index].count;
            this.product[index].count --;
            this.product[index].price = this.beginPrice * this.product[index].count;
            // console.log(this.beginPrice, this.product[index].count); 
            if(this.product[index].count<=0){
                this.deleteProduct(this.product[index].id, index);
            }
        },
        total(){
            let sum = 0;
            this.product.forEach(element => {
                sum += Number(element.price);
            });
            return sum;
        },
        countProduct(){
            let count = 0;
            this.product.forEach(elem=>{
                count+=Number(elem.count);
            });
            return count;
        },
        favoriteCheck(elem){
            return this.favoriteProduct.some(favorElem => elem === favorElem.id_product);
        },

        async deleteProduct(id, index){
            this.product.splice(index, 1);
            const res = await axios.post(route('delete', id));
            // console.log(`product del`, res, this.product);
        },
        async placing(){
            if(this.product.length > 0){
                const orderData = this.product.map(item => ({
                    id_product: item.id,
                    quantity: item.count
                }));
                const res = await axios.post('/order', orderData);
                this.product.splice(0, this.product.length);
                alert(`Вы успешно оформили заказ. Номер вашего заказа - ${res.data.id_order}`);
            }
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
        console.log(this.product, this.favorite);
    }
}
</script>

<template>
    <MainComponent>
        <div class=" flex gap-x-5">
            <div class="flex flex-col border-2 border-black px-[100px] rounded-2xl w-full">
                <div class=" text-center my-5 font-bold text-xl">Your'e Basket</div>

                <div v-for="(elem, index) in product" :key="index">
                    <div class=" mb-3">
                        <div class="flex justify-between">
                            <div class="flex">
                                <img class=" w-20 h-20 bg-slate-400 rounded" alt="imgProduct" :src="elem.img">

                                <div class="flex flex-col justify-between ml-5">
                                    <div>{{elem.title}}</div>
                                    <div class="flex w-16 justify-between items-center">
                                        <!-- {{ console.log(favoriteCheck(elem.id))  }} -->
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
                                            <img class="w-6 group-hover:hidden" src="/public/icons/trash.svg" alt="Favorite">
                                            <img class="w-6 hidden group-hover:block" src="/public/icons/TrashHover.svg" alt="Favorite">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center h-5">
                                <div class="flex mr-[70px]">
                                    <button class=" bg-white text-2xl" @click.prevent="minus(index)">-</button>
                                    <p class=" text-lg font-semibold mx-4">{{ elem.count }}</p>
                                    <button class=" bg-white text-2xl" @click.prevent="plus(index)">+</button>
                                </div>
                                <div class="text-lg font-medium">{{ elem.price }}$</div>
                            </div>
                        </div>
                    </div>
                </div> 

            </div>

            <div class="px-2 py-5 border-2 border-black rounded-2xl w-[260px] h-60">
                <div class=" font-bold text-center text-xl">placing in order</div>
                <div class="mt-5">all count product - {{ countProduct() }}</div>
                <div class=" mt-2">total price - <span class=" text-green-700 font-bold">{{total()}}$</span></div>
                <button class="mt-5 block mx-auto text-center py-1 px-9 bg-gray-300 rounded hover:bg-yellow-500 transition-all duration-300" @click.prevent="placing()" >place an order</button>
            </div>
        </div>

    </MainComponent>
</template>

