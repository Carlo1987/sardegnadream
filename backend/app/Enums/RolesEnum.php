<?php

namespace App\Enums;

enum RolesEnum: int
{
    case ADMIN = 1;
    case MANAGER = 2;

    public function name(): string
    {
        return match($this) {
            self::ADMIN => __('profile.role_admin'),
            self::MANAGER => __('profile.role_manager'),
        };
    }

    public function description(): Array
    {
        return match($this) {
            self::ADMIN => array(
                __('profile.role_manageSystem'),
                __('profile.role_manageSettings'),
                __('profile.role_manageBookings'),
            ),
            self::MANAGER => array(
                __('profile.role_manageBookings'),
            )
        };
    }

    public static function getDatasSelect(): array
    {
        return collect(self::cases())->mapWithKeys(function (self $role) {
            return [ $role->value => $role->name() ];
        })->toArray();
    }

    public static function getAllDatas(): array
    {
        return collect(self::cases())->mapWithKeys(function (self $role) {
            return [
                $role->value => [
                    'name' => $role->name(),
                    'description' => $role->description(),
                ],
            ];
        })->toArray();
    }
}