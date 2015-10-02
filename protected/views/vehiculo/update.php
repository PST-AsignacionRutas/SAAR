<?php
/* @var $this VehiculoController */
/* @var $model Vehiculo */

$this->breadcrumbs=array(
	'Vehiculos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Vehiculo', 'url'=>array('index')),
	array('label'=>'Create Vehiculo', 'url'=>array('create')),
	array('label'=>'View Vehiculo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Vehiculo', 'url'=>array('admin')),
);
?>

<h1>Modificar Vehículo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link', 
								'label'=>'Listar',
								'url'=>array('vehiculo/admin','action'=>'Modificar'))); ?>
