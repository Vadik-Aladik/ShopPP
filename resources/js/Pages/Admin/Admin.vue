<script>
import MainComponent from '@/Layout/Main.vue';
import CardComponent from '@/Components/Cards/Card.vue';
import OrderAdminComponent from '@/Components/Modals/OrderAdmin.vue';
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
export default{
    name: "AdminComponent",
    components: {
        MainComponent,
        CardComponent,
        OrderAdminComponent,
        Link
    },
    data(){
        return{
            orders: [],
            arrOrder: [],
            idOrder: 0,
            status: '',
            products: null,
            modalFlag: false,
            total: 0,
        }
    },
    methods:{
        async adminData(){
            const res = await axios.post('/admin');
            this.orders = res.data.orders;
            this.products = res.data.products;
        },
        async statusOrder(status, id){
            const res = await axios.post('/status', {
                id_order: id,
                order_status: status
            }).catch(error => {
                console.log(error);
            });
            if (res && res.data) {
                this.status = res.data.data; // Убедитесь, что вы получаете нужные данные
                console.log(this.status.order_status);
                this.orders.forEach((elem, index) => {
                    if(elem.id == this.status.id_order){
                        this.orders[index].status = this.status.order_status;
                    }
                })
            }
        },
        async logoutUser(){
            const res = await axios.post('/logout');
            if(res || res.data){
                router.visit('/');
            }
        },
        orderUser(index){
            this.total = 0;
            this.arrOrder = this.orders[index];
            this.idOrder = this.arrOrder['id'];
            this.arrOrder['orders'].forEach(elem => {
                this.total += elem.quantity * elem.product.price;
            });
            return this.modalFlag = !this.modalFlag;
        }
    },
    mounted(){
        this.adminData();
    }
}
</script>

<template>
    <MainComponent>
        <div class="border-2 border-black px-[100px] rounded-2xl w-full">
            <div class="flex mt-5">
                <div class=" text-xl font-bold mx-auto">Welcome to - <span class=" font-normal">Admin panel</span></div>
                <img class=" cursor-pointer" src="/public/icons/Logout.svg" alt="Logout from account" @click.prevent="logoutUser()">
            </div>

            <div class=" mt-5">
                <div class=" font-bold flex items-center">
                    Order
                </div>
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
                <div class=" font-bold flex items-center">
                    Products
                </div>
                <div class="flex flex-wrap gap-x-6 gap-y-5 mt-[10px]">
                    <Link :href="route('admin.add')" class=" w-[200px] cursor-pointer">
                        <img class="w-[200px] h-[200px] bg-gray-500 rounded-md" src="">
                        <div class="overflow-hidden text-ellipsis text-lg">Add new product</div>
                    </Link>
                    <div v-for="product in products" :key="product">
                        <CardComponent :productInfo="product"></CardComponent>
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
                        <div class="flex justify-between w-[470px] mt-1">
                            <button @click.prevent="statusOrder( 'order cancelled', idOrder)" class=" py-1 px-4 bg-gray-300 rounded">order cancelled</button>
                            <button @click.prevent="statusOrder( 'on the way', idOrder)" class=" py-1 px-4 bg-gray-300 rounded">on the way</button>
                            <button @click.prevent="statusOrder( 'order delivered', idOrder)" class=" py-1 px-4 bg-gray-300 rounded">order delivered</button>
                            <!-- <button class=" py-1 px-4 bg-green-600 text-white rounded">order delivered</button> -->
                        </div>
                    </div>

                    <div class="flex flex-col gap-y-3 mt-7">

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
