<script>
import MainComponent from '@/Layout/Main.vue';
import CardComponent from '@/Components/Cards/Card.vue';
import OrderAdminComponent from '@/Components/Modals/OrderAdmin.vue';
export default{
    name: "AdminComponent",
    components: {
        MainComponent,
        CardComponent,
        OrderAdminComponent
    }
}
</script>

<template>
    <MainComponent>
        <div class="border-2 border-black px-[100px] rounded-2xl w-full">
            <div class="flex mt-5">
                <div class=" text-xl font-bold mx-auto">Personal account - <span class=" font-normal">Admin</span></div>
                <img class=" cursor-pointer" src="/public/icons/Logout.svg" alt="Logout from account">
            </div>

            <div class=" mt-5">
                <div class=" font-bold flex items-center">
                    Order
                    <div class=" ml-5">
                        <input class=" focus:outline-none h-6 w-[300px] border-2 border-black px-3 py-4 rounded-l-md" placeholder="enter request..." type="text">
                        <button class=" w-20 h-9 bg-black text-white rounded-r-md ">search</button>
                    </div>
                </div>
                <div class="flex flex-wrap mt-[10px] text-sm gap-5">
                    <div class=" border-2 border-black rounded w-[200px] h-[60px] flex flex-col justify-between p-[10px] cursor-pointer">
                        <div>Code order - <span class=" font-bold">ID Order</span></div>
                        <div class=" text-gray-600 font-bold">on the way</div>
                    </div>

                    <div class=" border-2 border-black rounded w-[200px] h-[60px] flex flex-col justify-between p-[10px] cursor-pointer">
                        <div>Code order - <span class=" font-bold">ID Order</span></div>
                        <div class=" text-red-600 font-bold">order cancelled</div>
                    </div>

                    <div class=" border-2 border-black rounded w-[200px] h-[60px] flex flex-col justify-between p-[10px] cursor-pointer">
                        <div>Code order - <span class=" font-bold">ID Order</span></div>
                        <div class=" text-green-700 font-bold">order delivered</div>
                    </div>

                    <div class=" border-2 border-black rounded w-[200px] h-[60px] flex flex-col justify-between p-[10px] cursor-pointer">
                        <div>Code order - <span class=" font-bold">ID Order</span></div>
                        <div class=" text-gray-600 font-bold">on the way</div>
                    </div>

                    <div class=" border-2 border-black rounded w-[200px] h-[60px] flex flex-col justify-between p-[10px] cursor-pointer">
                        <div>Code order - <span class=" font-bold">ID Order</span></div>
                        <div class=" text-gray-600 font-bold">on the way</div>
                    </div>

                    <div class=" border-2 border-black rounded w-[200px] h-[60px] flex flex-col justify-between p-[10px] cursor-pointer">
                        <div>Code order - <span class=" font-bold">ID Order</span></div>
                        <div class=" text-red-600 font-bold">order cancelled</div>
                    </div>

                    <div class=" border-2 border-black rounded w-[200px] h-[60px] flex flex-col justify-between p-[10px] cursor-pointer">
                        <div>Code order - <span class=" font-bold">ID Order</span></div>
                        <div class=" text-green-700 font-bold">order delivered</div>
                    </div>

                    <div class=" border-2 border-black rounded w-[200px] h-[60px] flex flex-col justify-between p-[10px] cursor-pointer">
                        <div>Code order - <span class=" font-bold">ID Order</span></div>
                        <div class=" text-gray-600 font-bold">on the way</div>
                    </div>
                </div>
            </div>

            <div class=" flex flex-col mt-5">
                <div class=" font-bold flex items-center">
                    Products
                    <div class=" ml-5">
                        <input class=" focus:outline-none h-6 w-[300px] border-2 border-black px-3 py-4 rounded-l-md" placeholder="enter request..." type="text">
                        <button class=" w-20 h-9 bg-black text-white rounded-r-md ">search</button>
                    </div>
                </div>
                <div class="flex flex-wrap gap-x-6 gap-y-5 mt-[10px]">
                    <div class=" w-[200px] cursor-pointer">
                        <img class="w-[200px] h-[200px] bg-gray-500 rounded-md" src="">
                        <div class="overflow-hidden text-ellipsis text-lg">Add new product</div>
                        <button class=" w-[200px] h-9 bg-gray-300 rounded mt-1 hover:bg-yellow-500 transition-all duration-300">edit product</button>
                    </div>
                    <!-- <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent> -->
                </div>
                <button class=" my-[30px] mx-auto py-3 px-14 bg-gray-300 text-2xl rounded hover:bg-yellow-500 transition-all duration-300">load all...</button>
            </div>
        </div>
    </MainComponent>
    <OrderAdminComponent></OrderAdminComponent>
</template>
