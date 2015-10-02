<?php
/* @var $this RespaldosController */

$this->breadcrumbs=array(
	'Respaldos',
);
?>
<h1>Respaldos</h1>

<p>
		Desde acá puede realizar los respaldos a la base de datos del sistema
</p>

<?php $this->widget('bootstrap.widgets.TbButton',
	array('buttonType'=>'link',
		'type'=>'primary',
		'label'=>'Respaldar Base de Datos',
		'url'=>array('/respaldos/bd')
	)
); ?>
