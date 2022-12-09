<?php

namespace App\Filament\Resources\CourseSelectionRecordResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseRelationManager extends RelationManager
{
    protected static string $relationship = 'course';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $title = '課程';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('課號'),
                Tables\Columns\TextColumn::make('name')
                    ->label('課名'),
                Tables\Columns\TextColumn::make('credit')
                    ->label('學分數'),
            ]);
    }
}
