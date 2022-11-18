<?php

namespace App\Enums;

enum AvailableStatus: string
{
    case Activo = 'activo';
    case Bloqueado = 'bloqueado';
    case Suspendido = 'suspendido';
    case Vacaciones = 'vacaciones';
    
}