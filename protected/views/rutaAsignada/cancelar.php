<?php
/* @var $this RutaAsignadaController */
/* @var $model RutaAsignada */

$this->breadcrumbs=array(
	'Ruta Asignadas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RutaAsignada', 'url'=>array('index')),
	array('label'=>'Create RutaAsignada', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ruta-asignada-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Cancelar Asignaciones</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php echo CHtml::link('Consultar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'cancelar'=>true,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
		'fade'=>true, // use transitions?
        //'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        /*'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),*/
    )); 
?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'ruta-asignada-grid',
	'dataProvider'=>$model->search(),
	/*'filter'=>$model,*/
	//'template'=>"{items}",
	'type'=>'striped bordered condensed',
	'columns'=>array(
		'id',
		'solicitante',
		'responsable',
		'fecha_salida',
		'fecha_llegada',
		'hora_salida',
		'hora_llegada',
		array('name'=>'id_destino',
			//'header'=>'Destino',
			'value'=>'$data->idDestino->nombre'),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
            'template'=>'{cancelar}',
            'buttons'=>array(
				'cancelar' => array(
					'label'=>'Cancelar',
					'options'=>array('title'=>'Cancelar','confirm'=>'¿Está seguro de querer cancelar?','buttonType'=>'link', 'class'=>'btn btn-danger'),
					'url'=>'Yii::app()->createUrl("RutaAsignada/cancelarsolicitud", array("id"=>$data->id))',
					//'imageUrl'=>Yii::app()->basePath.'/../images/logo.png',
					
				),
			),
        ),
	),
)); ?>
<div class="form-actions">
		<center><?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link', 
								'label'=>'Salir',
								'url'=>array('site/page', 'view'=>'Bienvenida'))); ?> </center>
</div>
