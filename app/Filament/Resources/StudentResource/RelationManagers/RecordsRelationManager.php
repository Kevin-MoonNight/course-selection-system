<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecordsRelationManager extends RelationManager
{
    protected static string $relationship = 'records';

    protected static ?string $recordTitleAttribute = 'course.name';

    protected static ?string $title = '所有選課';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('course.id')
                    ->label('課號'),
                Tables\Columns\TextColumn::make('course.name')
                    ->label('課程'),
                Tables\Columns\TextColumn::make('grade')
                    ->label('成績'),
                Tables\Columns\TextColumn::make('course.credit')
                    ->label('學分數'),
            ]);
    }
}
