<html>
<body>
<h1>Hola Mundo</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'chofer-grid',
	'dataProvider'=>$model->search(),
	/*'filter'=>$model,*/
	//'template'=>"{update}",
	'type'=>'striped bordered condensed',
	'columns'=>array(
		'id',
		'nombre',
		'cedula',
		//'id_tipo_chofer',
		array(  
			'header'=>'Tipo', 
			'value'=>'$data->idTipoChofer->tipo' 
		),
		//'id_estatus_chofer',
		array(  
			'header'=>'Estatus', 
			'value'=>'$data->idEstatusChofer->estatus' 
		),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            /*'htmlOptions'=>array('style'=>'width: 50px'),
            'template'=>$template,
            'updateButtonLabel'=>'Modificar',*/
        ),
	),
)); ?>
</body>
</html>
