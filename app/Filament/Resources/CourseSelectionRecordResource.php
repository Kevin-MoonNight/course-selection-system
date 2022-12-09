<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseSelectionRecordResource\Pages;
use App\Filament\Resources\CourseSelectionRecordResource\RelationManagers;
use App\Models\Record;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class CourseSelectionRecordResource extends Resource
{
    protected static ?string $model = Record::class;

    protected static ?string $navigationLabel = '選課作業';

    protected static ?string $navigationIcon = 'heroicon-o-inbox';
    private static ?string $sql = null;

    public static function getEloquentQuery(): Builder
    {
        if (static::$sql) {
            try {
                $sqlData = collect(DB::select(static::$sql));
                $records = Record::all()->filter(function ($value, $key) use ($sqlData) {
                    return $sqlData->contains('id', $value->id);
                });

                return $records->toQuery();
            } catch (\Exception) {
                return parent::getEloquentQuery();
            }
        } else {
            return parent::getEloquentQuery();
        }
    }

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
            ])->headerActions([
                Tables\Actions\Action::make('sql')
                    ->label('SQL查詢')
                    ->action(function (Collection $records, array $data): void {
                        static::$sql = $data['sql'];
                    })
                    ->form([
                        Forms\Components\TextInput::make('sql')
                            ->label('SQL查詢')
                            ->default('SELECT * FROM course_selection_records;')
                            ->required(),
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
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
