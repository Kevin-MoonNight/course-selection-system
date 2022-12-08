<?php

namespace App\Filament\Resources\CourseSelectionRecordResource\Pages;

use App\Filament\Resources\CourseSelectionRecordResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseSelectionRecord extends EditRecord
{
    protected static string $resource = CourseSelectionRecordResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('刪除'),
        ];
    }
}
