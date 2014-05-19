<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'solicitud-form',
    'type'=>'horizontal',
    'htmlOptions'=>array('class'=>'well'),
	));
?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php //echo $form->errorSummary($model); ?>
	
	<?php echo $form->textFieldRow($model,'solicitante',array('size'=>60,'maxlength'=>256, 'hint'=>'Nombre del departamento solicitante (requerido)')); ?>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'fecha_salida', array('class'=>'control-label')); ?>
		<div class="controls">
		<span class="add-on"><i class="icon-calendar"></i></span>
        <?php                    
        $this->widget('CJuiDatePicker',array(
                'language'=>'es',
                'model'=>$model,                                // Model object
                'attribute'=>'fecha_salida', // Attribute name
                //'mode'=>'datetime',                     // Use "time","date" or "datetime" (default)
                'options'=>array(),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true, 'size'=>10, 'class'=>'input-small') // HTML options
        ));
        ?>
        <span class="add-on"><i class="icon-time"></i></span>
        <?php
		$this->widget('CMaskedTextField', array(
				'model' => $model,
				//'value' => $model->isNewRecord ? $model->your_attribute_name : '',
				'attribute' => 'hora_salida',
				'mask' => 'hh:mm',
				'charMap' => array('h'=>'[0-23]','m'=>'[0-59]'),
				'htmlOptions' => array('size' => 5, 'class'=>'input-mini')
				)
		);
		?>
		<p class="help-block">Fecha y hora probable de salida (requerido)</p>
        <?php echo $form->error($model,'fecha_salida'); ?>
        </div> 
    </div>
	<?php //echo $form->textFieldRow($model, 'fecha_salida', array('class'=>'input-small', 'prepend'=>'<i class="icon-calendar"></i>')); ?>


 	<div class="control-group">
		<?php echo $form->labelEx($model,'fecha_llegada', array('class'=>'control-label')); ?>
		
		<div class="controls">
		<span class="add-on"><i class="icon-calendar"></i></span>
        <?php                    
        $this->widget('CJuiDatePicker',array(
                'language'=>'es',
                'model'=>$model,                                // Model object
                'attribute'=>'fecha_llegada', // Attribute name
                //'mode'=>'datetime',                     // Use "time","date" or "datetime" (default)
                'options'=>array(),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true, 'size'=>10, 'class'=>'input-small') // HTML options
        ));                             
        ?> 
        <span class="add-on"><i class="icon-time"></i></span>
		<?php
		$this->widget('CMaskedTextField', array(
				'model' => $model,
				//'value' => $model->isNewRecord ? $model->your_attribute_name : '',
				'attribute' => 'hora_llegada',
				'mask' => 'hh:mm',
				'charMap' => array('h'=>'[0-23]','m'=>'[0-59]'),
				'htmlOptions' => array('size' => 5, "class"=>'input-mini')
				)
		);
		?>
		<p class="help-block">Fecha y hora probable de llegada (requerido)</p>
		<?php echo $form->error($model,'fecha_llegada'); ?>
        </div>
    </div>
	<?php //echo $form->textFieldRow($model, 'fecha_llegada', array('class'=>'input-small', 'prepend'=>'<i class="icon-calendar"></i>')); ?>

	
	<?php //echo $form->textFieldRow($model, 'hora_salida', array('class'=>'input-small', 'prepend'=>'<i class="icon-time"></i>')); ?>

	<?php //echo $form->textFieldRow($model, 'hora_llegada', array('class'=>'input-small', 'prepend'=>'<i class="icon-time"></i>')); ?>

	
	<?php echo $form->textAreaRow($model,'lugar_encuentro',
								array('rows'=>3, 'cols'=>50, 
								'hint'=>'Lugar de encuentro de los beneficiarios del servicio para la salida')); ?>
	
	<?php echo $form->dropDownListRow($model, 'id_destino',
										CHtml::listData($model->getListaDestino(),'id','nombre'),
										array('empty' => 'Seleccione...',
										'hint'=>'Seleccione el destino para la actividad')
										); ?>
	<?php
	if (!$model->isNewRecord):?>
	<?php echo $form->dropDownListRow($model, 'id_estatus_solicitud',
										CHtml::listData($model->getListaEstatusSolicitud(),'id','estatus'),
										array('empty' => 'Seleccione...',
										'hint'=>'Seleccione el estatus de la solicitud')); ?>
	<?php endif;?>											
<!--	<div class="row">
		<?php //echo $form->labelEx($model,'id_destino'); ?>
		<?php //echo $form->textField($model,'id_destino'); ?>
		<?php //echo $form->error($model,'id_destino'); ?>
	</div> -->

<!--	<div class="row">
		<?php //echo $form->labelEx($model,'id_estatus_solicitud'); ?>
		<?php //echo $form->textField($model,'id_estatus_solicitud'); ?>
		<?php //echo $form->error($model,'id_estatus_solicitud'); ?>
	</div> -->
	
	<div class="form-actions">
		<?php $submit = $model->isNewRecord ? 'Registrar' : 'Actualizar'; ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$submit)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Limpiar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
