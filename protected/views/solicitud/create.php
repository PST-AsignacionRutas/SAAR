<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */

$this->breadcrumbs=array(
	'Solicituds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Solicitud', 'url'=>array('index')),
	array('label'=>'Manage Solicitud', 'url'=>array('admin')),
);
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
<h1>Registrar Solicitud</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
