<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaController;

Route::get('/', function () {
    $html = '<h1>Proyecto de Consultas PHP</h1>';
    $html .= '<p>Accede a las siguientes rutas para ver los resultados de las consultas:</p>';
    $html .= '<ul>';
    $html .= '<li><a href="/consulta/2">/consulta/2</a>: Pedidos del usuario con ID 2.</li>';
    $html .= '<li><a href="/consulta/3">/consulta/3</a>: Pedidos con información del usuario.</li>';
    $html .= '<li><a href="/consulta/4">/consulta/4</a>: Pedidos con total entre $100 y $250.</li>';
    $html .= '<li><a href="/consulta/5">/consulta/5</a>: Usuarios cuyo nombre empieza con \'R\'.</li>';
    $html .= '<li><a href="/consulta/6">/consulta/6</a>: Total de pedidos del usuario con ID 5.</li>';
    $html .= '<li><a href="/consulta/7">/consulta/7</a>: Pedidos ordenados por total (descendente).</li>';
    $html .= '<li><a href="/consulta/8">/consulta/8</a>: Suma total de todos los pedidos.</li>';
    $html .= '<li><a href="/consulta/9">/consulta/9</a>: Pedido más económico.</li>';
    $html .= '<li><a href="/consulta/10">/consulta/10</a>: Pedidos agrupados por usuario.</li>';
    $html .= '</ul>';
    return $html;
});

// Rutas para las consultas
Route::get('/consulta/2', [ConsultaController::class, 'pedidosUsuario2']);
Route::get('/consulta/3', [ConsultaController::class, 'pedidosConUsuario']);
Route::get('/consulta/4', [ConsultaController::class, 'pedidosPorRangoTotal']);
Route::get('/consulta/5', [ConsultaController::class, 'usuariosConR']);
Route::get('/consulta/6', [ConsultaController::class, 'totalPedidosUsuario5']);
Route::get('/consulta/7', [ConsultaController::class, 'pedidosOrdenadosPorTotal']);
Route::get('/consulta/8', [ConsultaController::class, 'sumaTotalPedidos']);
Route::get('/consulta/9', [ConsultaController::class, 'pedidoMasEconomico']);
Route::get('/consulta/10', [ConsultaController::class, 'pedidosAgrupadosPorUsuario']);