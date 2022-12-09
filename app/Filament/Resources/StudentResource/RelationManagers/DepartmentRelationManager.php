<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepartmentRelationManager extends RelationManager
{
    protected static string $relationship = 'department';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $title = '所屬系所';

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
                    ->label('系號'),
                Tables\Columns\TextColumn::make('name')
                    ->label('系名'),
                Tables\Columns\TextColumn::make('chair')
                    ->label('系主任'),
            ]);
    }
}
