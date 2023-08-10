<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comments;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CommentsList extends Component
{
    public $comments;
    public $newComment;


    /**
     * store the comments to comments table
     * @return void
     */
    public function addComment()
    {
        $this->validate(['newComment' => 'required']);

        Comments::create(['body' => $this->newComment, 'user_id' => 1]);

        $this->newComment = '';
    }

    /**
     * get comments data
     * @return void
     */
    public function commentsList()
    {
        return DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->select('users.name', 'comments.body', 'comments.created_at', 'comments.user_id')
            ->orderBy('comments.id', 'DESC')
            ->get();
    }

    /**
     * render to view
     * @return view
     */
    public function render()
    {
        $this->comments = $this->commentsList();

        return view('livewire.comments-list');
    }
}
