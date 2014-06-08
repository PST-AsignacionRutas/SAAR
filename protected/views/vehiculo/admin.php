<?php
/* @var $this VehiculoController */
/* @var $model Vehiculo */

$this->breadcrumbs=array(
	'Vehiculos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Vehiculo', 'url'=>array('index')),
	array('label'=>'Create Vehiculo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#vehiculo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'Consultar';

if ($action === "Modificar"):
	$template = '{update}';
?>
	<h1>Modificar registro de vehículo</h1>
<?php
endif;
if ($action === "Eliminar"):
	$template = '{delete}';
?>
<h1>Eliminar registro de vehículo</h1>
<?php
endif;
if ($action === "Consultar"):
	$template = '{update}{delete}';
?>
<h1>Consultar registro de vehículo</h1>
<?php
endif;
?>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
		'fade'=>true, // use transitions?
        //'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        /*'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),*/
    )); 
	?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'vehiculo-grid',
	'dataProvider'=>$model->search(),
	/*'filter'=>$model,*/
	//'template'=>"{items}",
	'type'=>'striped bordered condensed',
	'columns'=>array(
		//'id',
		'numero',
		'placa',
		'serial_carroceria',
		'anio',
		'color',
		/*
		'n_puestos',
		'id_tipo_vehiculo',
		'id_estatus_vehiculo',
		'id_modelo',
		*/
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
            'template'=>$template,
            'updateButtonLabel'=>'Modificar',
        ),
	),
)); ?>
