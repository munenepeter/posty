<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PostIndex extends Component {

    public $post;

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

        $this->post =  Post::findorFail($id);
        $this->title = $this->post->title;
        $this->body = $this->post->body;

        $this->isEditMode = true;
        $this->showPostModal();
    }

    public function updatePost() {

        $this->validate();

        $this->post->update([
            'title' => $this->title,
            'body' => $this->body
        ]);

        $this->reset();
    }

    public function deletePost($id) {
        Post::findorFail($id)->delete();
        $this->reset();
    }

    public function render() {
        return view('livewire.post-index', [
            'posts' => Post::all()
        ]);
    }
}
