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
Yii::app()->clientScript->registerScript('asignarActividades', "
$('#ruta-asignada-form').submit(function(e){
	var valido = false;
	
	var buttonId = e.originalEvent.explicitOriginalTarget.id;
	if (buttonId == 'rechazar')
		return true;

	if ($('#vehiculos').val())
	{
		valido = true;
	}
	else
	{
		valido = false;
		$('#vehiculos_em_').html('Asignar Vehículo(s) no puede estar vacío.');
		$('#vehiculos_em_').show();
	}
	
	if ($('#choferes').val())
	{
		valido = true;
	}
	else
	{
		valido = false;
		$('#choferes_em_').html('Asignar Chofer(es) no puede estar vacío.');
		$('#choferes_em_').show();
	}
	
	return valido;
});
");
?>
<h1>Registrar Asignación de Actividad Diaria</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'solicitud'=>$solicitud)); ?>
