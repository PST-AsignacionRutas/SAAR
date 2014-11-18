<table width="955" border="0">
  <tr>
    <td height="21"><div align="center">
      <p><strong>SOLICITUD DE VEHICULOS</strong></p>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="953" height="131" border="1">
  <tr>
    <td width="272"><strong>N°: <?php echo $model->id?></strong></td>
    <td width="665"><strong> Fecha: </strong>14-06-2014</td>
  </tr>
  <tr>
    <td><strong>Unidad Organizativa Solicitante:</strong></td>
    <td><?php echo $model->solicitante?></td>
  </tr>
  <tr>
    <td><strong>Recorrido del viaje</strong>:</td>
    <td><?php echo $model->recorrido?></td>
  </tr>
</table>
<table width="953" border="1">
  <tr>
    <td width="415"><div align="center"><strong>SALIDA</strong></div></td>
    <td width="509"><div align="center"><strong>RETORNO</strong></div></td>
  </tr>
  <tr>
    <td><strong>Lugar: </strong><?php echo $model->lugar_encuentro?></td>
    <td><strong>Lugar: </strong><?php echo $model->lugar_encuentro_llegada?></td>
  </tr>
  <tr>
    <td><strong>Fecha: </strong><?php echo $model->fecha_salida?></td>
    <td><strong>Fecha: </strong><?php echo $model->fecha_llegada?></td>
  </tr>
  <tr>
    <td><strong>Hora: </strong><?php echo $model->hora_salida?></td>
    <td><strong>Hora: </strong><?php echo $model->hora_llegada?></td>
  </tr>
</table>
<table width="953" border="1">
  <tr>
    <td width="202"><strong>Nº de personas a transportar:</strong></td>
    <td width="735"><?php echo $model->n_personas?></td>
  </tr>
  <tr>
    <td><strong>Motivo del viaje:</strong></td>
    <td><?php echo $model->motivo?></td>
  </tr>
  <tr>
    <td><strong>Responsable del viaje</strong>:</td>
    <td><?php echo $model->responsable?></td>
  </tr>
  <tr>
    <td><strong>Aprobada: ( )</strong></td>
    <td><strong> Justificar:</strong></td>
  </tr>
  <tr>
    <td><strong>Rechazada:( )</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Choferes designados:</strong></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p> </p>
<table width="883" border="0">
  <tr>
    <td width="406"><div align="center"><strong>Sello y firma de la Unidad  solicitante&nbsp;</strong></div></td>
    <td width="467"><div align="center"><strong> Sello y firma Coord.  Transporte&nbsp;</strong></div></td>
  </tr>
</table>
