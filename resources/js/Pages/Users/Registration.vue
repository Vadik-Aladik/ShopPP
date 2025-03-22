<script>
import axios from 'axios';
import { router, Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

export default{
    name: 'RegistrationComponent',
    components:{
        Link
    },
    data(){
        return{
            name: '',
            email: '',
            password: '',
            passwordConfirm: '',
            errors: {}
        }
    },
    methods:{
        async store(){
            this.errors={};
            const res = await axios.post('/registration', {
                name: this.name,
                email: this.email,
                password: this.password,
                passwordConfirm: this.passwordConfirm,
            }).catch(error => {
                this.errors = error.response.data.errors;
                console.log(this.errors);
            });
            if(res && res.data.auth){
                router.visit('/personal');
            }
        }
    }
}
</script>

<template>
    <div class=" h-full flex justify-center items-center">
        <div class=" border-2 border-black rounded-2xl py-5 px-[100px] flex flex-col items-center">
            <div class=" font-bold text-2xl">SIGN UP</div>
            <div class=" flex flex-col gap-y-5 mt-5">
                <input v-model="name" class="w-[380px] focus:outline-none border-2 border-black rounded py-1 px-[10px]" placeholder="enter you login" type="text">
                <div class=" text-red-600 text-sm" v-if="errors.name">{{ errors.name[0] }}</div>
                <input v-model="email" class="w-[380px] focus:outline-none border-2 border-black rounded py-1 px-[10px]" placeholder="enter you email" type="text">
                <div class=" text-red-600 text-sm" v-if="errors.email">{{ errors.email[0] }}</div>
                <input v-model="password" class="w-[380px] focus:outline-none border-2 border-black rounded py-1 px-[10px]" placeholder="enter password" type="password">
                <div class=" text-red-600 text-sm" v-if="errors.password">{{ errors.password[0] }}</div>
                <input v-model="passwordConfirm" class="w-[380px] focus:outline-none border-2 border-black rounded py-1 px-[10px]" placeholder="enter password again" type="password">
                <div class=" text-red-600 text-sm" v-if="errors.passwordConfirm">{{ errors.passwordConfirm[0] }}</div>
                <div class="flex flex-col items-center gap-y-1">
                    <button @click.prevent="store()" class="py-3 px-14 bg-gray-300 text-2xl rounded hover:bg-yellow-500 transition-all duration-300">LOGIN</button>
                    <Link :href="route('user.login')" class=" text-base" href="#">have an account?</Link>
                </div>
            </div>
        </div>
    </div>
</template>
