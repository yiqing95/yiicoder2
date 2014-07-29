<?php
use yii\widgets\DetailView;
?>

<?php $this->beginContent('@app/views/layouts/main.php') ?>

<div class="content">
    <div class="row">


        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
              haha  这里 放user profile
             <?php
                   $spaceUserId = $_GET['u'];
                   $model = \year\user\models\User::findIdentity($spaceUserId);
             ?>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'username',
                    'email:email',
                    'icon_url:url',
                    'password',
                    'salt',
                    'status',
                    'last_login_ip',
                    'last_active_at',
                    'created_at',
                ],
            ]) ?>
        </div>
        <!-- /.blog-sidebar -->


        <div class="col-sm-8 blog-main">

            <?= $content ?>

        </div>
        <!-- /.blog-main -->
    </div>

    <div>

<?php $this->endContent() ?>