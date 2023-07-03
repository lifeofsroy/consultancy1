<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class FrontNoticeDetail extends Component
{
    public $notice_slug;

    public function mount($notice_slug)
    {
        $this->notice_slug = $notice_slug;
    }

    public function export()
    {
        $file = Notice::where('slug', $this->notice_slug)->first();
        return Storage::disk('public')->download($file->doc);
    }

    public function render()
    {
        $notice = Notice::where('slug', $this->notice_slug)->first();

        return view('livewire.front-notice-detail', [
            'notice' => $notice,
        ]);
    }
}
