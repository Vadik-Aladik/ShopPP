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
            totalPrice: 0,
            beginPrice:0,
        }
    },
    props:[
        'basketUser_inOrder'
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
        async deleteProduct(id, index){
            this.product.splice(index, 1);
            const res = await axios.post(route('delete', id));
            // console.log(`product del`, res, this.product);
        }
    },
    mounted(){
        console.log(this.product);
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
                                        <div class="group transition-all duration-300 cursor-pointer">
                                            <img class=" w-6 group-hover:hidden" src="/public/icons/favorite.svg" alt="Favorite">
                                            <img class=" w-6 hidden group-hover:block" src="/public/icons/FavoriteHover.svg" alt="Favorite">
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
                <button class="mt-5 block mx-auto text-center py-1 px-9 bg-gray-300 rounded hover:bg-yellow-500 transition-all duration-300">place an order</button>
            </div>
        </div>

    </MainComponent>
</template>
