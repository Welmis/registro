<aside class="main-sidebar">

   <section class="sidebar">

         
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                   
					[
                        'label' => 'Registros',
                        'icon' => 'share',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Cerificados', 'icon' => 'file', 'url' => ['/reg/dcertifico'],],
                            ['label' => 'Holograma', 'icon' => 'file', 'url' =>  ['/reg/dholograma'],],
                            ['label' => 'Licencias', 'icon' => 'file', 'url' => ['/reg/dlicencia'],],
                            ['label' => 'Modelos de Inscripcion', 'icon' => 'file', 'url' => ['/reg/dminscripcion'],],
                            ['label' => 'Pegatinas', 'icon' => 'file', 'url' => ['/reg/dpegatina'],],
                            ['label' => 'Destinos', 'icon' => 'file', 'url' => ['/reg/destino'],],
                             
						 ],
                    ],
					[
                        'label' => 'Datos de Registros',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Cerificados', 'icon' => 'file-code-o', 'url' => ['/reg/certifico'],],
                            ['label' => 'Holograma', 'icon' => 'file-code-o', 'url' =>  ['/reg/holograma'],],
                            ['label' => 'Licencias', 'icon' => 'file-code-o', 'url' => ['/reg/licencia'],],
                            ['label' => 'Modelos de Inscripcion', 'icon' => 'file-code-o', 'url' => ['/reg/minscripcion'],],
                            ['label' => 'Pegatinas', 'icon' => 'file-code-o', 'url' => ['/reg/pegatina'],],
                             
						 ],
                    ],
					
                ],
            ]
        ) ?>

    </section>

</aside>
