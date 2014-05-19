<?php
/* @var $this RutaAsignadaController */
/* @var $model RutaAsignada */

$this->breadcrumbs=array(
	'Ruta Asignadas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RutaAsignada', 'url'=>array('index')),
	array('label'=>'Manage RutaAsignada', 'url'=>array('admin')),
);
?>

<h1>Registrar Asignación de Transporte</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
