<?php

namespace App\Filament\Admin\Resources\PictureResource\Pages;

use App\Filament\Admin\Resources\PictureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPicture extends EditRecord
{
    protected static string $resource = PictureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
