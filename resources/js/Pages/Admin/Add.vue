<script>
import axios from 'axios';
import { router } from '@inertiajs/vue3';

export default{
    name: "AddComponent",
    data(){
        return{
            title:'',
            description:'',
            price:'',
            images: [],
        }
    },
    methods:{
        async store(){
            const formData = new FormData();
            formData.append('title', this.title);
            formData.append('description', this.description);
            formData.append('price', this.price);
            this.images.forEach((image) => {
                formData.append('images[]', image);
            });
            const res = await axios.post('/add', formData);
            console.log(res);

            if(res && res.data.created){
                router.visit('/admin');
            }
        },
        onFileChange(event){
            this.images = Array.from(event.target.files);
        }
    }
}
</script>

<template>
    <div class=" h-full flex justify-center items-center">
        <div class=" bg-white border-2 border-black rounded-2xl w-[580px] px-[100px] py-[30px]">
            <div class=" text-center text-xl font-bold mb-4">Add product</div>
            <div class="flex flex-col gap-1 items-end">
                <input v-model="title" class="focus:outline-none border-2 border-black rounded w-[380px] p-1" type="text" placeholder="enter name new product">
                <input v-model="price" class="focus:outline-none border-2 border-black rounded w-[180px] p-1" type="number" placeholder="enter price product">
                <textarea v-model="description" class="focus:outline-none border-2 border-black rounded w-[380px] h-[250px] resize-none p-1" name="" id="" placeholder="enter description product (no more than 500 characters)"></textarea>
                <div>
                    add img product (no more than 4 img)
                    <input @change="onFileChange" multiple type="file">
                </div>
            </div>

            <div class="flex flex-col items-center justify-center gap-y-1 mt-7">
                <button @click.prevent="store()" class="py-3 px-14 bg-gray-300 text-2xl rounded hover:bg-yellow-500 transition-all duration-300">add product in shop</button>
                <button class="py-3 px-14 bg-gray-300 text-2xl rounded hover:bg-yellow-500 transition-all duration-300">back in page</button>
            </div>
        </div>
    </div>

</template>
