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
    return \Illuminate\Support\Facades\DB::table('app_surveys')->get();
});

$app->post('survey/status/', function (Request $request) {
    if (\Illuminate\Support\Facades\DB::table('app_surveys')->where("id", "=", $request->get("id"))
        ->update(['status' => $request->get("status")])) {
        return response()->json(['response' => 'true']);
    } else {
        return response()->json(['response' => 'false']);
    }
});

$app->post('/survey/delete', function (Request $request) {
    return \Illuminate\Support\Facades\DB::table('app_survey')
        ->where('id', '=', $request->get('id'))->delete();
});

$app->post('/documents', function () {
    return \Illuminate\Support\Facades\DB::table('app_documents')->get();
});

$app->post('/documents/add', function (Request $request) {

    $random_string = function ($length, $directory = '', $extension = '') {
        $dir = !empty($directory) && is_dir($directory) ? $directory : dirname(__FILE__);
        do {
            $key = '';
            $keys = array_merge(range(0, 9), range('a', 'z'));
            for ($i = 0; $i < $length; $i++) {
                $key .= $keys[array_rand($keys)];
            }
        } while (file_exists($dir . '/' . $key . (!empty($extension) ? '.' . $extension : '')));
        return $key . (!empty($extension) ? '.' . $extension : '');
    };

    $fileName = $random_string(20, '', $request->file('pdfFile')->getClientOriginalExtension());
    $destinationPath = "public/";
    if ($request->file('pdfFile') != null) {
        $request->file('pdfFile')->move($destinationPath, $fileName);
    } else {
        return response()->json(['success' => false]);
    }

    if (\Illuminate\Support\Facades\DB::table('app_documents')->insert([
        'src' => $fileName,
        'title' => $request->get("title"),
    ])) {
        return response()->json(['success' => true]);
    }

});

$app->post('/documents/delete', function (Request $request) {
    return \Illuminate\Support\Facades\DB::table('app_documents')
        ->where('id', '=', $request->get('id'))->delete();
});

$app->post('/news', function () {
    return \Illuminate\Support\Facades\DB::table('app_news')->get();
});

$app->post('/news/add', function (Request $request) {
    if (\Illuminate\Support\Facades\DB::table('app_news')->insert(
        ['text' => $request->get('text')]
    )) {
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false]);
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
