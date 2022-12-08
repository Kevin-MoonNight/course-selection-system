<?php

namespace App\Filament\Resources\CourseSelectionRecordResource\Pages;

use App\Filament\Resources\CourseSelectionRecordResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCourseSelectionRecord extends CreateRecord
{
    protected static string $resource = CourseSelectionRecordResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
