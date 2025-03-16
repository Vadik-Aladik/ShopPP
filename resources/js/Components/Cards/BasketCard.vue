<script>
export default{
    name: 'BasketCardComponent',
    props:[
        "basketInfo"
    ],
    methods:{
        async deleteProduct(id){
            const res = await axios.post(route('delete', id));
            console.log(`product del`, res);
        }
    }
}
</script>

<template>
    <div class="flex mb-2 h-[60px]">
        <img class="w-[60px] rounded-md" :src="basketInfo.img" alt="imgProductInfo">
        <div class="flex flex-col justify-between ml-2">
            <div class=" break-all leading-none line-clamp-2">{{basketInfo.title}}</div>
            <div class="flex justify-between w-12">
                <div class="group transition-all duration-300 cursor-pointer">
                    <img class="group-hover:hidden" src="/public/icons/favorite.svg" alt="Favorite">
                    <img class="hidden group-hover:block" src="/public/icons/FavoriteHover.svg" alt="Favorite">
                </div>

                <div class="group transition-all duration-300 cursor-pointer" @click.prevent="deleteProduct(basketInfo.id)">
                    <img class="group-hover:hidden" src="/public/icons/trash.svg" alt="Favorite">
                    <img class="hidden group-hover:block" src="/public/icons/TrashHover.svg" alt="Favorite">
                </div>
            </div>
        </div>
    </div>
</template>
