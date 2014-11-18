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
   jQuery('#Solicitud_hora_llegada').timepicker('option', {
       minTime: {
           hour: endTimePickerInst.hours,
           minute: endTimePickerInst.minutes
       }
   });
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
