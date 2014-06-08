<?php
/* @var $this DestinoController */
/* @var $model Destino */

$this->breadcrumbs=array(
	'Destinos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Destino', 'url'=>array('index')),
	array('label'=>'Create Destino', 'url'=>array('create')),
	array('label'=>'View Destino', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Destino', 'url'=>array('admin')),
);
?>

<h1>Modificar Destino <?php //echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
