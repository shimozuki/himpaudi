<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Filament::serving(function () {
            $user = auth()->user();
            $menuItems = [];

            if ($user) {
                // Add common menu items
                $menuItems[] = UserMenuItem::make()->label('Profile')->url(route('filament.profile'))->icon('heroicon-s-user');

                // Add role-specific menu items
                if ($user->hasRole('admin')) {
                    $menuItems[] = UserMenuItem::make()->label('Paut')->url(route('filament.admin.resources.paut.index'))->icon('heroicon-o-building-library');
                    $menuItems[] = UserMenuItem::make()->label('Siswa')->url(route('filament.admin.resources.siswa.index'))->icon('heroicon-o-user-group');
                    $menuItems[] = UserMenuItem::make()->label('Guru')->url(route('filament.admin.resources.guru.index'))->icon('heroicon-o-academic-cap');
                } else {
                    $menuItems[] = UserMenuItem::make()->label('Paut')->url(route('filament.user.resources.paut.index'))->icon('heroicon-o-building-library');
                    $menuItems[] = UserMenuItem::make()->label('Siswa')->url(route('filament.user.resources.siswa.index'))->icon('heroicon-o-user-group');
                    $menuItems[] = UserMenuItem::make()->label('Guru')->url(route('filament.user.resources.guru.index'))->icon('heroicon-o-academic-cap');
                }

                Filament::navigation(function ($items) use ($menuItems) {
                    return array_merge($items, $menuItems);
                });
            }
        });
    }
}
