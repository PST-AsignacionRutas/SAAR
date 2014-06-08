<?php
/* @var $this RutaAsignadaController */
/* @var $model RutaAsignada */
/* @var $form CActiveForm */
?>


<div class="form">

<?php 
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'ruta-asignada-form',
    'type'=>'horizontal',
    'htmlOptions'=>array('class'=>'well'),
	));
?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php //echo $form->errorSummary($model); ?>

	<table style="width: 50%;">
		<tr>
		<td style="text-align: right;"><?php echo $form->labelEx($solicitud,'solicitante'); ?></td><td><?php echo $solicitud->solicitante; ?></td>
		</tr>
		<tr>
		<td style="text-align: right;"><?php echo $form->labelEx($solicitud,'responsable'); ?></td><td><?php echo $solicitud->responsable; ?></td>
		</tr>
		<tr>
		<td style="text-align: right;"><?php echo $form->labelEx($solicitud,'fecha_salida'); ?></td><td><?php echo $solicitud->fecha_salida . " / " . $solicitud->hora_salida; ?></td>
		</tr>
		<tr>
		<td style="text-align: right;"><?php echo $form->labelEx($solicitud,'fecha_llegada'); ?></td><td><?php echo $solicitud->fecha_llegada . " / " . $solicitud->hora_llegada; ?></td>
		</tr>
		<tr>
		<td style="text-align: right;"><?php echo $form->labelEx($solicitud,'n_personas'); ?></td><td><?php echo $solicitud->n_personas; ?></td>
		</tr>
		<tr>
		<td style="text-align: right;"><?php echo $form->labelEx($solicitud,'id_destino'); ?></td><td><?php echo $solicitud->idDestino->nombre; ?></td>
		</tr>
		<tr>
		<td style="text-align: right;"><?php echo $form->labelEx($solicitud,'lugar_encuentro'); ?></td><td><?php echo $solicitud->lugar_encuentro; ?></td>
		</tr>
		<tr>
		<td style="text-align: right;"><?php echo $form->labelEx($solicitud,'lugar_encuentro_llegada'); ?></td><td><?php echo $solicitud->lugar_encuentro_llegada; ?></td>
		</tr>
		<tr>
		<td style="text-align: right;"><?php echo $form->labelEx($solicitud,'observaciones'); ?></td><td><?php echo $solicitud->observaciones; ?></td>
		</tr>
		<tr>
		<td style="text-align: right;"><?php echo $form->labelEx($solicitud,'recorrido'); ?></td><td><?php echo $solicitud->recorrido; ?></td>
		</tr>
		<tr>
		<td style="text-align: right;"><?php echo CHtml::label('Asignar Vehículo(s)', null);?></td>
		<td><?php echo Chosen::multiSelect('vehiculos', array(), RutaAsignada::getListaVehiculos($solicitud),
			array(
				'data-placeholder' => 'Indique Nº, Placa, Marca, Modelo ó Tipo de Vehículo',
				'class'=>'span8',
				'options'=>array(
					//'maxSelectedOptions' => 3,
					'displaySelectedOptions' => true,
					//'noResultsText' => 'No se encontraron vehículos'
			)));?>
			<span style="display: none;" id="vehiculos_em_" class="help-inline error"></span>
			<p class="help-block">Indique Nº, Placa, Marca, Modelo o Tipo de Vehículo</p>
		</td>
		</tr>
		<tr>
		<td style="text-align: right;"><?php echo CHtml::label('Asignar Chofer(es)', null);?></td>
		<td><?php echo Chosen::multiSelect('choferes', array(), RutaAsignada::getListaChoferes($solicitud),
			array(
				'data-placeholder' => 'Indique Nº Cédula, Nombres, Apellidos, ó Tipo de Chofer',
				'class'=>'span8',
				'options'=>array(
					//'maxSelectedOptions' => 3,
					'displaySelectedOptions' => true,
					//'noResultsText' => 'No se encontraron vehículos'
			)));?>
			<span style="display: none;" id="choferes_em_" class="help-inline error"></span>
			<p class="help-block">Indique Nº Cédula, Nombres, Apellidos, ó Tipo de Chofer</p>
		</td>
		</tr>
	</table>
	<div class="row">		
		
		<?php //echo Chosen::multiSelect('vehiculos', array(), array('1'=>'Uno','2'=>'Dos','3'=>'Tres','4'=>'Cuatro'));?>
		<p><?php //echo $modelCita->idPaciente->persona->nombre; ?></p>
	</div>
	
	<div class="row">
		<?php //echo CHtml::label('Consultorio', null);?>
		<p><?php //echo $modelCita->idConsultorio->direccion; ?></p>
	</div>
	
	<div class="row">
		<?php //echo $form->labelEx($modelCita,'fecha_solicitud'); ?>
		<p><?php //echo Yii::app()->dateFormatter->format('dd-MM-yyyy',CDateTimeParser::parse($modelCita->fecha_solicitud,"yyyy-MM-dd")); ?></p>
	</div>

	<div class="form-actions">
		<?php $submit = $model->isNewRecord ? 'Registrar' : 'Guardar'; ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$submit)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Limpiar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
