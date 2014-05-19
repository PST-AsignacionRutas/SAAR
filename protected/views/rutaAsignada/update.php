<?php
/* @var $this RutaAsignadaController */
/* @var $model RutaAsignada */

$this->breadcrumbs=array(
	'Ruta Asignadas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RutaAsignada', 'url'=>array('index')),
	array('label'=>'Create RutaAsignada', 'url'=>array('create')),
	array('label'=>'View RutaAsignada', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RutaAsignada', 'url'=>array('admin')),
);
?>

<h1>Update RutaAsignada <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>