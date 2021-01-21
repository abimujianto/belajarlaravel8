<?php

namespace App\Http\Livewire;

use Livewire\Component;
// import model postsnya
use App\Models\Post;


class Posts extends Component
{
    // bikin public $posts agar view posts bisa akses variable posts yang sudah dibuat 
    public $posts;
    public $isOpen = 0;
    public $postId,$title,$description;
    public function render()
    {
        // mengembalikan nilai variable dengan mengisiakan Model::all()
        // yaitu semua data dari db di masukkan di model Post 
        $this->posts = Post::all();
        return view('livewire.posts');
    }
    public function showModal(){
        $this->isOpen = true;
    }
    public function hideModal(){
        $this->isOpen = false;
    }

    //untuk ngrim data
    public function store(){
        $this->validate(
            [
                'title'=> 'required',
                'description' => 'required'
            ]
            );

            Post::updateOrCreate(['id'=>$this->postId],[
                'title' => $this->title,
                'description' => $this->description
            ]);
            $this->hideModal();

            $this->postId = '';
            $this->title = '';
            $this->description = '';
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        $this->postId = $id;
        $this->title = $post->title;
        $this->description = $post->description;

        $this->showModal();
    }
    public function delete($id){
        Post::find($id)->delete();
    }
}
