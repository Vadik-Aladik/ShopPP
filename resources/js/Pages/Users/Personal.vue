<script>
import MainComponent from '@/Layout/Main.vue';
import CardComponent from '@/Components/Cards/Card.vue';
import OrderUserComponent from '@/Components/Modals/OrderUser.vue';
import axios from 'axios';
import { Link, router } from '@inertiajs/vue3';
export default{
    components: {
        MainComponent,
        CardComponent,
        OrderUserComponent,
        Link
    },
    props:[
        'user',
        'orders',
        'favorite',
        'data'
    ],
    data(){
        return{
            modalFlag: false,
            arrOrder: [],
            total: 0,
        }
    },
    methods:{
        orderUser(index){
            this.total = 0;
            this.arrOrder = this.orders[index];
            this.arrOrder['orders'].forEach(elem => {
                this.total += elem.quantity * elem.product.price;
            });
            // console.log(this.modalFlag, this.arrOrder, this.total);
            return this.modalFlag = !this.modalFlag;
        },
        // totalPrice(){
        //     this.arrOrder.forEach(element => {
        //         this.total += element.quantity * element.product.price;
        //     });
        //     console.log(this.total);
        // },

        async logoutUser(){
            const res = await axios.post('/logout');
            if(res || res.data){
                router.visit('/');
            }
        }
    },
    mounted(){
        console.log(this.favorite);
        console.log(this.data);
    }
}
</script>

<template>
    <MainComponent>
        <div class="border-2 border-black px-[100px] rounded-2xl w-full">
            <div class="flex mt-5">
                <div class="flex text-xl font-bold mx-auto">Personal account - 
                    <div v-if="user.email == 'admin@admin.ru'">
                        <Link :href="route('admin')" class=" font-normal">{{user.name}}</Link>
                    </div>
                    <div v-else>
                        <span :href="route('admin')" class=" font-normal">{{user.name}}</span>
                    </div>
                </div>
                <img class=" cursor-pointer" src="/public/icons/Logout.svg" alt="Logout from account" @click.prevent="logoutUser()">
            </div>

            <div class=" mt-5">
                <div class=" font-bold">Order</div>
                <div class="flex flex-wrap mt-[10px] text-sm gap-5">
                    <div v-for="(elem,index) in orders" :key="index">
                        <div class=" border-2 border-black rounded w-[200px] h-[60px] flex flex-col justify-between p-[10px] cursor-pointer" @click.prevent="orderUser(index)">
                            <div>Code order - <span class=" font-bold">{{elem.id}}</span></div>
                            <div v-if="elem.status == 'on the way'">
                                <div class=" text-gray-600 font-bold">on the way</div>
                            </div>
                            
                            <div v-if="elem.status == 'order cancelled'">
                                <div class=" text-red-600 font-bold">order cancelled</div>
                            </div>

                            <div v-if="elem.status == 'order delivered'">
                                <div class=" text-green-700 font-bold">order delivered</div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class=" flex flex-col mt-5">
                <div class=" font-bold">Favorites</div>
                <div class="flex flex-wrap gap-x-6 gap-y-5 mt-[10px]">
                    <div v-for="elem in favorite" :key="elem">
                        <CardComponent :productInfo="elem['product']"></CardComponent>
                    </div>
                </div>
                <!-- <button class=" my-[30px] mx-auto py-3 px-14 bg-gray-300 text-2xl rounded hover:bg-yellow-500 transition-all duration-300">load all...</button> -->
                <div class="my-[30px]"></div>
            </div>
        </div>
    </MainComponent>

    <div v-if="modalFlag">
        <div class=" bg-black bg-opacity-50 h-full w-full flex items-center justify-center fixed top-0 left-0 text-lg">
            <div class=" bg-white w-[780px] rounded-2xl py-5 px-[100px]">
                <div>
                    <div class=" flex flex-col items-center">
                        <div>Зкакз - <span class=" text-xl font-bold">{{ arrOrder.id }}</span></div>
                        <!-- <div class=" text-gray-500 font-bold">{{ arrOrder.status }}</div> -->

                        <div v-if="arrOrder.status == 'on the way'">
                            <div class=" text-gray-600 font-bold">on the way</div>
                        </div>
                        <div v-if="arrOrder.status == 'order cancelled'">
                            <div class=" text-red-600 font-bold">order cancelled</div>
                        </div>
                        <div v-if="arrOrder.status == 'order delivered'">
                            <div class=" text-green-700 font-bold">order delivered</div>
                        </div>

                    </div>

                    <div class="flex flex-col gap-y-3">

                        <div v-for="elem in arrOrder.orders" :key="elem">
                            <Link :href="route('show', elem.product['id'])" class=" flex justify-between">
                                <div class="flex">
                                    <!-- <div class="w-[80px] h-[80px] bg-gray-500 rounded-md"></div> -->
                                    <div class=" ml-5 w-[300px] truncate">{{elem.product['title']}}</div>
                                </div>
                                <div><span class="font-bold">{{ elem.quantity }}</span> x <span class="font-bold text-green-600">{{elem.product.price}}$</span></div>
                            </Link>
                        </div>

                    </div>

                    <div class=" flex flex-col items-end gap-y-3 mt-7 mb-2">
                        <div>total price - <span class=" text-green-600 font-bold">{{total}}$</span></div>
                        <button class="py-3 px-8 bg-gray-300 text-2xl rounded hover:bg-yellow-500 transition-all duration-300" @click.prevent="modalFlag =! modalFlag">come in page</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
