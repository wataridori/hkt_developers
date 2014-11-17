<?php
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\HTML;
use GrahamCampbell\Markdown\Facades\Markdown;
use wataridori\HktSdk\HKT_SDK;
/**
 * @var HKT_SDK $hkt_sdk
 * @var array $current_user_info
 */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Framgia Hyakkaten's Develop Center</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

        footer {
            margin:0;
            font-family:'Lato', sans-serif;
            text-align:center;
            color: #999;
        }

        .my-container {
            min-height: 600px;
        }

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
    <?= HTML::style('css/bootstrap.min.css') ?>
</head>
<body>
    <div class="container my-container">
        <div class="row">
            <h1><span class="text-center text-danger">Welcome to Framgia Hyakkaten's Developer Center</span></h1>
            <?php if ($current_user_info): ?>
                <div class="row">
                    <span class="text-primary">
                        <h3>Hello, <span class="text-success"><?= $current_user_info['display_name'] ?></span>
                            <a class="btn btn-danger btn-sm" href="<?= url('/home/logout') ?>">Sign Out</a></h3>
                    </span>
                </div>
            <?php else: ?>
                <a class="btn btn-success btn-sm" href="<?= $hkt_sdk->getLoginUrl(url('/home/login')) ?>">Sign in through HKT</a>
            <?php endif; ?>
            <hr>
            <h3>Check the HKT SDK on <a href="https://github.com/wataridori/hkt_sdk" target="_blank">Github!</a></h3>
        </div>

        <div style="text-align: left" class="text-info">
            <?= Markdown::render(File::get(app_path() . '/../vendor/wataridori/hkt_sdk/docs/usage.md')); ?>
        </div>
    </div>
</body>

<footer>
    <hr>
    <p>Powered by <a href="http://laravel.com/">Laravel PHP Framework</a> & <a href="https://hkt.thangtd.com">Framgia Hyakkaten</a></p>
</footer>
</html>
