<script>
export default{
    name: "FooterComponent"
}
</script>
<template>
    <footer class="h-[200px] bg-black text-col text-white rounded-t-2xl text-base flex items-center mt-5">
        <div class="container mx-auto flex justify-between">
            <div class=" my-auto">
                <div class="text-2xl font-bold text-yellow-500">techSHOP</div>
                <div class=" mt-7">All rights protected</div>
            </div>

            <div class="flex">
                <div class="w-[80px] flex flex-col items-center border-r-[1px] border-white">
                    <div class="text-2xl font-bold text-yellow-500">store</div>
                    <nav class="list-none flex flex-col items-center">
                        <li class=" cursor-pointer mt-2">Main</li>
                        <li class=" cursor-pointer mt-2">Basket</li>
                        <li class=" cursor-pointer mt-2">Account</li>
                    </nav>
                </div>

                <div class="w-[80px] flex flex-col items-center border-r-[1px] border-white">
                    <div class="text-2xl font-bold text-yellow-500">social</div>
                    <nav class="list-none flex flex-col items-center">
                        <li class=" cursor-pointer mt-2">VK</li>
                        <li class=" cursor-pointer mt-2">Teleram</li>
                    </nav>
                </div>

                <div class="w-[160px] flex flex-col items-center">
                    <div class="text-2xl font-bold text-yellow-500">help</div>
                    <nav class="list-none flex flex-col items-center">
                        <li class=" cursor-pointer mt-2">8(333)333-22-22</li>
                        <li class=" cursor-pointer mt-2">user agreement</li>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
</template>
