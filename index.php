
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Certificat de Nastere</title>
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
     <style>
    .wrapper {
    margin: -150px auto;
    max-width:580px;
}
</style>
    </head>
<body >

  <div class="wrapper">  
    <form name="certificat" method="post" action="">
    
    <tr>
      
          <td valign="top"><table width="739" height="895" border="0" align="center"  bordercolor="#000033" bgcolor="#FFFFFF">
            <tr height="">
              <td height="auto" colspan="3" align="center" bordercolor="#CC0000" bgcolor=""></td>
            </tr>
            <tr>
              <td align="right" height="44">
			  <div align="center" class="style5 style15"><strong>Cod Numeric Personal</strong></div></td>
              <td>
			    
		        <div align="left">
		          <input name="cnp" type="text" size="50"  />
		          <br>
                </div></td>
            </tr>
			
            <tr>
              <td height="32" align="right">
			  <div align="center" class="style5 style15"><strong>Nume</strong></div></td>
              <td>
			    
		        <div align="left">
		          <input name="nume" type="text" size="50"  />
                </div></td>
            </tr>

            <tr>
              <td height="32" align="right">
			  <div align="center" class="style5 style15"><strong>Prenume</strong></div></td>
              <td>
			    
		        <div align="left">
		          <input name="prenume" type="text" size="50"  />
                </div></td>
            </tr>

            <tr>
              <td height="39" align="right">
			  <div align="center" class="style5 style15"><strong>Sexul </strong></div></td>
              <td>
			    
		        <div align="left">
		          <label>
		          <select name="sexul">
		            <option>Masculin</option>
		            <option>Feminin</option>
	              </select>
		          </label>
		        </div></td>
            </tr>
            
            <tr>
              <td height="33" align="right">
			  <div align="center" class="style5 style15"><strong>Data Nasterii </strong></div></td>
              <td>
			    
		        <div align="left">
		          <input name="dob" type="date" size="50" />
                </div></td>
            </tr>
            <tr>
              <td height="32" align="right">
			  <div align="center" class="style5 style15"><strong>Locul Nasterii</strong></div></td>
              <td>
			    
		        <div align="left">
		          <input name="pob" type="text" size="50"  />
                </div></td>
            </tr>
            <tr>
              <td height="33" align="right">
			  <div align="center" class="style5 style15"><strong>Nume Familie Parinte 1</strong></div></td>
              <td>
			    
		        <div align="left">
		          <input name="nume_familie_parinte1" type="text" size="50"  />
                </div></td>
            </tr>
			
			<tr>
              <td height="35" align="right">
			  <div align="center" class="style5 style15"><strong>Prenume Parinte 1</strong></div></td>
              <td>
			    
		        <div align="left">
		          <input name="prenume_parinte1" type="text" size="50"  />
                </div></td>
            </tr>
			

<tr>
              <td height="35" align="right">
			  <div align="center" class="style5 style15"><strong>Nume Familie Parinte 2</strong></div></td>
              <td>
			    
		        <div align="left">
		          <input name="nume_familie_parinte2" type="text" size="50"  />
                </div></td>
            </tr>
            <tr>
              <td height="35" align="right">
			  <div align="center" class="style5 style15"><strong>Prenume Parinte 2</strong></div></td>
              <td>
			    
		        <div align="left">
		          <input name="prenume_parinte2" type="text" size="50" p/>
                </div></td>
            </tr>			
			     <tr>
              <td align="center" colspan="3"><input type="submit" name="submit"  value="Trimite"></td>
            </tr>
          
      </table></td>
    </tr>
  </table>
  
</form>
</div>



</body>
</html>


<?php
 include('config.php');
if(isset($_POST['submit']))
{
$post_cnp=$_POST['cnp'];
$post_nume=$_POST['nume'];
$post_prenume=$_POST['prenume'];
$post_sexul=$_POST['sexul'];
$post_dob=$_POST['dob'];
$post_pob=$_POST['pob'];
$post_nume_familie_parinte1=$_POST['nume_familie_parinte1'];
$post_prenume_parinte1=$_POST['prenume_parinte1'];
$post_nume_familie_parinte2=$_POST['nume_familie_parinte2'];
$post_prenume_parinte2=$_POST['prenume_parinte2'];


if($post_cnp=='' or $post_nume==''  )
{
 echo "<script>alert('Completati toate campurile! ')</script>";
 
}


$query= "insert into data
(cnp,nume,prenume,sexul,dob,pob,nume_familie_parinte1,prenume_parinte1,nume_familie_parinte2,prenume_parinte2)
values('$post_cnp','$post_nume','$post_prenume','$post_sexul','$post_dob','$post_pob','$post_nume_familie_parinte1','$post_prenume_parinte1','$post_nume_familie_parinte2','$post_prenume_parinte2')";
if(mysqli_query( $conn, $query) )
 {

echo  "<script>alert('Datele dumneavoastra au fost inregistrate')</script>";
 }
 else
 {
 echo "<script>alert('Datele dumneavoastra nu au fost inregistrate')</script>";
 }
}

?>