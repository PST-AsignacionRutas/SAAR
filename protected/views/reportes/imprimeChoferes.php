<div style="text-align: center;">
<b>LISTADO DE CHOFERES</b><br />
</div>
<?php
$dP = $model->search();
$dP->setPagination(false);
?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'chofer-grid',
	'dataProvider'=>$dP,
	'enablePagination' => false,
	/*'filter'=>$model,*/
	'template'=>"{items}",
	'type'=>'striped bordered condensed',
	//'htmlOptions'=>array('class'=>'table-striped table-bordered table-condensed'),
	//'itemsCssClass' => 'items table table-striped table-bordered table-condensed',
	'columns'=>array(
		/*'solicitante',
		'responsable',*/
        //array('name'=>'solicitante', 'header'=>'Solicitante'),
        array('name'=>'Nombres y apellidos', 'value'=>'$data->nombre'),
        array('name'=>'Cedula de identidad', 'value'=>'$data->cedula'),
        array(  
			'name'=>'Tipo', 
			'value'=>'$data->idTipoChofer->tipo' 
		),
		//'id_estatus_chofer',
		array(  
			'name'=>'Estatus', 
			'value'=>'$data->idEstatusChofer->estatus' 
		),
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

	),
)); ?>
