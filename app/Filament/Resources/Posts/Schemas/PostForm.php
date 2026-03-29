<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use Filament\Schemas\Components\Group;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema

->components([
            //section 1 - post details
            Section::make("Post Details")
            -> description("Fill in the details of the post")
            // -> icon(Heroicon::Rockerlaunch)
            -> icon('heroicon-o-document-text')
            ->schema([
                //grouping fiels into 2 colums
                Group::make([
                TextInput::make("title"),
                Textinput::make("slug"),
                Select::make("category_id")
                ->relationship("category", "name")
                ->preload()
                ->searchable(),
                ColorPicker::make("color"),
                ])->columns(2),
                
                MarkdownEditor::make("content"),
            ])->columnSpan(2),

            //Grouping fields into 2 columns
            Group::make([

                // section 2 - Image
                Section::make("Image upload")
                ->icon('heroicon-o-photo')
                ->schema([
                    FileUpload::make("image")
                    ->disk("public")
                    ->directory("posts"),
                ]),
            

            //section 3 - meta
                Section::make("Meta Information")
                ->icon('heroicon-o-archive-box')
                ->schema([
                    TagsInput::make("tags"),
                    Checkbox::make("published"),
                    DateTimePicker::make("published_at"),
                ]),
                ])->columnSpan(1),
            ])->columns(3);


        
// ->components([
//             //section 1 - post details
//             Section::make("Post Details")
//             -> description("Fill in the details of the post")
//             // -> icon(Heroicon::Rockerlaunch)
//             -> icon('heroicon-o-document-text')
//             ->schema([
//                 //grouping fiels into 2 colums
//                 Group::make([
//                 TextInput::make("title"),
//                 Textinput::make("slug"),
//                 Select::make("category_id")
//                 ->relationship("category", "name")
//                 ->preload()
//                 ->searchable(),
//                 ColorPicker::make("color"),
//                 ])->columns(2),
                
//                 MarkdownEditor::make("content"),
//             ])->columnSpan(2),

//             //Grouping fields into 2 columns
//             Group::make([

//                 // section 2 - Image
//                 Section::make("Image upload")
//                 ->schema([
//                     FileUpload::make("image")
//                     ->disk("public")
//                     ->directory("posts"),
//                 ]),
            

//             //section 3 - meta
//                 Section::make("Meta Information")
//                 ->schema([
//                     TagsInput::make("tags"),
//                     Checkbox::make("published"),
//                     DateTimePicker::make("published_at"),
//                 ]),
//                 ])->columnSpan(1),
//             ])->columns(3);

            


// ->components([
//             //section 1 - post details
//             Section::make("Post Details")
//             -> description("Fill in the details of the post")
//             // -> icon(Heroicon::Rockerlaunch)
//             -> icon('heroicon-o-document-text')
//             ->schema([
//                 TextInput::make("title"),
//                 Textinput::make("slug"),
//                 Select::make("category_id")
//                 ->relationship("category", "name")
//                 ->preload()
//                 ->searchable(),
//                 ColorPicker::make("color"),
//                 MarkdownEditor::make("content"),
//             ])->columnSpan(2),

//             //Grouping fields into 2 columns
//             Group::make([

//                 // section 2 - Image
//                 Section::make("Image upload")
//                 ->schema([
//                     FileUpload::make("image")
//                     ->disk("public")
//                     ->directory("posts"),
//                 ]),
            

//             //section 3 - meta
//                 Section::make("Meta Information")
//                 ->schema([
//                     TagsInput::make("tags"),
//                     Checkbox::make("published"),
//                     DateTimePicker::make("published_at"),
//                 ]),
//                 ])->columnSpan(1),
//             ])->columns(3);

            // ->components([
            // //section 1 - post details
            // Section::make("Post Details")
            // -> description("Fill in the details of the post")
            // // -> icon(Heroicon::Rockerlaunch)
            // -> icon('heroicon-o-document-text')
            // ->schema([
            //     TextInput::make("title"),
            //     Textinput::make("slug"),
            //     Select::make("category_id")
            //     ->relationship("category", "name")
            //     ->preload()
            //     ->searchable(),
            //     ColorPicker::make("color"),
            //     MarkdownEditor::make("content"),
            // ]),

            // //Grouping fields into 2 columns
            // Group::make([

            //     // section 2 - Image
            //     Section::make("Image upload")
            //     ->schema([
            //         FileUpload::make("image")
            //         ->disk("public")
            //         ->directory("posts"),
            //     ]),
            

            // //section 3 - meta
            //     Section::make("Meta Information")
            //     ->schema([
            //             TagsInput::make("tags"),
            //             Checkbox::make("published"),
            //     ])->columns(2),

            //  DateTimePicker::make("published_at"),
            // ]),
            // ])->columns(2);

            


            // ->components([
            // //section 1 - post details
            // Section::make("Post Details")
            // -> description("Fill in the details of the post")
            // // -> icon(Heroicon::Rockerlaunch)
            // -> icon('heroicon-o-document-text')
            // ->schema([
            //     TextInput::make("title"),
            //     Textinput::make("slug"),
            //     Select::make("category_id")
            //     ->relationship("category", "name")
            //     ->preload()
            //     ->searchable(),
            //     ColorPicker::make("color"),
            //     MarkdownEditor::make("content"),
            // ])->columnSpanFull(),

            // // section 2 - Image
            //     Section::make("Image upload")
            //     ->schema([
            //         FileUpload::make("image")
            //         ->disk("public")
            //         ->directory("posts"),
            //     ]),

            // //section 3 - meta
            //     Section::make("Meta Information")
            //     ->schema([
            //             TagsInput::make("tags"),
            //             Checkbox::make("published"),
            //             DateTimePicker::make("published_at"),
            //     ])

            // ->components([
            //     // section 1 - post details
            //     Section::make("Post Details")
            //     ->Description("Fill in the details of the posts")
            //     // -> icon(Heroicon::RocketLaunch)
            //     -> icon('heroicon-o-document-text')
            //     ->schema([
            //         TextInput::make("title"),
            //         TextInput::make("slug"),
            //         Select::make('category_id')
            //         ->relationship('category', 'name')
            //         ->preload()
            //         ->searchable(),
            //          ColorPicker::make('color'),
            //         MarkdownEditor::make('content'),
            //     ]),
                
            //     //section 2 - Image
            //     Section::make("Image upload")
            //     ->schema([
            //         FileUpload::make("image")
            //         ->disk("public")
            //         ->directory("posts"),
            //     ]),

            //     //section 3 - meta
            //     Section::make("Meta Information")
            //     ->schema([
            //             TagsInput::make("tags"),
            //             Checkbox::make("published"),
            //             DateTimePicker::make("published_at"),
            //     ])
                
                // RichEditor::make('content'),
                // FileUpload::make('image')
                // ->disk('public')
                // ->directory('posts'),
                // TagsInput::make('tags'),
                // Checkbox::make('published'),
                // DateTimePicker::make('published_at'),
            
    }
}
