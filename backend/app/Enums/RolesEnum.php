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
        $manage_users = __('profile.role_manageUsers');
        $manage_settings = __('profile.role_manageSettings');
        $manage_homes = __('profile.role_manageHomes');
        $manage_bookings = __('profile.role_manageBookings');

        return match($this) {
            self::ADMIN => array(
                $manage_users,
                $manage_settings,
                $manage_homes,
                $manage_bookings,
            ),
            self::MANAGER => array(
                $manage_settings,
                $manage_homes,
                $manage_bookings,
            ),
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