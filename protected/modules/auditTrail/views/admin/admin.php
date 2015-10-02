<?php
$this->breadcrumbs=array(
	'Audit Trails'=>array('/auditTrail'),
	'Manage',
);
/*
$this->menu=array(
	array('label'=>'List AuditTrail', 'url'=>array('index')),
	array('label'=>'Create AuditTrail', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('audit-trail-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Auditoría</h1>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php echo CHtml::link('Consulta','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'audit-trail-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'type'=>'striped bordered condensed',
	'columns'=>array(
		'id',
		//'old_value',
		array('name'=>'old_value', 'header'=>'Valor anterior'),
		//'new_value',
		array('name'=>'new_value', 'header'=>'Nuevo valor'),
		//'action',
		array('name'=>'action', 'header'=>'Acci&oacute;n'),
		//'model',
		array('name'=>'model', 'header'=>'Modelo'),
		//'field',
		array('name'=>'field', 'header'=>'Campo'),
		//'stamp',
		array('name'=>'stamp', 'header'=>'Fecha/Hora'),
		'user_id',
		//array('name'=>'user_id', 'header'=>'Usuario', 'value'=>'$data->idUser->username'),
		//array('name'=>'user_id', 'header'=>'Valor anterior'),
		//'model_id',
		array('name'=>'model_id', 'header'=>'Id del modelo'),
//		array(
//			'class'=>'CButtonColumn',
//		),
	),
)); ?>
