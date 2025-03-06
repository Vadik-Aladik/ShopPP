<script>
export default{
    name: 'RegistrationComponent'
}
</script>

<template>
    <div class=" h-full flex justify-center items-center">
        <div class=" border-2 border-black rounded-2xl py-5 px-[100px] flex flex-col items-center">
            <div class=" font-bold text-2xl">SIGN UP</div>
            <div class=" flex flex-col gap-y-5 mt-5">
                <input class="w-[380px] focus:outline-none border-2 border-black rounded py-1 px-[10px]" placeholder="enter you login" type="text">
                <input class="w-[380px] focus:outline-none border-2 border-black rounded py-1 px-[10px]" placeholder="enter you email" type="text">
                <input class="w-[380px] focus:outline-none border-2 border-black rounded py-1 px-[10px]" placeholder="enter password" type="text">
                <input class="w-[380px] focus:outline-none border-2 border-black rounded py-1 px-[10px]" placeholder="enter password again" type="text">
                <div class="flex flex-col items-center gap-y-1">
                    <button class="py-3 px-14 bg-gray-300 text-2xl rounded hover:bg-yellow-500 transition-all duration-300">LOGIN</button>
                    <a class=" text-base" href="#">have an account?</a>
                </div>
            </div>
        </div>
    </div>
</template>
