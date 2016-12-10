<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
       <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Clientes', 'icon' => 'fa fa-user', 'url' => ['/cliente']],
                    ['label' => 'Inmuebles', 'icon' => 'fa fa-home', 'url' => ['/inmueble']],
                    ['label' => 'Usuarios', 'icon' => 'fa fa-users', 'url' => ['/user']],
                    ['label' => 'Administradores', 'icon' => 'fa fa-user-secret', 'url' => ['/admin']],
                    ['label' => 'Tipos de Inmueble', 'icon' => 'fa fa-tags', 'url' => ['/tipo-inmueble']],
                  
                    ['label' => 'Horario Atención', 'icon' => 'fa fa-clock-o', 'url' => ['/horario-atencion']]

                ],
            ]
        ) ?>

    </section>

</aside>
