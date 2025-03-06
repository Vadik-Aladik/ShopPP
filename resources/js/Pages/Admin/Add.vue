<script>
export default{
    name: "AddComponent",
}
</script>

<template>
    <div class=" h-full flex justify-center items-center">
        <div class=" bg-white border-2 border-black rounded-2xl w-[580px] px-[100px] py-[30px]">
            <div class=" text-center text-xl font-bold mb-4">Add product</div>
            <div class="flex flex-col gap-1 items-end">
                <input class="focus:outline-none border-2 border-black rounded w-[380px] p-1" type="text" placeholder="enter name new product">
                <input class="focus:outline-none border-2 border-black rounded w-[180px] p-1" type="text" placeholder="enter price product">
                <textarea class="focus:outline-none border-2 border-black rounded w-[380px] h-[250px] resize-none p-1" name="" id="" placeholder="enter description product (no more than 500 characters)"></textarea>
                <div>
                    add img product (no more than 4 img)
                    <input type="file" name="" id="">
                </div>
            </div>

            <div class="flex flex-col items-center justify-center gap-y-1 mt-7">
                <button class="py-3 px-14 bg-gray-300 text-2xl rounded hover:bg-yellow-500 transition-all duration-300">add product in shop</button>
                <button class="py-3 px-14 bg-gray-300 text-2xl rounded hover:bg-yellow-500 transition-all duration-300">back in page</button>
            </div>
        </div>
    </div>

</template>
