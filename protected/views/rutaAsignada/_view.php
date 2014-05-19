<?php
/* @var $this RutaAsignadaController */
/* @var $data RutaAsignada */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_salida')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_salida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_llegada')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_llegada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_salida')); ?>:</b>
	<?php echo CHtml::encode($data->hora_salida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora_llegada')); ?>:</b>
	<?php echo CHtml::encode($data->hora_llegada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->id_solicitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_destino')); ?>:</b>
	<?php echo CHtml::encode($data->id_destino); ?>
	<br />


</div>