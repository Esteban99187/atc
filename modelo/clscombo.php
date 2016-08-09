<?php
    /***************************************************************
 * Nombre:ClsCargo.php
 * Fecha de creacion:Noviembre 2012
 * Programador@:Jose Silva
 * Modificado: Zoraly Gomez
 ***************************************************************/
   require_once("class_db.php");
   class clsCombo extends class_db
	{  
	  public function __construct()
	  {
	  }
	  
	  public function __destruct()
	  {
	  }
	  
      public function fGenerar($psSql,$psCampo1,$psCampo2,$psSeleccionado)
	  {
		 $lbResultado=false;
		 $this->fConectar();
		 $lrTb=$this->fFiltro($psSql);
		 while($laRow=$this->fProximo($lrTb))
         {
			$lbResultado=true;
		    $lsCampo1=$laRow[$psCampo1];
			$lsCampo2=$laRow[$psCampo2];
			if ($lsCampo1==$psSeleccionado)
			{
			   print("<option value='$lsCampo1' selected>$lsCampo2</option>");
			}
			else
			{
			   print("<option value='$lsCampo1'>$lsCampo2</option>");
			}
		 }
		 $this->fCierraFiltro($lrTb);
		 $this->fDesconectar();
		 return $lbResultado;
	  }
	  
	  public function fTabla($psSql,$psCampo1,$psCampo2,$psSeleccionado)
	  {
		 $laResultado=array();
		 $liI=0;
	  	 $this->fConectar();
		 $lrTb=$this->fFiltro($psSql);
		 while($laRow=$this->fProximo($lrTb))
         {
		    $lsCampo1=$laRow[$psCampo1];
			$lsCampo2=$laRow[$psCampo2];
			if ($lsCampo1==$psSeleccionado)
			{
			   $laResultado[$liI]="<option value='$lsCampo1' selected>$lsCampo2</option>";
			}
			else
			{
			   $laResultado[$liI]="<option value='$lsCampo1'>$lsCampo2</option>";
			}
			$liI++;
		 }
		 $this->fCierraFiltro($lrTb);
		 $this->fDesconectar();
		 return $laResultado;
	  }
   }
?>
