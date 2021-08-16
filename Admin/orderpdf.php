<?php
require('vendor/autoload.php');
require('connection_inc.php');
require('functions_inc.php');
?>

<?php
//$con=mysqli_connect('localhost','root','','ecom');
//$sql = "SELECT * FROM orders order by id asc";
  //$res = mysqli_query($con, $sql);
$res=mysqli_query($con,"SELECT * FROM orders");
if(mysqli_num_rows($res)>0){
	$html='<style></style><table class="table">';
		$html.='<tr>
              <td id </td>
              <td item_name</td>
              <td customer_name </td>
              <td quantity</td>
              <td price </td>
              <td mobile</td>
              <td address </td>
			  <td status </td>
             </tr>';
		while($row=mysqli_fetch_assoc($res)){
			$html.='<tr>
			<td>'.$row['id'].'</td>
			<td>'.$row['item_name'].'</td>
			<td>'.$row['customer_name'].'</td>
			<td>'.$row['quantity'].'</td>
			<td>'.$row['price'].'</td>
			<td>'.$row['mobile'].'</td>
			<td>'.$row['address'].'</td>
			<td>'.$row['status'].'</td>
			</tr>';
		}
	$html.='</table>';
}else{
	$html="Data not found";
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file='media/'.time().'.pdf';
$mpdf->output($file,'I');
//D
//I
//F
//S
//new
?>