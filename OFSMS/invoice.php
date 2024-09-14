<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ofsmsuid']==0)) {
  header('location:logout.php');
  } else{


$userid= $_SESSION['ofsmsuid'];
$oid= $_GET['odid'];
$sql1="SELECT * from tblorder where UserID=:userid && OrderNumber=:odid";
$query1 = $dbh -> prepare($sql1);
$query1-> bindParam(':userid', $userid, PDO::PARAM_STR);
$query1-> bindParam(':odid', $oid, PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount() > 0)
{
foreach($results1 as $row1)
{               ?>
<div id="exampl">
	<table border="1" width="100%">
		<tr>
			<th>Order Number</th>
			<td><?php echo $_GET['odid'];?> </td>
			<th>Order Date</th>
			<td><?php echo $row1->OrderDate;?></td>
		</tr>
		<tr>
			<th>Name</th>
			<td><?php echo $row1->FullName;?></td>
			<th>Contact Number</th>
			<td><?php echo $row1->ContactNumber;?></td>
			

		</tr>
		<tr>
			<th>Address</th>
			<td colspan="3"><?php echo $row1->ContactNumber;?>
				<?php echo $row1->FlatNo;?>, 
				<?php echo $row1->StreetName;?><br />
				<?php echo $row1->Area;?>
				<?php echo $row1->Landmark;?><br />
				<?php echo $row1->City;?>-<?php echo $row1->Zipcode;?><br />
				<?php echo $row1->State;?>
			</td>
		</tr>
			
		</tr>
	</table>
<?php } } ?>

<table class="table table-bordered" cellpadding="10" cellspacing="1" style="padding-top: 20px" border="1">
<tbody>
			   <tr>
	<th style="text-align:left;">Product Image</th>
<th style="text-align:left;">Product Name</th>
<th style="text-align:left;">Order Number</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Price</th>

</tr>	
			   						<?php 

$sql="SELECT tblorder.OrderNumber,tblorder.OrderDate,tblproducts.ProductTitle,tblproducts.SalePrice,tblproducts.Image,tblorderdetails.ProductId,tblorderdetails.ProductQty from  tblorder 
join tblorderdetails on tblorderdetails.OrderNumber=tblorder.OrderNumber 
join tblproducts on tblorderdetails.ProductId=tblproducts.ID 
where tblorder.UserID=:userid and tblorder.OrderNumber=:odid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':userid', $userid, PDO::PARAM_STR);
$query-> bindParam(':odid', $oid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>



				<tr>
				<td><img class="b-goods-f__img img-scale" src="admin/images/<?php echo $row->Image;?>" alt="" width='200' height='120'></td> 
				<td><?php echo $row->ProductTitle;?></td>
				<td><?php echo $row->OrderNumber;?></td>
				<td><?php echo $qty=$row->ProductQty;?></td>
				<td><?php echo $total=$row->SalePrice;?></td>

       </tr>



       <?php
$grandtotal+=$total;
$gqty+=$qty;
        $cnt=$cnt+1; }} ?>
       <tr>
<td colspan="3" align="right">Total:</td>
<td><strong><?php echo $gqty; ?></strong></td>
<td><strong><?php echo "Rs. ".number_format($grandtotal, 2); ?></strong></td>
</tr>
</tbody>
</table>
</div>
  <button class="btn btn-primary" style="cursor: pointer;"  OnClick="CallPrint(this.value)" >Print</button>
       <script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
}

</script>
<?php } ?>