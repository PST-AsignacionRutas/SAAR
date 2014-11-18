<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */

$this->breadcrumbs=array(
	'Solicituds'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Solicitud', 'url'=>array('index')),
	array('label'=>'Create Solicitud', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#solicitud-grid').yiiGridView('update', {
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
	<h1>Modificar registro de solicitud</h1>
<?php
endif;
if ($action === "Eliminar"):
	$template = '{delete}';
?>
<h1>Eliminar registro de solicitud</h1>
<?php
endif;
if ($action === "Consultar"):
	$template = '{update}';
?>
<h1>Consultar registro de solicitud</h1>
<?php
endif;
?>
<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php echo CHtml::link('Consultar','#',array('class'=>'search-button')); ?>
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
	'id'=>'solicitud-grid',
	'dataProvider'=>$model->search(),
	/*'filter'=>$model,*/
	//'template'=>"{items}",
	'type'=>'striped bordered condensed',
	'columns'=>array(
		'solicitante',
		'responsable',
        //array('name'=>'solicitante', 'header'=>'Solicitante'),
        array('name'=>'id_destino', 'header'=>'Destino', 'value'=>'$data->idDestino->nombre'),
        array('name'=>'fecha_salida', 'header'=>'Fecha de Salida'),
        array('name'=>'fecha_llegada', 'header'=>'Fecha de Llegada'),
        array('name'=>'id_estatus_solicitud', 'header'=>'Estatus', 'value'=>'$data->idEstatusSolicitud->estatus'),
		/*'id',
		'fecha_salida',
		'fecha_llegada',
		'hora_salida',
		'hora_llegada',
		'lugar_encuentro',*/
		/*
		'id_destino',
		'id_estatus_solicitud',
		'solicitante',
		*/
		/*array(
			'class'=>'CButtonColumn',
		),*/
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
            'template'=>$template,
            'updateButtonLabel'=>'Modificar',
            'template'=>$template,
            'buttons'=>array(
				'update'=>array(
                            'visible'=>'$data->id_estatus_solicitud != 1 ?false:true',
                    ),
            ),
        ),
	),
)); ?>
