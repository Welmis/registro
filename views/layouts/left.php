<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>WSR</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
       

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                   
					[
                        'label' => 'Registros',
                        'icon' => 'share',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Certificos', 'icon' => 'file-code-o', 'url' => ['reg/dcertifico'],],
                            ['label' => 'Holograma', 'icon' => 'file-code-o', 'url' =>  ['reg/dholograma'],],
                            ['label' => 'Licencias', 'icon' => 'file-code-o', 'url' => ['reg/dlicencia'],],
                            ['label' => 'Modelos de Inscripcion', 'icon' => 'file-code-o', 'url' => ['reg/dminscripcion'],],
                            ['label' => 'Pegatinas', 'icon' => 'file-code-o', 'url' => ['reg/dpegatina'],],
                            ['label' => 'Destinos', 'icon' => 'file-code-o', 'url' => ['reg/destino'],],
                             
						 ],
                    ],
					[
                        'label' => 'Datos de Registros',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Certificos', 'icon' => 'file-code-o', 'url' => ['reg/certifico'],],
                            ['label' => 'Holograma', 'icon' => 'file-code-o', 'url' =>  ['reg/holograma'],],
                            ['label' => 'Licencias', 'icon' => 'file-code-o', 'url' => ['reg/licencia'],],
                            ['label' => 'Modelos de Inscripcion', 'icon' => 'file-code-o', 'url' => ['reg/minscripcion'],],
                            ['label' => 'Pegatinas', 'icon' => 'file-code-o', 'url' => ['reg/pegatina'],],
                             
						 ],
                    ],
					
                ],
            ]
        ) ?>

    </section>

</aside>
