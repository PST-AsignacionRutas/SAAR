
<h1>Reporte Listado de Vehículos</h1>

<div class="form">

<?php 
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'vehiculo-form',
    'type'=>'horizontal',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'htmlOptions'=>array('class'=>'well', 'target'=>'_blank'),
	));
?>

	<div class="control-group">
		<?php echo $form->label($model,'id_tipo_vehiculo', array('class'=>'control-label')); ?>
		<div class="controls">
			
		<?php
		echo $form->dropDownList($model, 'id_tipo_vehiculo',
									CHtml::listData($model->getListaTipoVehiculo(),'id','tipo'),
									array('empty' => 'Seleccione...',
									'hint'=>'Seleccione el tipo de vehículo (requerido)'));
		?>
		<p class="help-block">Seleccione el tipo de vehículo</p>
        </div> 
    </div>

	<div class="control-group">
		<?php echo $form->label($model,'id_estatus_vehiculo', array('class'=>'control-label')); ?>
		<div class="controls">
			
		<?php
		echo $form->dropDownList($model, 'id_estatus_vehiculo',
									CHtml::listData($model->getListaEstatusVehiculo(),'id','estatus'),
									array('empty' => 'Seleccione...',
									'hint'=>'Seleccione el estatus del vehículo (requerido)'));
		?>
		<p class="help-block">Seleccione el estatus del vehículo</p>
        </div> 
    </div>

	<div class="control-group">
		<?php echo $form->label($model,'id_modelo', array('class'=>'control-label')); ?>
		<div class="controls">
			
		<?php
		echo $form->dropDownList($model, 'id_modelo',
									$model->getListaModeloVehiculo(),
									array('empty' => 'Seleccione...',
									'hint'=>'Seleccione el modelo del vehículo (requerido)'));
		?>
		<p class="help-block">Seleccione el modelo del vehículo</p>
        </div> 
    </div>
    
        
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Imprimir')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link', 
									'label'=>'Cancelar',
									'url'=>array('site/page', 'view'=>'Bienvenida'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
