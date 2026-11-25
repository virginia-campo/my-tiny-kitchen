<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case CHEF = 'chef';
    case COOK = 'cook';

    // Opcional: Métodos helpers dentro del Enum
    public function label(): string
    {
        return match($this) {
            self::ADMIN => 'Administrador',
            self::CHEF => 'Chef (Creador)',
            self::COOK => 'Cocinero (Lector)',
        };
    }
}



