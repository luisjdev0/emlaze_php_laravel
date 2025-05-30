<script setup>
import axios from 'axios';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { VueGoodTable } from 'vue-good-table';
import { ref, onMounted } from 'vue';

const data = ref([]);

const columns = [
  { label: 'ID', field: 'id' },
  { label: 'SKU', field: 'sku' },
  { label: 'Nombre', field: 'nombre' },
  { label: 'Descripción', field: 'descripcion' },
  { label: 'Cantidad', field: 'cantidad' },
  { label: 'Precio', field: 'precio' },
  { label: 'Total', field: 'total' },
  { label: 'Fecha de creación', field: 'fecha_creacion' }
]

const getAllData = async () => {
    try {
        const response = await axios.get('/api/productos');
        data.value = response.data;
        console.log(response.data);
    } catch (error) {
        console.error('Error fetching products:', error);
    }
};

onMounted(() => {
    getAllData();
});

</script>

<template>

    <Head title="Productos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Listado de productos
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <pre>{{ data }}</pre>
                        <vue-good-table
                            v-if="data.length > 0"
                            :columns="columns"
                            :rows="data"
                            :search-options="{ enabled: true }"
                            :pagination-options="{ enabled: true, perPage: 5 }"
                        />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
