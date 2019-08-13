<?php

use Illuminate\Http\Request;

$app->post('/posts', function (Request $request){
    $postType = "";
    switch ($request->get('postType')){
        case "BLOG":
            $postType = "post";
            break;
    }

    return \Illuminate\Support\Facades\DB::table('w47fa_posts')
        ->select(
            "w47fa_posts.ID AS post_id",
            "w47fa_users.display_name AS post_author",
            "w47fa_posts.post_title",
            "w47fa_posts.post_content",
            "w47fa_posts.post_date",
            "w47fa_posts.guid as post_url",
            "w47fa_posts.post_type",
            "w47fa_posts.post_mime_type"
        )->join("w47fa_users", "w47fa_posts.post_author", '=', "w47fa_users.ID")
        ->where("w47fa_posts.post_status", "LIKE", "publish")
        ->where("w47fa_posts.post_type", "LIKE", $postType)
        ->orderBy('post_date', 'desc')->get();
        //->whereIn('w47fa_posts.post_type', array( 'post', 'attachment' ))->get()->toJson();
});
