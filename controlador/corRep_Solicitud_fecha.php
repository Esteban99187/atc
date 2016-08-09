<?php
	require_once("../modelo/clsRep_Solicitud_fecha.php");
   session_start(); // se reciben las variables $_SESSION
   if(array_key_exists(txtoperacion,$_POST))
   {
	   $lsbusqueda=$_POST["cmbbusqueda"];
	   $lsfini=$_POST["txtfini"];
	   $lsfin=$_POST["txtfin"];
	   $lsOperacion=$_POST["txtoperacion"];
	   $lobjbusqueda= new clsRep_Solicitud_fecha(); 
	   $lobjbusqueda->fSetsbusqueda($lsbusqueda);
	   $lobjbusqueda->fSetsfini($lsfini);
	   $lobjbusqueda->fSetsfin($lsfin);
   
   if ($lsOperacion=="buscar")
   {
	 $_SESSION['matriz']=$lobjbusqueda->fBusqueda();
	 
	  if(count($_SESSION['matriz'])>0){
		 $liHay=1; 
		
	  }else if (count($_SESSION['matriz'])==0){
		 $liHay=0;
		
	  }
	  $lsbusqueda=$lobjbusqueda->fGetsbusqueda();
			
			header("location: ../vista/admin.php?url=visRep_Solicitud_fecha&lsOperacion=$lsOperacion&liHay=$liHay&lsbusqueda=$lsbusqueda&lsfini=$lsfini&lsfin=$lsfin");
   }
}
  
?>
