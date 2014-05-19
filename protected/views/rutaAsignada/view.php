<?php
/* @var $this RutaAsignadaController */
/* @var $model RutaAsignada */

$this->breadcrumbs=array(
	'Ruta Asignadas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RutaAsignada', 'url'=>array('index')),
	array('label'=>'Create RutaAsignada', 'url'=>array('create')),
	array('label'=>'Update RutaAsignada', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RutaAsignada', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RutaAsignada', 'url'=>array('admin')),
);
?>

<h1>View RutaAsignada #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha_salida',
		'fecha_llegada',
		'hora_salida',
		'hora_llegada',
		'id_solicitud',
		'id_destino',
	),
)); ?>
