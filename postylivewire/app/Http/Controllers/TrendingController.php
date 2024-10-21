<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\CommentLike;

class TrendingController extends Controller
{
    public function index()
    {
        //getting the comment ids with likes greater than or equal to 5
        $trendingPosts = [];
        $commentLikesTable = CommentLike::with('comment')->get();
        $commentIds = [];
        foreach ($commentLikesTable as $commentLikes) {
            if (in_array($commentLikes->comment_id, $commentIds)) {
                // dd('id already in array');
                continue;
            } else {
                array_push($commentIds, $commentLikes->comment_id);
                $comment = CommentLike::with('comment')->where('comment_id', '=', $commentLikes->comment_id)->get();
                if ($comment->count() >= 4) {
                    $postId = Comment::with('user', "comment_likes", "replies")->where('id', $commentLikes->comment_id)->get('post_id');
                    $post = Post::find($postId);
                    // dd($post);
                    in_array($post, $trendingPosts) ?: array_push($trendingPosts, $post);
                    // dd($trendingPosts);  
                }
            }
        }
        // dd($trendingPosts);



        return view("trending.index", ['trendingPosts' => $trendingPosts]);
    }
}
