<script>
export default{
    name: 'OrderUserComponent'
}
</script>

<template>
    <div class=" bg-black bg-opacity-50 h-full w-full flex items-center justify-center fixed top-0 left-0 text-lg">
        <div class=" bg-white w-[780px] rounded-2xl py-5 px-[100px]">
            <div>
                <div class=" flex flex-col items-center">
                    <div>Зкакз - <span class=" text-xl font-bold">ID Order</span></div>
                    <div class=" text-gray-500 font-bold">on the way</div>
                </div>

                <div class="flex flex-col gap-y-3">
                    <div class=" flex justify-between">
                        <div class="flex">
                            <div class="w-[80px] h-[80px] bg-gray-500 rounded-md"></div>
                            <div class=" ml-5 w-[300px]">NameProduct</div>
                        </div>
                        <div><span class="font-bold">4</span> x <span class="font-bold text-green-600">33.444$</span></div>
                    </div>

                    <div class=" flex justify-between">
                        <div class="flex">
                            <div class="w-[80px] h-[80px] bg-gray-500 rounded-md"></div>
                            <div class=" ml-5 w-[300px] truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem accusantium sed fugit dignissimos nesciunt placeat fuga nostrum repudiandae rerum eaque, sunt, iusto eum optio voluptatum adipisci! Laborum explicabo perferendis amet!</div>
                        </div>
                        <div><span class="font-bold">4</span> x <span class="font-bold text-green-600">33.444$</span></div>
                    </div>
                </div>

                <div class=" flex flex-col items-end gap-y-3 mt-7 mb-2">
                    <div>total price - <span class=" text-green-600 font-bold">999.999.999$</span></div>
                    <button class="py-3 px-8 bg-gray-300 text-2xl rounded hover:bg-yellow-500 transition-all duration-300">come in page</button>
                </div>
            </div>
        </div>
    </div>
</template>
