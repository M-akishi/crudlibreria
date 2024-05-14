<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};

</script>

<template>
    <Head title="¿Olvido su contraseña?" />
    <div class="container">
        <div class="flex-row">
            <img src="../images/ilustracion.jpg" width="400">
        </div>
        <div class="flex-row">
            <AuthenticationCard>
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    No hay problema. Sólo háganos saber su dirección de correo electrónico y le enviaremos por correo electrónico un enlace de restablecimiento de contraseña que le permitirá elegir uno nuevo.        </div>

                <div v-if="status" class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" value="Correo electronico" />
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="email"
                            class="mt-1 block w-full"
                            required
                            autofocus
                            autocomplete="username"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div>
                        
                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Ingresa Correo electronico para restablecer contraseña
                            </PrimaryButton>            
                            <PrimaryButton @click="goBack">Volver</PrimaryButton>            
                    </div>
                </form>
            </AuthenticationCard>
        </div>
    </div>
</template>
<style>


.container {
    display: flex;
    flex-direction: column; 
    align-items: center; 
}
.flex-row {
    width: 100%; 
    max-width: 500px; 
}   

</style>
<script>
export default {
  methods: {
    goBack() {
      // Volver a la página anterior utilizando el historial de navegación del navegador
      window.history.back();
    }
  }
}
</script>