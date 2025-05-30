<script setup>
import axios from 'axios';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import EasyDataTable from 'vue3-easy-data-table'
import 'vue3-easy-data-table/dist/style.css'

const data = ref([]);
const busqueda = ref('')

const headers = [
    { text: 'ID', value: 'id', sortable: true },
    { text: 'SKU', value: 'sku', sortable: true },
    { text: 'Nombre', value: 'nombre', sortable: true },
    { text: 'Descripción', value: 'descripcion', sortable: true },
    { text: 'Cantidad', value: 'cantidad', sortable: true },
    { text: 'Precio', value: 'precio', sortable: true },
    { text: 'Total', value: 'total', sortable: true },
    { text: 'Fecha', value: 'fecha_creacion', sortable: true },
    {
        text: 'Acciones',
        value: 'acciones',
        sortable: false,       // No ordenable
        searchable: false      // No se incluye en búsqueda
    }
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

const eliminar = async (item) => {
    console.log(item)
    if (confirm(`¿Estás seguro de eliminar el producto ${item.nombre}?`)) {
        try {
            await axios.delete(`/api/productos/${item.id}`);
            getAllData();
        } catch (error) {
            console.error('Error deleting product:', error);
        }
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
                        <h1>Agregar un elemento</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center justify-between mb-4">
                            <input v-model="busqueda" placeholder="Buscar en todas las columnas"
                                class="w-full md:w-1/3 px-4 py-2 mb-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />

                            <button @click="agregarItem"
                                class="ml-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Agregar</button>
                        </div>
                        <EasyDataTable :headers="headers" :items="data" :pagination="true" :rows-per-page="10"
                            :search-value="busqueda">
                            <template #item-acciones="{ row }">
                                <button @click="ver(row)"
                                    class="px-3 py-1 mr-3 text-sm font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">Editar</button>
                                <button @click="eliminar(row)"
                                    class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400">Eliminar</button>
                            </template>
                        </EasyDataTable>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
