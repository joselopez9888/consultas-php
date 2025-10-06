<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosPedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar Usuarios
        DB::table('usuarios')->insert([
            ['nombre' => 'Carlos Gonzalez', 'correo' => 'carlos@example.com', 'telefono' => '1111-1111'],
            ['nombre' => 'Roberto Martinez', 'correo' => 'roberto@example.com', 'telefono' => '2222-2222'],
            ['nombre' => 'Ana Lopez', 'correo' => 'ana@example.com', 'telefono' => '3333-3333'],
            ['nombre' => 'Ricardo Sanchez', 'correo' => 'ricardo@example.com', 'telefono' => '4444-4444'],
            ['nombre' => 'Lucia Fernandez', 'correo' => 'lucia@example.com', 'telefono' => '5555-5555'],
        ]);

        // Insertar Pedidos
        DB::table('pedidos')->insert([
            // Pedidos para el usuario 1
            ['id_usuario' => 1, 'producto' => 'Laptop', 'cantidad' => 1, 'total' => 1200.50],
            ['id_usuario' => 1, 'producto' => 'Mouse', 'cantidad' => 2, 'total' => 50.75],

            // Pedidos para el usuario 2
            ['id_usuario' => 2, 'producto' => 'Teclado', 'cantidad' => 1, 'total' => 80.00],
            ['id_usuario' => 2, 'producto' => 'Monitor', 'cantidad' => 1, 'total' => 250.00],

            // Pedidos para el usuario 3
            ['id_usuario' => 3, 'producto' => 'Impresora', 'cantidad' => 1, 'total' => 150.00],

            // Pedidos para el usuario 4
            ['id_usuario' => 4, 'producto' => 'Webcam', 'cantidad' => 3, 'total' => 180.00],
            ['id_usuario' => 4, 'producto' => 'Hub USB', 'cantidad' => 1, 'total' => 25.50],

            // Pedidos para el usuario 5
            ['id_usuario' => 5, 'producto' => 'Silla Gamer', 'cantidad' => 1, 'total' => 300.00],
            ['id_usuario' => 5, 'producto' => 'Alfombrilla', 'cantidad' => 2, 'total' => 20.00],
            ['id_usuario' => 5, 'producto' => 'Auriculares', 'cantidad' => 1, 'total' => 120.00],
        ]);
    }
}