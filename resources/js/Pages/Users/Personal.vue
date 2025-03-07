<script>
import MainComponent from '@/Layout/Main.vue';
import CardComponent from '@/Components/Cards/Card.vue';
import OrderUserComponent from '@/Components/Modals/OrderUser.vue';
export default{
    components: {
        MainComponent,
        CardComponent,
        OrderUserComponent
    }
}
</script>

<template>
    <MainComponent>
        <div class="border-2 border-black px-[100px] rounded-2xl w-full">
            <div class="flex mt-5">
                <div class=" text-xl font-bold mx-auto">Personal account - <span class=" font-normal">Name User</span></div>
                <img class=" cursor-pointer" src="/public/icons/Logout.svg" alt="Logout from account">
            </div>

            <div class=" mt-5">
                <div class=" font-bold">Order</div>
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
                <div class=" font-bold">Favorites</div>
                <div class="flex flex-wrap gap-x-6 gap-y-5 mt-[10px]">
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                </div>
                <button class=" my-[30px] mx-auto py-3 px-14 bg-gray-300 text-2xl rounded hover:bg-yellow-500 transition-all duration-300">load all...</button>
            </div>
        </div>
    </MainComponent>

    <!-- <OrderUserComponent></OrderUserComponent> -->
</template>
