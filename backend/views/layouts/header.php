<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini"></span><span class="logo-lg"> QuieroCasa.com.uy </span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= Yii::$app->user->identity->username; ?></span>
                    </a>
                </li>
               
                <li>
                    <?= 
                        Html::a(
                            '<i class="fa fa-power-off"></i>',
                            ['/site/logout'],
                            ['data-method' => 'post']
                        ) 
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
