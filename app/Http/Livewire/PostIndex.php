<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PostIndex extends Component {

    public $showingPostModal = false;
    public $isEditMode = false;

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
            'user_id' => Auth::id()
        ]);

        $this->reset();
    }

    public function showEditPostModal($id) {

        $post =  Post::findorFail($id);
        
        $this->isEditMode = true;
        
        $this->title = $post->title;
        $this->body = $post->body;

        $this->showPostModal();
    }

    public function render() {
        return view('livewire.post-index', [
            'posts' => Post::all()
        ]);
    }
}
