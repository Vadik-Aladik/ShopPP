<script>
import MainComponent from '@/Layout/Main.vue';
import BasketComponent from '@/Components/Basket.vue';
export default{
    name: 'ProductShowComponent',
    components:{
        MainComponent,
        BasketComponent
    }
}
</script>

<template>
    <MainComponent>
        <div class="flex gap-x-5">
            <div class="flex flex-col border-2 border-black pl- rounded-2xl w-full h-[705px]">
                <div class="mx-auto inline-block my-auto">
                    <div class="flex mb-5">
                        <div class=" font-bold text-2xl">NameProduct</div>
                        <div class="bg-green-700 rounded text-white font-semibold text-xl w-12 h-7 text-center ml-[20px]">5.0</div>
                    </div>

                    <div class="flex">
                        <div class="flex">
                            <div class=" h-[380px] flex flex-col justify-between">
                                <div class="bg-slate-400 h-[80px] w-[80px] rounded-md"></div>
                                <div class="bg-slate-400 h-[80px] w-[80px] rounded-md"></div>
                                <div class="bg-slate-400 h-[80px] w-[80px] rounded-md"></div>
                                <div class="bg-slate-400 h-[80px] w-[80px] rounded-md"></div>
                            </div>
                            <div class=" h-[380px] w-[380px] bg-slate-400 rounded-md mx-5"></div>
                        </div>

                        <div>
                            <div class=" text-xl font-bold">Description</div>
                            <div class="w-[480px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam est ex numquam velit quam sapiente quidem vitae optio autem, eum, eius sint? Exercitationem ex voluptas neque modi et dignissimos! Et!</div>
                        </div>
                    </div>

                    <div class=" my-5">
                        <div class="text-xl font-semibold text-green-700 mb-2">99.999$</div>
                        <div class="flex items-center">
                            <button class="rounded px-8 py-3 bg-gray-300 mr-5 hover:bg-yellow-500 transition-all duration-300">add to basket</button>
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
