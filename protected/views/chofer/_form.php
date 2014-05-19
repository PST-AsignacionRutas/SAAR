<?php
/* @var $this ChoferController */
/* @var $model Chofer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'chofer-form',
    'type'=>'horizontal',
    'htmlOptions'=>array('class'=>'well'),
	));
?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php //echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model, 'nombre', array('class'=>'span3','maxlength'=>256,
								'hint'=>'Nombres y apellidos del chofer (requerido)')); ?>

	<?php echo $form->textFieldRow($model, 'cedula', array('class'=>'span2','maxlength'=>16,
								'hint'=>'Cédula de identidad del chofer (requerido)')); ?>

	<?php echo $form->dropDownListRow($model, 'id_tipo_chofer',
										CHtml::listData($model->getListaTipoChofer(),'id','tipo'),
										array('empty' => 'Seleccione...',
										'hint'=>'Seleccione el tipo de chofer (requerido)')); ?>

	<?php echo $form->dropDownListRow($model, 'id_estatus_chofer',
										CHtml::listData($model->getListaEstatusChofer(),'id','estatus'),
										array('empty' => 'Seleccione...',
										'hint'=>'Seleccione el estatus del chofer (requerido)')); ?>

	<div class="form-actions">
		<?php $submit = $model->isNewRecord ? 'Registrar' : 'Actualizar'; ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$submit)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Limpiar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
