<div style="text-align: center;">
<b>LISTADO DE VEHICULOS</b><br />
</div>
<?php
$dP = $model->search();
$dP->setPagination(false);
?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'vehiculo-grid',
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
        array('name'=>'N&uacute;mero', 'value'=>'$data->numero'),
        array('name'=>'Placas', 'value'=>'$data->placa'),        
        array('name'=>'Serial', 'value'=>'$data->serial_carroceria'),
        array('name'=>'Nº puestos', 'value'=>'$data->n_puestos'),
        array('name'=>'Tipo',
			//'header'=>'Destino',
			'value'=>'$data->idTipoVehiculo->tipo'),
		array('name'=>'Marca',
			//'header'=>'Destino',
			'value'=>'$data->idModelo->idMarca->marca'),
		array('name'=>'Modelo',
			//'header'=>'Destino',
			'value'=>'$data->idModelo->modelo'),
		array('name'=>'Color',
			//'header'=>'Destino',
			'value'=>'$data->color'),
		array('name'=>'Año',
			//'header'=>'Destino',
			'value'=>'$data->anio'),
		array('name'=>'Estatus',
			//'header'=>'Destino',
			'value'=>'$data->idEstatusVehiculo->estatus'),
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
