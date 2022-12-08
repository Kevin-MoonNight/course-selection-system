<?php

namespace App\Filament\Resources\CourseSelectionRecordResource\Pages;

use App\Filament\Resources\CourseSelectionRecordResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseSelectionRecords extends ListRecords
{
    protected static string $resource = CourseSelectionRecordResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('學生選課'),
        ];
    }
}
