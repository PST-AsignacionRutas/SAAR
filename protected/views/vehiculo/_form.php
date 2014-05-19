<?php
/* @var $this VehiculoController */
/* @var $model Vehiculo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'vehiculo-form',
    'type'=>'horizontal',
    'htmlOptions'=>array('class'=>'well'),
	));
?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php //echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model, 'numero', array('class'=>'span3','maxlength'=>256,
								'hint'=>'Número de identificación del vehículo')); ?>
	
	<?php echo $form->textFieldRow($model, 'placa', array('class'=>'span3','maxlength'=>16,
								'hint'=>'Placas identificadoras del vehículo ante el registro de Tránsito Terrestre (requerido)')); ?>
	
	<?php echo $form->textFieldRow($model, 'serial_carroceria', array('class'=>'span3','maxlength'=>16,
								'hint'=>'Número serial de carrocería del vehículo')); ?>


	<?php echo $form->textFieldRow($model, 'anio', array('class'=>'span3','maxlength'=>4,
								'hint'=>'Año del modelo del vehículo')); ?>

	<?php echo $form->textFieldRow($model, 'color', array('class'=>'span3','maxlength'=>32,
								'hint'=>'Color principal del vehiculo')); ?>

	<?php echo $form->textFieldRow($model, 'n_puestos', array('class'=>'span3','maxlength'=>2,
								'hint'=>'Número de puestos del vehículo')); ?>

	<?php echo $form->dropDownListRow($model, 'id_tipo_vehiculo',
									CHtml::listData($model->getListaTipoVehiculo(),'id','tipo'),
									array('empty' => 'Seleccione...',
									'hint'=>'Seleccione el tipo de vehículo (requerido)')); ?>

	<?php echo $form->dropDownListRow($model, 'id_estatus_vehiculo',
									CHtml::listData($model->getListaEstatusVehiculo(),'id','estatus'),
									array('empty' => 'Seleccione...',
									'hint'=>'Seleccione el estatus del vehículo (requerido)')); ?>

	<?php echo $form->dropDownListRow($model, 'id_modelo',
									CHtml::listData($model->getListaModeloVehiculo(),'id','modelo'),
									array('empty' => 'Seleccione...',
									'hint'=>'Seleccione el modelo del vehículo (requerido)')); ?>

	<div class="form-actions">
		<?php $submit = $model->isNewRecord ? 'Registrar' : 'Actualizar'; ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$submit)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Limpiar')); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
