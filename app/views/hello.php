<?php
use Illuminate\Support\Facades\HTML;
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
            <h4><span class="text-center text-info">More things coming soon ...</span></h4>
            <hr>
        </div>
        <div class="row">
            <h2><span class="text-info">A demo application using HKT SDK</span></h2>
            <?php if ($current_user_info): ?>
                <div>
                    <span class="text-primary">
                        <h2>Congratulation, <span class="text-success"><?= $current_user_info['display_name'] ?></span>! You have been logged in!!</h2>
                        <h3>(<span class="text-success"><?= $current_user_info['email']?></span>)</h3>
                    </span>
                    <br>
                    <br>
                    <br>
                    <a class="btn btn-danger btn-lg" href="<?= url('/home/logout') ?>">Logout</a>
                </div>
            <?php else: ?>
                <br>
                <br>
                <br>
                <a class="btn btn-success btn-lg" href="<?= $hkt_sdk->getLoginUrl(url('/home/login')) ?>">Sign in through HKT</a>
            <?php endif; ?>
        </div>
    </div>
</body>

<footer>
    <hr>
    <p>Powered by <a href="http://laravel.com/">Laravel PHP Framework</a> & <a href="https://hkt.thangtd.com">Framgia Hyakkaten</a></p>
</footer>
</html>
