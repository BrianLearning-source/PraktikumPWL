<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Textinput::make('name')
                ->required()
                ->maxLength(225),
                TextInput::make('email')
                ->email()
                ->required()
                ->unique(ignoreRecord: true), // TUGAS: Email harus unik
                Textinput::make('password')
                ->password()
                ->required(fn ($context) => $context === 'create')
                ->minLength(6) // TUGAS: Password minimal 6 karakter
                ->revealable(),
            ]);
    }
}
