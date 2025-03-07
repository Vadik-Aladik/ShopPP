<script>
import HeaderComponent from './Header.vue';
import FooterComponent from './Footer.vue';
export default{
    name: "MainComponent",
    components:{
        HeaderComponent,
        FooterComponent,
    },
}
</script>

<template>
    <div class="flex flex-col min-h-screen">
        <HeaderComponent></HeaderComponent>

        <div class="container mx-auto flex-grow">
            <div class="my-5 flex justify-end">
                <input class=" focus:outline-none h-6 w-[300px] border-2 border-black px-3 py-4 rounded-l-md" placeholder="enter request..." type="text">
                <button class=" w-20 h-9 bg-black text-white rounded-r-md ">search</button>
            </div>

            <div class="">
                <slot></slot>
            </div>
        </div>

        <FooterComponent></FooterComponent>
    </div>
</template>
