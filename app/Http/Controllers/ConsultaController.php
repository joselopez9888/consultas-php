<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    /**
     * 2. Recupera todos los pedidos asociados al usuario con ID 2.
     */
    public function pedidosUsuario2()
    {
        $pedidos = DB::table('pedidos')
                    ->where('id_usuario', 2)
                    ->get();
        return response()->json($pedidos);
    }

    /**
     * 3. Obtén la información detallada de los pedidos, incluyendo el nombre y correo electrónico de los usuarios.
     */
    public function pedidosConUsuario()
    {
        $pedidos = DB::table('pedidos')
                    ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
                    ->select('pedidos.*', 'usuarios.nombre', 'usuarios.correo')
                    ->get();
        return response()->json($pedidos);
    }

    /**
     * 4. Recupera todos los pedidos cuyo total esté en el rango de $100 a $250.
     */
    public function pedidosPorRangoTotal()
    {
        $pedidos = DB::table('pedidos')
                    ->whereBetween('total', [100, 250])
                    ->get();
        return response()->json($pedidos);
    }

    /**
     * 5. Encuentra todos los usuarios cuyos nombres comiencen con la letra "R".
     */
    public function usuariosConR()
    {
        $usuarios = DB::table('usuarios')
                    ->where('nombre', 'like', 'R%')
                    ->get();
        return response()->json($usuarios);
    }

    /**
     * 6. Calcula el total de registros en la tabla de pedidos para el usuario con ID 5.
     */
    public function totalPedidosUsuario5()
    {
        $total = DB::table('pedidos')
                   ->where('id_usuario', 5)
                   ->count();
        return response()->json(['total_pedidos_usuario_5' => $total]);
    }

    /**
     * 7. Recupera todos los pedidos junto con la información de los usuarios, ordenándolos de forma descendente según el total del pedido.
     */
    public function pedidosOrdenadosPorTotal()
    {
        $pedidos = DB::table('pedidos')
                    ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
                    ->select('pedidos.*', 'usuarios.nombre', 'usuarios.correo')
                    ->orderByDesc('total')
                    ->get();
        return response()->json($pedidos);
    }

    /**
     * 8. Obtén la suma total del campo "total" en la tabla de pedidos.
     */
    public function sumaTotalPedidos()
    {
        $sumaTotal = DB::table('pedidos')->sum('total');
        return response()->json(['suma_total_pedidos' => $sumaTotal]);
    }

    /**
     * 9. Encuentra el pedido más económico, junto con el nombre del usuario asociado.
     */
    public function pedidoMasEconomico()
    {
        $pedido = DB::table('pedidos')
                    ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
                    ->select('pedidos.*', 'usuarios.nombre')
                    ->orderBy('total', 'asc')
                    ->first();
        return response()->json($pedido);
    }

    /**
     * 10. Obtén el producto, la cantidad y el total de cada pedido, agrupándolos por usuario.
     * (Esta consulta es un poco ambigua, la interpretaré como "mostrar todos los pedidos agrupados por usuario")
     */
    public function pedidosAgrupadosPorUsuario()
    {
        $pedidos = DB::table('pedidos')
            ->join('usuarios', 'pedidos.id_usuario', '=', 'usuarios.id')
            ->select('usuarios.nombre', 'pedidos.producto', 'pedidos.cantidad', 'pedidos.total')
            ->orderBy('usuarios.nombre')
            ->get()
            ->groupBy('nombre'); // Agrupamos la colección resultante

        return response()->json($pedidos);
    }
}