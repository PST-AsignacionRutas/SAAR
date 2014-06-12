<div style="text-align: center;">
<b>PLANIFICACIÓN DE RUTAS ESTUDIANTILES</b>
<div style="text-align: right; font-size: 8pt;">
CT-005
</div>
</div>
<p>FECHA: del <?php echo $model->fecha_salida != '' ? $model->fecha_salida : "---";?> al <?php echo $model->fecha_llegada != '' ? $model->fecha_llegada : "---";?></p>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'solicitud-grid',
	'dataProvider'=>$model->search(),
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
        array('name'=>'Destino', 'value'=>'$data->idDestino->nombre'),
        array('name'=>'Chofer', 'value'=>'$data->rutaAsignadas->choferRutaAsignadas[0]->idChofer->nombre'),
        array('name'=>'Nº Unidad', 'value'=>'$data->rutaAsignadas->vehiculoRutaAsignadas[0]->idVehiculo->numero'),
        array('name'=>'Hora de Salida', 'value'=>'$data->hora_salida'),
        array('name'=>'Hora de Llegada', 'value'=>'$data->hora_llegada'),
        array('name'=>'Observaciones', 'value'=>'$data->observaciones'),
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
