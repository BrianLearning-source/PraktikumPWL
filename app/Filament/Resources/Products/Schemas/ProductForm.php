<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Checkbox;
use Filament\Actions\Action;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {

        return $schema
            ->components([
                Wizard::make([
                    //Step::make('Product Details')
                    Step::make('Product Info')
                    ->description('Isi informasi produk')
                    ->icon('heroicon-o-document-text')
                        ->schema([
                            Group::make([
                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('sku')
                                    ->required(),
                            ])->columns(2),
                            MarkdownEditor::make('description')  
                        ]),
                    //Step::make('Product prices)
                    Step::make('Product Price and Stock')
                     ->description('Isi harga Produk dan Stock')
                     ->icon('heroicon-o-shopping-cart')
                            ->schema([
                            Group::make([
                                   TextInput::make('price')
                                    ->numeric()->minValue(0)
                                    ->required(),
                                    TextInput::make('stock')
                                    ->numeric()->minValue(0)
                                    ->required(),
                                ])->columns(2),
                                MarkdownEditor::make('description')
                            ]),
                    //Step::make(media)
                    Step::make('Media and status')
                        ->description('Isi Gambar Produk')
                        ->icon('heroicon-o-photo')
                        ->Schema([
                            FileUpload::make('image')
                                ->disk('public')
                                ->directory('products'),
                            Checkbox::make('is_active'),
                            Checkbox::make('is_featured'),
                        ]),
                ])
                ->columnSpanFull()
                ->submitAction(
                    Action::make('save')
                        ->label('Save Product')
                        ->button()
                        ->color('primary')
                        ->submit('save')
                )
            ]);
    }
}

 // return $schema
        //     ->components([
        //         Wizard::make([
        //             Step::make('Product Details')
        //                 ->description('Isi informasi produk')
        //                 ->schema([
        //                     Group::make([
        //                         TextInput::make('name')
        //                             ->required(),
        //                         TextInput::make('sku')
        //                             ->required(),
        //                     ])->columns(2),
        //                     MarkdownEditor::make('description')       
        //                 ]),
        //             // Step::make('Product prices')
        //                 Step::make('Product Price & Stock')
        //                     ->description('Isi harga Produk dan Stock')
        //                     ->schema([
        //                     Group::make([
        //                            TextInput::make('price')
        //                             ->required(),
        //                             TextInput::make('stock')
        //                             ->required(),
        //                         ])->columns(2),
        //                         MarkdownEditor::make('description')
        //                     ]),
        //         ])
        //         ->columnSpanFull(),
        //     ]);