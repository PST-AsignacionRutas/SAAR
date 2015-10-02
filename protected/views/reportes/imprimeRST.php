<div style="text-align: center;">
<b>SOLICITUDES DE TRANSPORTE</b><br />
</div>
<?php
$dP = $model->search();
$dP->setPagination(false);
?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'solicitud-grid',
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
        array('name'=>'Solicitante', 'value'=>'$data->solicitante'),
        array('name'=>'Responsable', 'value'=>'$data->responsable'),
        array('name'=>'Destino', 'value'=>'$data->idDestino->nombre'),
        array('name'=>'Fecha de Salida', 'value'=>'$data->fecha_salida'),
        array('name'=>'Fecha de Llegada', 'value'=>'$data->fecha_llegada'),
        array('name'=>'Estatus','value'=>'$data->idEstatusSolicitud->estatus'),
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
