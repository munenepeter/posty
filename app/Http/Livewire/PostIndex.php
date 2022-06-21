<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostIndex extends Component {

    public $showingPostModal = false;

    public $title;
    public $body;

    protected $rules = [
        'title' => 'required',
        'body' => 'required'
    ];
    public function showPostModal() {
        $this->showingPostModal = true;
    }

    public function storePost() {
        //create post
       $this->validate();

        Post::create([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => auth()->id
        ]);

        $this->reset();
    }

    public function render() {
        return view('livewire.post-index');
    }
}
