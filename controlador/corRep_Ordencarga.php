<?php
	require_once("../modelo/clsRep_ordencarga.php");
   session_start(); // se reciben las variables $_SESSION
   if(array_key_exists(txtoperacion,$_POST))
   {
	   $lsbusqueda=$_POST["cmbbusqueda"];
	   $lsOperacion=$_POST["txtoperacion"];
	   $lobjbusqueda= new clsRep_ordencarga(); 
	   $lobjbusqueda->fSetsbusqueda($lsbusqueda);
   }
   
   if ($lsOperacion=="buscar")
   {
	 $_SESSION['matriz']=$lobjbusqueda->fBusqueda();
	 
	  if(count($_SESSION['matriz'])>0){
		 $liHay=1; 
		
	  }else if (count($_SESSION['matriz'])==0){
		 $liHay=0;
		
	  }
	  $lsbusqueda=$lobjbusqueda->fGetsbusqueda();
			
			header("location: ../vista/visRep_ordencarga.php?lsOperacion=$lsOperacion&liHay=$liHay&lsbusqueda=$lsbusqueda");
   }
   
   
   if ($lsOperacion!="buscar"){
	   
		header("location: ../vista/visRep_ordencarga.php?lsOperacion=$lsOperacion");
   }
   
?>
