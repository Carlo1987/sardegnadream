<?php

namespace App\Enums;

enum RolesEnum: int
{
    case ADMIN = 1;
    case MANAGER = 2;

    public function name(): string
    {
        return match($this) {
            self::ADMIN => 'Amministratore',
            self::MANAGER => 'Gestore',
        };
    }

    public function description(): string
    {
        return match($this) {
            self::ADMIN => array(
                'Ha il controllo completo del sistema.',
                'Può modificare le impostazioni generali del sito.',
                'Gestisce prenotazioni, tariffe, pagamenti, recensioni.',
            ),
            self::MANAGER => array(
                'Gestisce prenotazioni, tariffe, pagamenti, recensioni.',
            )
        };
    }
}