<?php
/* @var $this ChoferController */
/* @var $model Chofer */

$this->breadcrumbs=array(
	'Chofers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Chofer', 'url'=>array('index')),
	array('label'=>'Create Chofer', 'url'=>array('create')),
	array('label'=>'View Chofer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Chofer', 'url'=>array('admin')),
);
?>

<h1>Modificar Chofer <?php //echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link', 
								'label'=>'Listar',
								'url'=>array('chofer/admin','action'=>'Modificar'))); ?>
