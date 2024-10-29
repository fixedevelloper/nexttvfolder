<?php

namespace App\Livewire;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PageImage extends Component
{
    use WithFileUploads;

    public $image;
    public $audio;
    public $video;
    public $selectImage;
    public $directories = [];
    public $show = true;
    public $show_audio = false;
    public $show_video = false;
    public $directory;

    public function mount()
    {
        $this->directory = Storage::disk('public')->get('/');
    }

    public function updatedImage()
    {
        logger('pouut');
        $image_from = $this->image->store('images', ['disk' => 'public']);
        $img = new Image();
        $img->name = $this->image->getClientOriginalName();
        $img->type = 'IMAGE';
        $img->src = $image_from;
        $img->save();
    }

    public function updatedAudio()
    {
        logger('pouut');
        $image_from = $this->audio->store('audios', ['disk' => 'public']);
        $img = new Image();
        $img->name = $this->audio->getClientOriginalName();
        $img->src = $image_from;
        $img->type = 'AUDIO';
        $img->save();
    }

    public function updatedVideo()
    {
        $image_from = $this->video->store('videos', ['disk' => 'public']);
        $img = new Image();
        $img->name = $this->video->getClientOriginalName();
        $img->src = $image_from;
        $img->type = 'VIDEO';
        $img->save();
    }

    public function uploaded()
    {
        $this->validate([
            'image' => 'image|max:1024'
        ]);
        $image_from = $this->image->store('products', ['disk' => 'public']);
        $img = new Image();
        $img->name = $this->image->getClientOriginalName();
        $img->src = $image_from;
        $img->save();
    }

    public function displayCard($type)
    {
        if ($type == 'image') {
            $this->show = true;
            $this->show_audio = false;
            $this->show_video = false;
        } elseif ($type == 'audio') {
            $this->show = false;
            $this->show_audio = true;
            $this->show_video = false;
        } elseif ($type == 'video') {
            $this->show = false;
            $this->show_audio = false;
            $this->show_video = true;
        }
    }

    public function selectDirectories()
    {

        if (!Storage::disk('public')->exists($this->directory)) {
            $this->directory = Storage::disk('public');
        }
        $this->directories = Storage::disk('public')->allDirectories($this->directory);
        logger($this->directories);
    }

    public function selectOneDirectory($dir)
    {
        $this->show = false;
        if (!Storage::disk('public')->exists($dir)) {
            $this->directory = Storage::disk('public')->makeDirectory($dir);
        }
        $this->directories = Storage::disk('public')->allDirectories($this->directory);
        logger($this->directories);
    }

    public function selected($image)
    {
        $this->selectImage = $image;
    }

    public function render()
    {
        return view('livewire.page-image', [
            'images' => Image::query()->where(['type' => 'IMAGE'])->get(),
            'audios' => Image::query()->where(['type' => 'AUDIO'])->get(),
            'videos' => Image::query()->where(['type' => 'VIDEO'])->get()
        ]);
    }
}
