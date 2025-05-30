<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fecha = Carbon::now();

        DB::table('productos')->insert([
            [
                'sku' => 1001,
                'nombre' => 'Crema Hidratante',
                'descripcion' => 'Crema Hidratante',
                'cantidad' => 10,
                'precio' => 100.00,
                'total' => 1000.00,
                'fecha_creacion' => $fecha,
            ],
            [
                'sku' => 1002,
                'nombre' => 'Aceite Corporal',
                'descripcion' => 'Aceite Corporal',
                'cantidad' => 5,
                'precio' => 200.00,
                'total' => 1000.00,
                'fecha_creacion' => $fecha,
            ],
            [
                'sku' => 1003,
                'nombre' => 'Mascarilla Revitalizante',
                'descripcion' => 'Mascarilla Revitalizante',
                'cantidad' => 15,
                'precio' => 50.00,
                'total' => 750.00,
                'fecha_creacion' => $fecha,
            ],
            [
                'sku' => 1004,
                'nombre' => 'Gel Limpiador Facial',
                'descripcion' => 'Gel Limpiador Facial',
                'cantidad' => 15,
                'precio' => 70.00,
                'total' => 1050.00,
                'fecha_creacion' => $fecha,
            ],
            [
                'sku' => 1005,
                'nombre' => 'Sérum Antiarrugas',
                'descripcion' => 'Sérum Antiarrugas',
                'cantidad' => 8,
                'precio' => 200.00,
                'total' => 1600.00,
                'fecha_creacion' => $fecha,
            ],
            [
                'sku' => 1006,
                'nombre' => 'Tónico Facial Refrescante',
                'descripcion' => 'Tónico Facial Refrescante',
                'cantidad' => 16,
                'precio' => 83.33,
                'total' => 1333.28,
                'fecha_creacion' => $fecha,
            ],
            [
                'sku' => 1007,
                'nombre' => 'Bálsamo Reparador',
                'descripcion' => 'Bálsamo Reparador',
                'cantidad' => 25,
                'precio' => 20.00,
                'total' => 500.00,
                'fecha_creacion' => $fecha,
            ],
            [
                'sku' => 1008,
                'nombre' => 'Crema Exfoliante Suave',
                'descripcion' => 'Crema Exfoliante Suave',
                'cantidad' => 40,
                'precio' => 33.33,
                'total' => 1333.20,
                'fecha_creacion' => $fecha,
            ],
            [
                'sku' => 1009,
                'nombre' => 'Loción Corporal Nutritiva',
                'descripcion' => 'Loción Corporal Nutritiva',
                'cantidad' => 30,
                'precio' => 55.56,
                'total' => 1666.80,
                'fecha_creacion' => $fecha,
            ],
            [
                'sku' => 1010,
                'nombre' => 'Crema Solar Protectora',
                'descripcion' => 'Crema Solar Protectora',
                'cantidad' => 22,
                'precio' => 90.00,
                'total' => 1980.00,
                'fecha_creacion' => $fecha,
            ],
        ]);
    }
}
