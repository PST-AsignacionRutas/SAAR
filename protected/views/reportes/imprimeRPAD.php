<div style="text-align: center;">
<b>PROGRAMACIÓN DE ACTIVIDADES DIARIAS</b>
<div style="text-align: right; font-size: 8pt;">
CT-006
</div>
</div>

<p>FECHA: del <?php echo $model->fecha_salida != '' ? $model->fecha_salida : "---";?> al <?php echo $model->fecha_llegada != '' ? $model->fecha_llegada : "---";?></p>

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
        //array('name'=>'Solicitante', 'value'=>'$data->solicitante'),
        array('name'=>'Día', 'value'=>'$data->fecha_salida'),
        array('name'=>'Solicitante Responsable', 'value'=>'$data->solicitante."-". $data->responsable'),
        array('name'=>'Destino', 'value'=>'$data->idDestino->nombre'),
        array('name'=>'Nº de Personas', 'value'=>'$data->n_personas'),
        array('name'=>'Lugar de Encuentro', 'value'=>'$data->lugar_encuentro'),
        array('name'=>'Hora de Salida', 'value'=>'$data->hora_salida'),
        array('name'=>'Hora de Llegada', 'value'=>'$data->hora_llegada'),
        array('name'=>'Chofer', 'value'=>'Solicitud::Choferes($data->rutaAsignadas->choferRutaAsignadas)', 'type'=>'raw'),
        array('name'=>'Nº Unidad', 'value'=>'Solicitud::Vehiculos($data->rutaAsignadas->vehiculoRutaAsignadas)', 'type'=>'raw'),
        //array('name'=>'Estatus','value'=>'$data->idEstatusSolicitud->estatus'),
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
