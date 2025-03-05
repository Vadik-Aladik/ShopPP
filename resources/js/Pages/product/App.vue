<script>
import MainComponent from '@/Layout/Main.vue';
import CardComponent from '@/Components/Cards/Card.vue';
import BasketComponent from '@/Components/Basket.vue';
export default{
    components: {
        MainComponent,
        CardComponent,
        BasketComponent
    }
}
</script>

<template>
    <MainComponent>
        <div class="flex gap-x-5">
            <div class="flex flex-col border-2 border-black pl-[35px] rounded-2xl w-full">
                <div class=" font-bold text-xl my-5 text-center">Hit of our store</div>
                <div class="flex flex-wrap gap-x-10">
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                    <CardComponent></CardComponent>
                </div>
                <button class=" my-12 mx-auto py-3 px-14 bg-gray-300 text-2xl rounded hover:bg-yellow-500 transition-all duration-300">load all...</button>
            </div>
            <BasketComponent></BasketComponent>
        </div>

    </MainComponent>

</template>
