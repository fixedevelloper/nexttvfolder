<?php

namespace App\Livewire;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class PageImage extends Component
{
    use WithFileUploads;
    public $image;
    public $selectImage;

    public function updatedImage(){
        $image_from = $this->image->store('products', ['disk' => 'public']);
        $img=new Image();
        $img->name=$this->image->getClientOriginalName();
        $img->src=$image_from;
        $img->save();
    }
    public function uploaded(){
        $this->validate([
            'image'=>'image|max:1024'
        ]);
        $image_from = $this->image->store('products', ['disk' => 'public']);
        $img=new Image();
        $img->name=$this->image->getClientOriginalName();
        $img->src=$image_from;
        $img->save();
    }


    public function selected($image)
    {
        $this->selectImage=$image;
    }
    public function render()
    {
        return view('livewire.page-image',[
            'images'=>Image::all()
        ]);
    }
}
