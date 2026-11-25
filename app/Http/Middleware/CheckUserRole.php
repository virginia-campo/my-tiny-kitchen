<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // SI EL USUARIO NO ESTA REGISTRADO LO LLEVAMOS AL LOGIN
        if (! $request->user()) {
            return redirect()->route('login');
        }

        // Si la ruta no especifica roles ('role'), 
        // cargamos automáticamente todos los del Enum
        if (empty($roles)) {
            $roles = array_column(UserRole::cases(), 'value');
        }

        if (! in_array($request->user()->role->value, $roles, true)) {
            abort(403, 'No tienes permisos para acceder a esta área.');
        }

        return $next($request);
    }
}
/*
¿Cómo lo usarías ahora?
Cualquier rol válido (dinámico): ->middleware(['auth', 'role']) (sin parámetros, toma todos los roles del Enum).
Roles específicos: ->middleware(['auth', 'role:admin,chef']) (solo permite esos dos).
*/