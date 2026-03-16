<?php

namespace App\Livewire\Admin\File;

use Livewire\Component;

use Livewire\WithFileUploads;
use App\Models\File;
use App\Models\FileItem;
use Illuminate\Support\Str;

class FileUpload extends Component
{
    use WithFileUploads;

    public $files = []; // multiple files
    public $fileName = '';
    public $fileCaption = '';
    public $fileType = '';
    public $uploadedFiles = []; // for preview
    

    public function updatedFiles()
    {
        foreach ($this->files as $file) {
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $type = $file->getMimeType();

            // Save main file record
            $fileRecord = File::create([
                'name' => $originalName,
                'caption' => $this->fileCaption,
                'type' => explode('/', $type)[0], // image, video, audio, etc
                'extension' => $extension
            ]);

            // Store file physically
            $path = $file->store('uploads/' . $fileRecord->id, 'public');

            // Save file item
            $fileItem = FileItem::create([
                'file_id' => $fileRecord->id,
                'type' => 'original',
                'size' => $file->getSize(),
                'path' => $path
            ]);

            // Add to preview array
            $this->uploadedFiles[] = [
                'id' => $fileRecord->id,
                'name' => $originalName,
                'path' => $path,
                'type' => $fileRecord->type
            ];
        }

        // Reset the file input
        $this->reset('files', 'fileCaption');
    }

    public function render()
    {
        return view('livewire.admin.file.file-upload');
    }
}
