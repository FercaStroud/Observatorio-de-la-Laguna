<?php

use Illuminate\Http\Request;

$app->post('/answers', function (Request $request) {
    //$id = $request->get('id');

    return response()->json(
        [
            'id' => 0,
            'title' => 'Economía en la Laguna',
            'details' => 'Nos gustaría saber tu opinión acerca de lo que piensas de la economía en la región laguna.',
            'questions' => [
                [
                    'id' => 0,
                    'title' => '¿Cómo consideras el crecimiento económico en Torreón?',
                    'vModel' => '*Selecciona una respuesta',
                    'answers' => [
                        [
                            'id' => 0,
                            'title' => 'No lo sé'
                        ],
                        [
                            'id' => 1,
                            'title' => 'Mucho crecimiento'
                        ],
                        [
                            'id' => 2,
                            'title' => 'Crecimiento moderado',
                        ],
                        [
                            'id' => 3,
                            'title' => 'Poco crecimiento',
                        ],
                        [
                            'id' => 4,
                            'title' => 'No ha crecido nada',
                        ],
                    ]
                ],
                [
                    'id' => 1,
                    'title' => '¿Cómo consideras el crecimiento económico en Gómez Palacio?',
                    'vModel' => '',
                    'answers' => [
                        [
                            'id' => 0,
                            'title' => 'No lo sé'
                        ],
                        [
                            'id' => 1,
                            'title' => 'Mucho crecimiento'
                        ],
                        [
                            'id' => 2,
                            'title' => 'Crecimiento moderado',
                        ],
                        [
                            'id' => 3,
                            'title' => 'Poco crecimiento',
                        ],
                        [
                            'id' => 4,
                            'title' => 'No ha crecido nada',
                        ],
                    ]
                ],
                [
                    'id' => 2,
                    'title' => '¿Cómo consideras el crecimiento económico en Lerdo?',
                    'vModel' => '',
                    'answers' => [
                        [
                            'id' => 0,
                            'title' => 'No lo sé'
                        ],
                        [
                            'id' => 1,
                            'title' => 'Mucho crecimiento'
                        ],
                        [
                            'id' => 2,
                            'title' => 'Crecimiento moderado',
                        ],
                        [
                            'id' => 3,
                            'title' => 'Poco crecimiento',
                        ],
                        [
                            'id' => 4,
                            'title' => 'No ha crecido nada',
                        ],
                    ]
                ]
            ]
        ]
    );
});
$app->post('/surveys', function (Request $request) {
    return response()->json(
        [
            [
                'id' => 0,
                'title' => 'Economía en la Laguna'
            ],
        ]
    );
});

$app->post('/documents', function () {
    return \Illuminate\Support\Facades\DB::table('app_documents')->get();
});

$app->post('/documents/delete', function (Request $request) {
    return \Illuminate\Support\Facades\DB::table('app_documents')
        ->where('id', '=', $request->get('id'))->delete();
});

$app->post('/news', function () {
    return \Illuminate\Support\Facades\DB::table('app_news')->get();
});

$app->post('/news/add', function (Request $request) {
    if (\Illuminate\Support\Facades\DB::insert('insert into app_news (text) values (?)', [$request->get('text')])) {
        return response()->json(['success' => true]);

    }
});

$app->post('/news/delete', function (Request $request) {
    return \Illuminate\Support\Facades\DB::table('app_news')
        ->where('id', '=', $request->get('id'))->delete();
});

$app->post('/posts', function (Request $request) {
    switch ($request->get('postType')) {
        case "BLOG":
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
                ->where("w47fa_posts.post_type", "LIKE", "post")
                ->orderBy('post_date', 'desc')->get();
            break;
        case 'PERCEPCION':
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
                ->where("w47fa_posts.post_type", "=", "attachment")
                ->where("w47fa_posts.post_title", "LIKE", '%percepcion%')
                ->orderBy('post_date', 'desc')->get();

            break;
        case 'INDICADORES':
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
                ->where("w47fa_posts.post_type", "=", "attachment")
                ->where("w47fa_posts.post_title", "LIKE", '%INDICADOR%')
                ->orderBy('post_date', 'desc')->get();

            break;
    }
});
