<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Illuminate\Validation\ValidationException;


class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                Textinput::make('nama')
                ->required(),

                TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true),
                ]);
    }
}
