<?php

namespace App\Filament\Resources\Galleries\Pages;

use App\Filament\Resources\Galleries\GalleryResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Model;

class CreateGallery extends CreateRecord
{
    protected static string $resource = GalleryResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $files = is_array($data['file_path']) ? $data['file_path'] : [$data['file_path']];
        $firstRecord = null;

        foreach ($files as $file) {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $videoExtensions = ['mp4', 'mov', 'avi', 'mkv', 'webm'];
            $type = in_array(strtolower($extension), $videoExtensions) ? 'video' : 'image';

            $record = Gallery::create([
                'title' => $data['title'],
                'category' => $data['category'],
                'type' => $type,
                'file_path' => $file,
                // OTOMATIS: Jika foto, pakai filenya sendiri. Jika video, null dulu (diedit nanti).
                'thumbnail' => ($type === 'image') ? $file : null,
                'user_id' => auth()->id(),
            ]);

            if (!$firstRecord) $firstRecord = $record;
        }

        return $firstRecord;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}