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

<h1>Consultar Transporte Asignado</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'ruta-asignada-grid',
	'dataProvider'=>$model->search(),
	/*'filter'=>$model,*/
	'template'=>"{items}",
	'type'=>'striped bordered condensed',
	'columns'=>array(
		'id',
		'fecha_salida',
		'fecha_llegada',
		'hora_salida',
		'hora_llegada',
		'id_solicitud',
		/*
		'id_destino',
		*/
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
	),
)); ?>
