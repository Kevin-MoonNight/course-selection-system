<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseSelectionRecordResource\Pages;
use App\Filament\Resources\CourseSelectionRecordResource\RelationManagers;
use App\Models\Record;
use Exception;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class CourseSelectionRecordResource extends Resource
{
    protected static ?string $model = Record::class;

    protected static ?string $navigationLabel = '選課作業';

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('student_id')
                    ->label('學生')
                    ->relationship('student', 'name'),
                Select::make('course_id')
                    ->label('課程')
                    ->relationship('course', 'name'),
                Forms\Components\TextInput::make('grade')
                    ->label('分數')
                    ->default(0)
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student_id')
                    ->label('學號'),
                Tables\Columns\TextColumn::make('student.name')
                    ->label('姓名'),
                Tables\Columns\TextColumn::make('course.name')
                    ->label('課名'),
                Tables\Columns\TextColumn::make('grade')
                    ->label('成績'),
            ])
            ->filters([
                Tables\Filters\Filter::make('sql')
                    ->label('SQL查詢')
                    ->form([
                        Forms\Components\TextInput::make('sql')
                            ->label('SQL查詢')
                            ->default('')
                            ->required(),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        if ($data['sql']) {
                            try {
                                $sqlData = collect(DB::select($data['sql']));

                                return $query->whereIn('id', $sqlData->pluck('id'));
                            } catch (Exception $e) {
                            }
                        }

                        return $query;
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('修改'),
                Tables\Actions\DeleteAction::make()
                    ->label('刪除'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->label('刪除所有'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CourseRelationManager::class,
            RelationManagers\StudentRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourseSelectionRecords::route('/'),
            'create' => Pages\CreateCourseSelectionRecord::route('/create'),
            'edit' => Pages\EditCourseSelectionRecord::route('/{record}/edit'),
        ];
    }
}
