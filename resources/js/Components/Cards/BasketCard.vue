<script>
export default{
    name: 'BasketCardComponent',
}
</script>

<template>
    <div class="flex mb-2">
        <img class="w-[60px] rounded-md" src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcQTiKFWMa2um2DvIftKh8kPWMh56eNURMK7WNwzi1knE17t91Ewf8KRu8MKZSwftiF0Um3ITnzlQhRFKua89M0jxQ" alt="">
        <div class="flex flex-col justify-between ml-2">
            <div class=" break-all leading-none line-clamp-2">NameProduc</div>
            <div class="flex justify-between w-12">
                <div class="group transition-all duration-300 cursor-pointer">
                    <img class="group-hover:hidden" src="/public/icons/favorite.svg" alt="Favorite">
                    <img class="hidden group-hover:block" src="/public/icons/FavoriteHover.svg" alt="Favorite">
                </div>

                <div class="group transition-all duration-300 cursor-pointer">
                    <img class="group-hover:hidden" src="/public/icons/trash.svg" alt="Favorite">
                    <img class="hidden group-hover:block" src="/public/icons/TrashHover.svg" alt="Favorite">
                </div>
            </div>
        </div>
    </div>
</template>
