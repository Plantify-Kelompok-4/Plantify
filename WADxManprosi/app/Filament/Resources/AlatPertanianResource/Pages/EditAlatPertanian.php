<?php

namespace App\Filament\Resources\AlatPertanianResource\Pages;

use App\Filament\Resources\AlatPertanianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlatPertanian extends EditRecord
{
    protected static string $resource = AlatPertanianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
