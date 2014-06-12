<h1><?php echo ucwords(CrugeTranslator::t("eliminar usuario"));?></h1>
<div class="form">
<?php
	/*
		$model:  es una instancia que implementa a ICrugeStoredUser
	*/
?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'crugestoreduser-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'htmlOptions'=>array('class'=>'well'),
)); ?>
<h2><?php echo $model->username; ?>
    <?php echo $model->email; ?>
</h2>
<p>
	<?php echo ucfirst(CrugeTranslator::t("marque la casilla para confirmar la eliminacion")); ?>
	<?php echo $form->checkBox($model,'deleteConfirmation'); ?>
	<?php echo $form->error($model,'deleteConfirmation'); ?>
</P>
<div class="row buttons">
	<?php //Yii::app()->user->ui->tbutton("Eliminar Usuario"); ?>
	<?php //Yii::app()->user->ui->bbutton("Volver",'cancelar'); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Eliminar usuario')); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Volver', 
	'htmlOptions' => array(
        'name' => 'cancelar',
    ),)); ?>
</div>
<?php echo $form->errorSummary($model); ?>
<?php $this->endWidget(); ?>
</div>
