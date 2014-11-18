<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'htmlOptions'=>array('class'=>'well'),
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_salida'); ?>
		<?php echo $form->textField($model,'fecha_salida'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_llegada'); ?>
		<?php echo $form->textField($model,'fecha_llegada'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->label($model,'hora_salida'); ?>
		<?php echo $form->textField($model,'hora_salida'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hora_llegada'); ?>
		<?php echo $form->textField($model,'hora_llegada'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lugar_encuentro'); ?>
		<?php echo $form->textArea($model,'lugar_encuentro',array('rows'=>6, 'cols'=>50)); ?>
	</div>
-->
<!--
	<div class="row">
		<?php echo $form->label($model,'id_destino'); ?>
		<?php echo $form->textField($model,'id_destino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_estatus_solicitud'); ?>
		<?php echo $form->textField($model,'id_estatus_solicitud'); ?>
	</div>
-->
	<div class="row">
		<?php echo $form->label($model,'solicitante'); ?>
		<?php 
		$solicitantes = array();
		$solicitantes['Coordinación de Transporte'] = 'Coordinación de Transporte';
		$solicitantes['Dirección de Talento Humano'] = 'Dirección de Talento Humano';
		$solicitantes['Dirección General Socioacadémica'] = 'Dirección General Socioacadémica';
		$solicitantes['Dirección de Presupuesto'] = 'Dirección de Presupuesto';
		$solicitantes['Dirección de Servicios Administrativos'] = 'Dirección de Servicios Administrativos';
		$solicitantes['Rectorado'] = 'Rectorado';
		$solicitantes['Vicerrectorado Académico'] = 'Vicerrectorado Académico';
		$solicitantes['Vicerrectorado de Desarrollo Territorial'] = 'Vicerrectorado de Desarrollo Territorial';
		$solicitantes['Secretaría General'] = 'Secretaría General';
		echo $form->dropDownList($model, 'solicitante',
										$solicitantes,
										array('empty' => 'Seleccione...',
										));
		//echo $form->textField($model,'solicitante',array('size'=>60,'maxlength'=>256)); ?>
	</div>
<!--
	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>
-->
<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Buscar')); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->
