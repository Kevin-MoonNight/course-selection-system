<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

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

    protected static ?string $recordTitleAttribute = 'student.name';

    protected static ?string $title = '所有選課學生';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.id')
                    ->label('學號'),
                Tables\Columns\TextColumn::make('student.name')
                    ->label('姓名'),
                Tables\Columns\TextColumn::make('student.department.name')
                    ->label('科系'),
                Tables\Columns\TextColumn::make('grade')
                    ->label('分數'),
            ]);
    }
}
