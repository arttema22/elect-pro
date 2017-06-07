<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use app\modules\admin\assets\AdminAsset;
use webvimark\modules\UserManagement\components\GhostMenu;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\models\User;
use yii\widgets\Menu;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title>Админка | <?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?= Yii::$app->params['siteName'] ?></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?= Url::to('/admin') ?>"><?= Yii::t('admin', 'Dashboard'); ?></a></li>
                        <?php if (!Yii::$app->user->isGuest): ?>
                            <li><a href="<?= Url::to('/user-management/auth/logout') ?>">Logout <?= User::getCurrentUser()->username ?></a></li>
                        <?php endif; ?>

                        <?php
                        echo Nav::widget([
                            'options' => ['class' => 'nav navbar-nav navbar-right'],
                            'items' => [
                                ['label' => 'Profile',
                                    'items' => [
                                        // ['label' => 'Login', 'url' => ['/user-management/auth/login']],
                                        // ['label' => 'Logout', 'url' => ['/user-management/auth/logout']],
                                        // ['label' => 'Registration', 'url' => ['/user-management/auth/registration']],
                                        ['label' => 'Change own password', 'url' => ['/user-management/auth/change-own-password']],
                                        ['label' => 'Password recovery', 'url' => ['/user-management/auth/password-recovery']],
                                        ['label' => 'E-mail confirmation', 'url' => ['/user-management/auth/confirm-email']],
                                    ],
                                ],
                            ],
                        ]);
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <?php
                        echo Nav::widget([
                            'items' => UserManagementModule::menuItems()
                        ]);
                        ?>
                    </ul>

                    <?php
                    echo Menu::widget([
                        'options' => ['class' => 'nav nav-sidebar'],
                        'items' => [
                            ['label' => Yii::t('admin', 'Categories'), 'url' => ['/admin/category/index']],
                            ['label' => Yii::t('admin', 'Products'), 'url' => ['/admin/product/index']],
                            ['label' => Yii::t('admin', 'Slider'), 'url' => ['/admin/slider/index']],
                            ['label' => Yii::t('admin', 'Images'), 'url' => ['/admin/default/images']],
                        ],
                    ]);
                    ?>

                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                    <?php if (Yii::$app->session->hasFlash('success')): ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?php echo Yii::$app->session->getFlash('success'); ?>
                        </div>
                    <?php endif ?>

                    <?= $content ?>
                </div>
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
