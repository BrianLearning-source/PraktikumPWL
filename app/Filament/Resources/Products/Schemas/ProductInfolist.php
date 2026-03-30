<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;


class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Product Tabs')
                    ->tabs([
                        Tab::make('Product Details')
                            ->badge('Info')
                            ->badgeColor('info')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Product Name')
                                    ->weight('bold')
                                    ->color('primary'),

                                TextEntry::make('id')
                                    ->label('Product ID'),

                                TextEntry::make('sku')
                                    ->label('Product SKU')
                                    ->badge()
                                    ->color('success'),

                                TextEntry::make('description')
                                    ->label('Product Description'),

                                TextEntry::make('created_at')
                                    ->label('Product Creation Date')
                                    ->date('d M Y')
                                    ->color('info'),
                        ])->columnSpanFull(),
                
                        Tab::make('Product Price and Stock')
                            ->badge(fn ($record) => $record->stock) // Menampilkan angka stok di judul tab
                            ->badgeColor(fn ($record) => match (true) {
                                $record->stock <= 5 => 'danger',
                                $record->stock <= 20 => 'warning',
                                default => 'success',
                    })
                            ->schema([
                                TextEntry::make('price')
                                    ->label('Product Price')
                                    ->weight('bold')
                                    ->color('primary')
                                    ->icon('heroicon-s-currency-dollar'),
                                    // ->formatStateUsing(fn ($state) => 'Rp ' . number_format((float) $state, 0, ',', '.')),
                                    
                                TextEntry::make('stock')
                                    ->label('Product Stock')
                                    ->badge()
                                    ->color(fn (int $state): string => match (true) {
                                        $state <= 5 => 'danger',   // Stok kritis (0-5)
                                        $state <= 20 => 'warning', // Stok menipis (6-20)
                                        default => 'success',      // Stok aman (>20),
                                    })
                        ])->columnSpanFull(),

                        Tab::make('Image and Status')
                            ->badge('Active')
                            ->badgeColor('success')
                                ->schema([
                                    ImageEntry::make('image')
                                        ->label('Product Image')
                                        ->disk('public'),
                                    TextEntry::make('price')
                                        ->label('Product Price')
                                        ->weight('bold')
                                        ->color('primary')
                                        ->icon('heroicon-s-currency-dollar')
                                        ->formatStateUsing(fn ($state) => 'Rp ' . number_format((float) $state, 0, ',', '.')),

                                    TextEntry::make('stock')
                                        ->label('Product Stock')
                                        ->weight('bold')
                                        ->color('primary')
                                        ->icon('heroicon-o-truck'),
                                    IconEntry::make('is_active')
                                        ->label('Is Active?')
                                        ->boolean(),
                                    IconEntry::make('is_featured')
                                        ->label('Is Featured?')
                                        ->boolean(),
                                ])
                        ])->columnSpanFull(),
                        // ->vertical(),
                    ]);
    }
}

//              Section::make('Product info')
//                     ->description('')
//                     ->schema([
//                         TextEntry::make('name')
//                             ->label('Product Name')
//                             ->weight('bold')
//                             ->color('primary'),

//                         TextEntry::make('id')
//                             ->label('Product ID'),

//                         TextEntry::make('sku')
//                             ->label('Product SKU')
//                             ->badge()
//                             ->color('danger'),

//                         TextEntry::make('description')
//                             ->label('Product Description'),

//                         TextEntry::make('created_at')
//                             ->label('Product Creation Date')
//                             ->date('d M Y')
//                             ->color('info'),
//                     ])
//                 ->columnSpanFull(),


//                 Section::make('Product Price and Stock')
//                     ->description('')
//                     ->schema([
//                         TextEntry::make('price')
//                             ->label('Product Price')
//                             ->weight('bold')
//                             ->color('primary')
//                             ->icon('heroicon-s-currency-dollar')
//                             ->formatStateUsing(fn ($state) => 'Rp ' . number_format((float) $state, 0, ',', '.')),
                            
//                         TextEntry::make('stock')
//                             ->label('Product Stock')
//                             ->icon('heroicon-o-truck'),
//                     ])
//                 ->columnSpanFull(),


                // Section::make('Image and Status')
                //                     ->description('')
                //                         ->schema([
                //                             ImageEntry::make('image')
                //                                 ->label('Product Image')
                //                                 ->disk('public'),
                //                             TextEntry::make('price')
                //                                 ->label('Product Price')
                //                                 ->weight('bold')
                //                                 ->color('primary')
                //                                 ->icon('heroicon-s-currency-dollar')
                //                                 ->formatStateUsing(fn ($state) => 'Rp ' . number_format((float) $state, 0, ',', '.')),

                //                             TextEntry::make('stock')
                //                                 ->label('Product Stock')
                //                                 ->weight('bold')
                //                                 ->color('primary')
                //                                 ->icon('heroicon-o-truck'),
                //                             IconEntry::make('is_active')
                //                                 ->label('Is Active?')
                //                                 ->boolean(),
                //                             IconEntry::make('is_featured')
                //                                 ->label('Is Featured?')
                //                                 ->boolean(),
                //                         ])
                //                 ->columnSpanFull(),