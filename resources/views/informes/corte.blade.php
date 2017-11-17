@extends('inicio.app')
@section('contenido')

<div class="content">
  <div class="row">

    <?php $abierto=0; $cerrado=0; $cobrar=0; $cobrados=0; $eliminado=0;?>
    <h1>Resumen Diaro de Pedidos</h1>
    <div class="table-responsive">
      <table class="table table-condensed table-striped">
        @foreach ($resumen as $resumen)
          <tr>
            <?php 
                if ($resumen->status==0){ echo "<td>Tickets Abiertos:</td><td>".$resumen->user_count."</td>";} 
                if ($resumen->status==1){ echo "<td>Tickets por Despachar:</td><td>".$resumen->user_count."</td>";}
                if ($resumen->status==2){ echo "<td>Tickets por Cobrar:</td><td>".$resumen->user_count."</td>";}
                if ($resumen->status==3){ echo "<td>Tickets Cobrados:</td><td>".$resumen->user_count."</td>";}
                if ($resumen->status==4){ echo "<td>Tickets Eliminados:</td><td>".$resumen->user_count."</td>";}
            ?>
          </tr>        
        @endforeach
      </table>
      <div> 

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
                  if ($cobrado[$i]->status==3){
                    $eliminado=$cobrado[$i]->total+$eliminado;
                  }
                }
        ?>
      </div>
  
      <table class="table table-condensed table-striped">
        <tr><td colspan="2"> <h1>Resumen Pedios $ </h1></td></tr>
        <tr><td>Tickets Abiertos:</td><td><?php echo $abierto; ?></td></tr></tr>
        <tr><td>  Tickets por Despachar:</td><td><?php echo $cerrado; ?></td></tr>
        <tr><td>Tickets por Cobrar:</td><td><?php echo $cobrar; ?></td></tr>
        <tr><td>Tickets Cobrados:</td><td><?php echo $cobrados; ?></td></tr>
        <tr><td>Tickets Eliminados:</td><td><?php echo $eliminado; ?></td></tr>
      </table>
    
    </div><!-- div table responsive -->

  </div>
</div>

@endsection