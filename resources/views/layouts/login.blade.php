<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="./js/style.js"></script>
</head>
<body>
    <header>
        <div id = "head">
        <h1><a><img src="images/main_logo.png"></a></h1>
            <div id="">
                <div id="">
                    <p>{{Auth::user()->username}}さん<img src="{{ asset('/images/'. Auth::user()->images) }}" alt=""></p>

                    <!-- 矢印あり↓ -->
                    <div class="accordion">
                        <div class="accordion-container">
                            <div class="accordion-item">
                                <h3 class="accordion-title js-accordion-title">
                                 {{Auth::user()->username}}さん
                                </h3>
                                <div class="accordion-content">
                                        <br><a href="/top">ホーム</a>
                                        <br><a href="/profile">プロフィール</a>
                                        <br><a href="/logout">ログアウト</a>
                                </div>
                            </div>

                         </div>
                </div>
                    <!-- 矢印あり↑ -->
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
                </div>
                <div>
                </div>
                <p class="btn"><a href="/search">ユーザー検索</a></p>
                </div>
            </div>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
