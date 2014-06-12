<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */
/* @var $form CActiveForm */
?>

<?php
	$solicitantes = array();
	$solicitantes['Coordinación de Transporte'] = 'Coordinación de Transporte';
	
	if ($model->isNewRecord)
	{
		$model->hora_salida="8:00 AM";
		$model->hora_llegada="6:00 PM";
	}
?>
<div class="form">

<?php 
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'ruta-asignada-form',
    'type'=>'horizontal',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'htmlOptions'=>array('class'=>'well'),
	));
?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>
	<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
		'fade'=>true, // use transitions?
        //'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        /*'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),*/
    )); 
	?>
	<?php //echo $form->errorSummary($model); ?>
	
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
                'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					'minDate'=>'0',
					'changeMonth'=>true,
					'changeYear'=>true,
					'onClose'=>"js: function( selectedDate ) {
							sDate = selectedDate.split('-');
							selectedDate = sDate[2]+'-'+sDate[1]+'-'+sDate[0];
							var dateCheckout = new Date(Date.parse(selectedDate));
							//alert(''+selectedDate);
							dateCheckout.setDate(dateCheckout.getDate() + 1);
							$('#Solicitud_fecha_llegada').datepicker( 'option', 'minDate', dateCheckout);
							$('#Solicitud_fecha_llegada').datepicker( 'setDate', dateCheckout);
							$('#Solicitud_fecha_salida').trigger('change');
					}",
                ),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true, 'size'=>10, 'class'=>'input-small') // HTML options
        ));
        ?>
        <span class="add-on"><i class="icon-time"></i></span>
        
		<?php
		$this->widget('application.extensions.jui_timepicker.JTimePicker', array(
				'model'=>$model,
				'attribute'=>'hora_salida',
				// additional javascript options for the date picker plugin
				'options'=>array(
					'showPeriod'=>true,
					'showLeadingZero'=>true,
					// Localization
					'hourText'=> 'Hora',             // Define the locale text for "Hours"
					'minuteText'=> 'Minutos',         // Define the locale text for "Minute"
					'amPmText'=>['AM', 'PM'],
					//'defaultTime'=>'12:34',       // Define the locale text for periods
					// custom hours and minutes
					/*'hours'=>array(
						'starts'=>'1',                // First displayed hour
						'ends'=>'12',                  // Last displayed hour
					),*/
					/*'minutes'=>array(
						'starts'=>'0',                // First displayed minute
						'ends'=>'55',                 // Last displayed minute
						'interval'=>'5',              // Interval of displayed minutes
						//manual: []                // Optional extra entries for minutes
					),*/
				),
				'htmlOptions'=>array('size' => 5, 'class'=>'input-mini', 'readonly'=>true),
		 ));
?>
		<p class="help-block">Fecha y hora probable de salida (requerido)</p>
        <?php echo $form->error($model,'fecha_salida'); ?>
        </div> 
    </div>

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
                'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					'changeMonth'=>true,
					'changeYear'=>true,
					'onClose'=>"js: function( selectedDate ) {
							$('#Solicitud_fecha_salida').trigger('change');
					}",
                ),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true, 'size'=>10, 'class'=>'input-small') // HTML options
        ));                             
        ?> 
        <span class="add-on"><i class="icon-time"></i></span>
		<?php
		/*$this->widget('CMaskedTextField', array(
				'model' => $model,
				//'value' => $model->isNewRecord ? $model->your_attribute_name : '',
				'attribute' => 'hora_llegada',
				'mask' => 'hh:mm',
				'charMap' => array('h'=>'[0-23]','m'=>'[0-59]'),
				'htmlOptions' => array('size' => 5, "class"=>'input-mini')
				)
		);*/
		?>
		<?php
		$this->widget('application.extensions.jui_timepicker.JTimePicker', array(
				'model'=>$model,
				'attribute'=>'hora_llegada',
				// additional javascript options for the date picker plugin
				'options'=>array(
					'showPeriod'=>true,
					'showLeadingZero'=>true,
					// Localization
					'hourText'=> 'Hora',             // Define the locale text for "Hours"
					'minuteText'=> 'Minutos',         // Define the locale text for "Minute"
					'amPmText'=>['AM', 'PM'],       // Define the locale text for periods
					// custom hours and minutes
					/*'hours'=>array(
						'starts'=>'1',                // First displayed hour
						'ends'=>'12',                  // Last displayed hour
					),*/
					/*'minutes'=>array(
						'starts'=>'0',                // First displayed minute
						'ends'=>'55',                 // Last displayed minute
						'interval'=>'5',              // Interval of displayed minutes
						//manual: []                // Optional extra entries for minutes
					),*/
				),
				'htmlOptions'=>array('size' => 5, 'class'=>'input-mini', 'readonly'=>true),
		 ));
?>
		<p class="help-block">Fecha y hora probable de llegada (requerido)</p>
		<?php echo $form->error($model,'fecha_llegada'); ?>
        </div>
    </div>
	<?php //echo $form->textFieldRow($model, 'fecha_llegada', array('class'=>'input-small', 'prepend'=>'<i class="icon-calendar"></i>')); ?>

	
	<?php //echo $form->textFieldRow($model, 'hora_salida', array('class'=>'input-small', 'prepend'=>'<i class="icon-time"></i>')); ?>

	<?php //echo $form->textFieldRow($model, 'hora_llegada', array('class'=>'input-small', 'prepend'=>'<i class="icon-time"></i>')); ?>

	<?php //echo $form->textFieldRow($model, 'n_personas', array('class'=>'input-mini','maxlength'=>3,
								//'hint'=>'Cantidad de personas que harán uso del transporte (requerido)')); ?>
	
	<?php echo $form->dropDownListRow($model, 'id_destino',
										CHtml::listData($model->getListaDestino(),'id','nombre'),
										array('empty' => 'Seleccione...',
										'hint'=>'Seleccione el destino para la actividad')
										); ?>
									
	<?php echo $form->textAreaRow($model,'observaciones',
								array('rows'=>2, 'cols'=>50, 
								'hint'=>'Información adicional relacionada con la solicitud')); ?>
	
	<div class="control-group">
		<?php echo CHtml::label('Asignar Vehículo(s) <span class="required">*</span>', null,array('class'=>'control-label'));
		//echo $form->labelEx($vehiculos,'id_vehiculo', array('class'=>'control-label'));
		?>
		<div class="controls">
			<?php
			echo Chosen::activeMultiSelect($vehiculos, 'id_vehiculo', RutaAsignada::getListaVehiculos($model),
			array(
				'data-placeholder' => 'Indique Nº, Placa, Marca, Modelo ó Tipo de Vehículo',
				'class'=>'span8',
				'options'=>array(
					//'maxSelectedOptions' => 3,
					'displaySelectedOptions' => true,
					//'noResultsText' => 'No se encontraron vehículos'
			)));
			/* echo Chosen::multiSelect('vehiculos', array(), RutaAsignada::getListaVehiculos($model),
			array(
				'data-placeholder' => 'Indique Nº, Placa, Marca, Modelo ó Tipo de Vehículo',
				'class'=>'span8',
				'options'=>array(
					//'maxSelectedOptions' => 3,
					'displaySelectedOptions' => true,
					//'noResultsText' => 'No se encontraron vehículos'
			)));*/?>
			<?php echo $form->error($vehiculos,'id_vehiculo'); ?>
			<!-- <span style="display: none;" id="vehiculos_em_" class="help-inline error"></span> -->
			<p class="help-block">Indique Nº, Placa, Marca, Modelo o Tipo de Vehículo</p>
		</div>
	</div>
	
	<div class="control-group">
		<?php echo CHtml::label('Asignar Chofer(es) <span class="required">*</span>', null,array('class'=>'control-label'));?>
			<div class="controls">
			<?php echo Chosen::activeMultiSelect($choferes, 'id_chofer', RutaAsignada::getListaChoferes($model),
			array(
				'data-placeholder' => 'Indique Nº Cédula, Nombres, Apellidos, ó Tipo de Chofer',
				'class'=>'span8',
				'options'=>array(
					//'maxSelectedOptions' => 3,
					'displaySelectedOptions' => true,
					//'noResultsText' => 'No se encontraron vehículos'
			)));?>
			<?php echo $form->error($choferes,'id_chofer'); ?>
			<!-- <span style="display: none;" id="choferes_em_" class="help-inline error"></span> -->
			<p class="help-block">Indique Nº Cédula, Nombres, Apellidos, ó Tipo de Chofer</p>
		</div>
	</div>
		
	<div class="form-actions">
		
		<?php $submit = $model->isNewRecord ? 'Registrar' : 'Actualizar'; ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$submit)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Limpiar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
