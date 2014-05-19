<?php
/* @var $this DestinoController */
/* @var $model Destino */

$this->breadcrumbs=array(
	'Destinos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Destino', 'url'=>array('index')),
	array('label'=>'Create Destino', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#destino-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Consultar Destinos</h1>
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
	'id'=>'destino-grid',
	'dataProvider'=>$model->search(),
	/*'filter'=>$model,*/
	'template'=>"{items}",
	'type'=>'striped bordered condensed',
	'columns'=>array(
		//'id',
		'nombre',
		//'id_tipo_destino',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            //'htmlOptions'=>array('style'=>'width: 50px'),
        ),
	),
)); ?>
