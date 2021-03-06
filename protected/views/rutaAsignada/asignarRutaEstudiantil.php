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

<?php
Yii::app()->clientScript->registerScript('time', "
// when start time change, update minimum for end timepicker
function tpStartSelect( time, endTimePickerInst ) {
   if (jQuery('#Solicitud_fecha_salida').val() === jQuery('#Solicitud_fecha_llegada').val())
   {
	   jQuery('#Solicitud_hora_llegada').timepicker('option', {
		   minTime: {
			   hour: endTimePickerInst.hours,
			   minute: endTimePickerInst.minutes
		   }
	   });
	}
};

function tpEndSelect( time, startTimePickerInst ) {
   //console.log('dentro');
   if (jQuery('#Solicitud_fecha_salida').val() === jQuery('#Solicitud_fecha_llegada').val())
   {
      //console.log('dentro validado');
	   jQuery('#Solicitud_hora_llegada').timepicker('option', {
		   minTime: {
			   hour: startTimePickerInst.hours,
			   minute: startTimePickerInst.minutes
		   }
	   });
	}
	else
	{
		//console.log('dentro NO validado');
	   jQuery('#Solicitud_hora_llegada').timepicker('option', {
		   minTime: {
			   hour: null,
			   minute: null
		   }
	   });
	}
};

// when end time change, update maximum for start timepicker
/*function tpEndSelect( time, startTimePickerInst ) {
   $('#timepicker_start').timepicker('option', {
       maxTime: {
           hour: startTimePickerInst.hours,
           minute: startTimePickerInst.minutes
       }
   });
}*/
");
?>
<h1>Registrar Asignación de Ruta Estudiantil</h1>

<?php $this->renderPartial('_rutaEstudiantil', array('model'=>$model,'vehiculos'=>$vehiculos,
					'choferes'=>$choferes)); ?>
