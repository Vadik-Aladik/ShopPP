<script>
import MainComponent from '@/Layout/Main.vue';
import BasketComponent from '@/Components/Basket.vue';
export default{
    name: 'BasketComponent',
    components:{
        MainComponent,
        BasketComponent
    }
}
</script>

<template>
    <MainComponent>
        <div class=" flex">
            <div class="flex flex-col border-2 border-black px-[100px] rounded-2xl w-full">
                <div class=" text-center my-5 font-bold text-xl">Your'e Basket</div>
                <div class=" mb-3">
                    <div class="flex justify-between">
                        <div class="flex">
                            <div class=" w-20 h-20 bg-slate-400 rounded"></div>

                            <div class="flex flex-col justify-between ml-5">
                                <div>NameProduct</div>
                                <div class="flex w-16 justify-between items-center">
                                    <div class="group transition-all duration-300 cursor-pointer">
                                        <img class=" w-6 group-hover:hidden" src="/public/icons/favorite.svg" alt="Favorite">
                                        <img class=" w-6 hidden group-hover:block" src="/public/icons/FavoriteHover.svg" alt="Favorite">
                                    </div>

                                    <div class="group transition-all duration-300 cursor-pointer">
                                        <img class="w-6 group-hover:hidden" src="/public/icons/trash.svg" alt="Favorite">
                                        <img class="w-6 hidden group-hover:block" src="/public/icons/TrashHover.svg" alt="Favorite">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center h-5">
                            <div class="flex mr-[70px]">
                                <button class=" bg-white text-2xl">-</button>
                                <p class=" text-lg font-semibold mx-4">1</p>
                                <button class=" bg-white text-2xl">+</button>
                            </div>
                            <div class="text-lg font-medium">totalPrice</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-2 py-5 border-2 border-black rounded-2xl w-[260px]">
                <div class=" font-bold text-center">placing in order</div>
                <div>all count product - 4</div>
                <div>total price - <span class=" text-green-700 font-bold">999.999.999$</span></div>
                <button class=" px-8 py-3 bg-gray-300 rounded">place an order</button>
            </div>
        </div>

    </MainComponent>
</template>
