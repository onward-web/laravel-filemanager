<?php

namespace UniSharp\LaravelFilemanager\Controllers;

use Illuminate\Support\Facades\Storage;

class DownloadController extends LfmController
{
    public function getDownload()
    {
        $file = $this->lfm->setName(request('file'));

        if (!Storage::disk($this->helper->getDisk())->exists($file->path('storage'))) {
            abort(404);
        }

        return response()->download($file->path('absolute'));
    }
}
