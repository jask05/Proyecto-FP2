<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
    <head>
    <title>:: Reportes ::</title>
    </head>
            <body>
                
                
                 <table border="1" cellspacing="1" cellpadding="2" style="font-size: 8pt">
		    <tr>
			<td><b>cItems</b></font></td>
			<td><b>cVestasID</b></font></td>
			<td><b>cService_Call</b></font></td>
			<td><b>cFromPO</b></font></td>
			<td><b>cSerial_Number</b></font></td>
			<td><b>cMAC</b></font></td>
			<td><b>dDate_Arrival</b></font></td>
			<td><b>cStatus</b></font></td>
			<td><b>dDelivery_date</b></font></td>
			<td><b>cLocation</b></font></td>
			<td><b>cComments</b></font></td>
                       		
		    </tr>
                
             <?php
              $conexion=mysql_connect("localhost","root","jask") 
                 or  die("Problemas en la conexion");
               mysql_select_db("proyecto_fp2",$conexion) 
               or  die("Problemas en la selección de la base de datos");           
         
                                    
                 $cStatus=$_POST["cStatus"];                   
                
                             
                   $registros=mysql_query("SELECT cItems,cVestasID,cService_Call,cFromPO,cSerial_Number,
                    cMAC,dDate_Arrival,cStatus,dDelivery_date,nLocation,cComments FROM stock
                    WHERE cStatus='" . $cStatus . "'",$conexion) or
                 die("Problemas en el select: ".mysql_error());
              
                if ($reg=mysql_fetch_array($registros))
                        {
                            
                            while ($reg = mysql_fetch_array($registros))
                            {
                              
                              $tabla[] = $reg['cItems'];
                              $tabla[] = $reg['cVestasID'];
                              $tabla[] = $reg['cService_Call'];
                              $tabla[] = $reg['cFromPO'];
                              $tabla[] = $reg['cSerial_Number'];
                              $tabla[] = $reg['cMAC'];
                              $tabla[] = $reg['dDate_Arrival'];
                              $tabla[] = $reg['cStatus'];
                              $tabla[] = $reg['dDelivery_date'] ;
                              $tabla[] = $reg['cLocation'];
                              $tabla[] = $reg['cComments'];
                              $tabla[] = "\r\n";
                           
                              
                            echo "<tr>";
                            echo "<td width=\"5%\">" . $reg['cItems'] . "</td>";
                            echo "<td width=\"5%\">" . $reg['cVestasID'] . "</td>";
                            echo "<td width=\"5%\">" . $reg['cService_Call'] . "</td>";
                            echo "<td width=\"5%\">" . $reg['cFromPO']. "</td>";
                            echo "<td width=\"5%\">" . $reg['cSerial_Number'] . "</td>";
                            echo "<td width=\"5%\">" . $reg['cMAC'] . "</td>";
                            echo "<td width=\"5%\">" . $reg['dDate_Arrival'] . "</td>";
                            echo "<td width=\"5%\">" . $reg['cStatus'] . "</td>";
                            echo "<td width=\"5%\">" . $reg['dDelivery_date'] . "</td>";
                            echo "<td width=\"5%\">" . $reg['cLocation']. "</td>";
                            echo "<td width=\"5%\">" . $reg['cComments'] . "</td>";
                            echo "</tr>";
                              
                                                           
                            }
                            echo "</table>";
                            
                            $tabla[] = join(" ",$tabla);        
                        
                              file_put_contents('reportes/reportes.csv', $tabla, FILE_APPEND);
                              
                              echo "<a href='reportes/reportes.csv'>Descargar reportes.csv </a>";
                                                      
                        }
                        else
                        {
                          echo "No existe usuario con este nombre.";
                        }
                        
               mysql_close($conexion);
       
                ?>
                
              
                 
                                 
            </body>
</html>