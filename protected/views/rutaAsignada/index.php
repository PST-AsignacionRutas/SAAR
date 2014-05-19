<?php
/* @var $this RutaAsignadaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ruta Asignadas',
);

$this->menu=array(
	array('label'=>'Create RutaAsignada', 'url'=>array('create')),
	array('label'=>'Manage RutaAsignada', 'url'=>array('admin')),
);
?>

<h1>Ruta Asignadas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
