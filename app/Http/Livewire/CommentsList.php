<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comments;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CommentsList extends Component
{
    use WithPagination;
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
        session()->flash('message', 'Comment successfully added.');
    }

    /**
     * get comments data
     * @return void
     */
    public function commentsList()
    {
        return DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->select('users.name', 'comments.body', 'comments.created_at', 'comments.user_id', 'comments.id')
            ->orderBy('comments.id', 'DESC')
            ->paginate(1);
    }

    /**
     * delete data from comment table
     * @param $commentId
     * @return void
     */
    public function deleteData($commentId)
    {
        DB::table('comments')->where('id', $commentId)->delete();

        session()->flash('message', 'Comment successfully deleted.');
    }

    /**
     * render to view
     * @return view
     */
    public function render()
    {
        return view('livewire.comments-list', [
            'comments' => $this->commentsList(),
        ]);
    }
}
