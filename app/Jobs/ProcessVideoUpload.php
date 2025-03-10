<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ProcessVideoUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;
    protected $fileName;

    public function __construct($filePath, $fileName)
    {
        $this->filePath = $filePath;
        $this->fileName = $fileName;
    }

    public function handle()
    {
        // Store file temporarily
        $video = Storage::disk('local')->path($this->filePath);

        // Process the video (Example: Compressing or converting to MP4)
        $outputPath = storage_path('app/public/videos/' . $this->fileName . '.mp4');
        FFMpeg::fromDisk('local')
            ->open($video)
            ->export()
            ->toDisk('public')
            ->save('videos/' . $this->fileName . '.mp4');
        // Delete original file if needed
        Storage::disk('local')->delete($this->filePath);
    }
}
