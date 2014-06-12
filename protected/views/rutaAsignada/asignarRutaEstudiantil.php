<?php
/* @var $this RutaAsignadaController */
/* @var $model RutaAsignada */

$this->breadcrumbs=array(
	'Ruta Asignadas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RutaAsignada', 'url'=>array('index')),
	array('label'=>'Manage RutaAsignada', 'url'=>array('admin')),
);
?>
<?php
$urlVehiculos=Yii::app()->createUrl('RutaAsignada/ajaxlistavehiculos');
$urlChoferes=Yii::app()->createUrl('RutaAsignada/ajaxlistachoferes');
Yii::app()->clientScript->registerScript('ajaxEstudiantil', "
$('#Solicitud_fecha_salida').bind('change',function(){
	
	var datos='{'
			+'\"fecha_salida\": \"'+$('#Solicitud_fecha_salida').val()+'\",'
			+'\"fecha_llegada\": \"'+$('#Solicitud_fecha_llegada').val()+'\",'
			+'\"hora_salida\": \"'+$('#Solicitud_hora_salida').val()+'\",'
			+'\"hora_llegada\": \"'+$('#Solicitud_hora_llegada').val()+'\",'
			+'}';
	jQuery.ajax({
		url: '".$urlVehiculos."',
		type: 'post',
		async: true,
		contentType: 'application/json',
		data: datos,
		success: function(resp){
			$('#VehiculoRutaAsignada_id_vehiculo').html(resp);
			$('#VehiculoRutaAsignada_id_vehiculo').trigger('chosen:updated');
		}
	});
	
	jQuery.ajax({
		url: '".$urlChoferes."',
		type: 'post',
		async: true,
		contentType: 'application/json',
		data: datos,
		success: function(resp){
			$('#ChoferRutaAsignada_id_chofer').html(resp);
			$('#ChoferRutaAsignada_id_chofer').trigger('chosen:updated');
		}
	});
});
$('#Solicitud_hora_salida').bind('change',function(){
	$('#Solicitud_fecha_salida').trigger('change');
});
$('#Solicitud_hora_llegada').bind('change',function(){
	$('#Solicitud_fecha_salida').trigger('change');
});
");
?>
<h1>Registrar Asignación de Ruta Estudiantil</h1>

<?php $this->renderPartial('_rutaEstudiantil', array('model'=>$model,'vehiculos'=>$vehiculos,
					'choferes'=>$choferes)); ?>
