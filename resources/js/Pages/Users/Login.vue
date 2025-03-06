<script>
import axios from 'axios';
import { router } from '@inertiajs/vue3';

export default{
    name: 'RegistrationComponent',
    data(){
        return{
            email:'',
            password:'',
            errors: {}
        }
    },
    methods:{
        async login(){
            this.errors = {};
            const res = await axios.post('/login', {
                email: this.email,
                password: this.password,
            }).catch(errors => {
                this.errors = errors.response.data.errors;
            });
            if(res && res.data.login){
                router.visit('/personal');
            }else{
                this.errors.password = ['Неверный пароль'];
            }
        }
    }
}
</script>

<template>
    <div class=" h-full flex justify-center items-center">
        <div class=" border-2 border-black rounded-2xl py-5 px-[100px] flex flex-col items-center">
            <div class=" font-bold text-2xl">SIGN IN</div>
            <div class=" flex flex-col gap-y-5 mt-5">
                <input v-model="email" class="w-[380px] focus:outline-none border-2 border-black rounded py-1 px-[10px]" placeholder="enter you email" type="text">
                <div class=" text-red-600 text-sm" v-if="errors.email">{{ errors.email[0] }}</div>
                <input v-model="password" class="w-[380px] focus:outline-none border-2 border-black rounded py-1 px-[10px]" placeholder="enter password" type="password">
                <div class=" text-red-600 text-sm" v-if="errors.password">{{ errors.password[0] }}</div>
                <div class="flex flex-col items-center gap-y-1">
                    <button @click.prevent="login()" class="py-3 px-14 bg-gray-300 text-2xl rounded hover:bg-yellow-500 transition-all duration-300">LOGIN</button>
                    <a class=" text-base" href="">not an account?</a>
                </div>
            </div>
        </div>
    </div>
</template>
