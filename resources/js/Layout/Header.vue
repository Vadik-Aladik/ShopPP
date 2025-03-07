<script>
import { Link } from '@inertiajs/vue3';

export default{
    name: 'HeaderComponent',
    components:{
        Link,
    },
    data(){
        return{
            msg: "ITS HEADER"
        }
    }
}
</script>

<template>
    <header class="bg-yellow-500 h-[80px] flex rounded-b-2xl">
        <div class="container mx-auto flex justify-between items-center">
            <div class=" text-2xl font-bold">techSHOP</div>
            <nav class="flex justify-between text-lg w-[250px] list-none">
                <Link :href="route('index')" class=" cursor-pointer">Main</Link>
                <Link :href="route('order')" class=" cursor-pointer">Basket</Link>
                <Link :href="route('personal')" class=" cursor-pointer">Account</Link>
            </nav>
        </div>
    </header>
</template>
