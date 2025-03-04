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
            <div class="flex flex-wrap gap-x-10 border-2 border-black pl-[30px] py-5 rounded-2xl ">
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
            <BasketComponent></BasketComponent>
        </div>

    </MainComponent>

</template>
