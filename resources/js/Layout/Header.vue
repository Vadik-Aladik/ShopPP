<script>
export default{
    name: 'HeaderComponent',
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
                <li class=" cursor-pointer">Main</li>
                <li class=" cursor-pointer">Basket</li>
                <li class=" cursor-pointer">Account</li>
            </nav>
        </div>
    </header>
</template>
