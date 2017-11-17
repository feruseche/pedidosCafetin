@extends('inicio.app')
@section('contenido')

<?php 
  $abierto=0; $cerrado=0; $cobrar=0; $cobrados=0; $eliminado=0;
  $abi=0; $des=0; $cob=0; $cod=0; $anu=0;
?>
<?php 
  for($i=0;$i<$nr;$i++){
    if ($cobrado[$i]->status==0){
      $abierto=$cobrado[$i]->total+$abierto;
    }

    if ($cobrado[$i]->status==1){
      $cerrado=$cobrado[$i]->total+$cerrado;
    }

    if ($cobrado[$i]->status==2){
      $cobrar=$cobrado[$i]->total+$cobrar;
    }

    if ($cobrado[$i]->status==3){
      $cobrados=$cobrado[$i]->total+$cobrados;
    }

    if ($cobrado[$i]->status==4){
      $eliminado=$cobrado[$i]->total+$eliminado;
    }
  }
?>

<div class="content">

  @foreach ($resumen as $resumen)
      <?php 
          if ($resumen->status==0){ $abi=$resumen->user_count;} 
          if ($resumen->status==1){ $des=$resumen->user_count;}
          if ($resumen->status==2){ $cob=$resumen->user_count;}
          if ($resumen->status==3){ $cod=$resumen->user_count;}
          if ($resumen->status==4){ $anu=$resumen->user_count;}
      ?>
  @endforeach

  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <div class="table-responsive">
        <table class="table table-condensed table-striped">
          <tr><td colspan="3" style="text-align: center;"><h1>Cuadre de Mi Caja</h1></td></tr>
          <tr>
            <td><h4>Tickets Abiertos</h4></td>
            <td><h4>( {{ $abi }} )</h4></td>
            <td style="text-align: right;"><h4>$ <?php echo number_format($abierto,0,',','.'); ?></h4></td></tr></tr>
          <tr>
            <td><h4>Tickets por Despachar</h4></td>
            <td><h4>( {{ $des }} )</h4></td>
            <td style="text-align: right;"><h4>$ <?php echo number_format($cerrado,0,',','.'); ?></h4></td>
          </tr>
          <tr>
            <td><h4>Tickets por Cobrar</h4></td>
            <td><h4>( {{ $cob }} )</h4></td>
            <td style="text-align: right;"><h4>$ <?php echo number_format($cobrar,0,',','.'); ?></h4></td>
          </tr>
          <tr>
            <td><h4>Tickets Cobrados</h4></td>
            <td><h4>( {{ $cod }} )</h4></td>
            <td style="text-align: right;"><h4>$ <?php echo number_format($cobrados,0,',','.'); ?></h4></td>
          </tr>
          <tr style="color: red;">
            <td><h4>Tickets Eliminados</h4></td>
            <td><h4>( {{ $anu }} )</h4></td>
            <td style="text-align: right;"><h4>$ <?php echo number_format($eliminado,0,',','.'); ?></h4></td>
          </tr>
        </table>
      </div><!-- div table responsive -->
    </div>
  </div>

</div><!-- content -->

@endsection