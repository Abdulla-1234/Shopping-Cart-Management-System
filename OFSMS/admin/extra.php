<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ofsmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$ofsmsaid=$_SESSION['ofsmsaid'];
 $cname=$_POST['cname'];

$sql="insert into tblcategory(CategoryName)values(:cname)";
$query=$dbh->prepare($sql);
$query->bindParam(':cname',$cname,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Category has been added.")</script>';
echo "<script>window.location.href ='add-category.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Data Table | jeweler - Material Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
    ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
    ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
    ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
    ============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
    ============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
    ============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
    ============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
    ============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- x-editor CSS
    ============================================ -->
    <link rel="stylesheet" href="css/editor/select2.css">
    <link rel="stylesheet" href="css/editor/datetimepicker.css">
    <link rel="stylesheet" href="css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="css/editor/x-editor-style.css">
    <!-- normalize CSS
    ============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
    ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
   
   <?php include_once('includes/sidebar.php');?>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <?php include_once('includes/header.php');?>
        
        <!-- Basic Form Start -->
       <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Products <span class="table-project-n">Data</span> Table</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control">
                        <option value="">Export Basic</option>
                        <option value="all">Export All</option>
                        <option value="selected">Export Selected</option>
                      </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">ID</th>
                                                <th data-field="name" data-editable="true">Product Title</th>
                                                <th data-field="company" data-editable="true">Stock</th>
                                                <th data-field="price" data-editable="true">Price</th>
                        <th data-field="date" data-editable="true">Date</th>
                        <th data-field="task" data-editable="true">Status</th>
                        <th data-field="email" data-editable="true">Total Sales</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>1</td>
                                                <td>Product Title</td>
                                                <td>Out Of Stock</td>
                        <td>$54</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>2</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>3</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>4</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>5</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>6</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>7</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>8</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>9</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>10</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>11</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>12</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>13</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>14</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>15</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>16</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>17</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>18</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>19</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>20</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>21</td>
                                                <td>Product Title</td>
                                                <td>In Of Stock</td>
                        <td>$5</td>
                        <td>Jul 14, 2017</td>
                                                <td>Active</td>
                        <td>$700</td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Basic Form End-->
        <?php include_once('includes/footer.php');?>
    </div>

     <!-- jquery
    ============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
    ============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
    ============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
    ============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
    ============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
    ============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
    ============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
    ============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
    ============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
    ============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- data table JS
    ============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
    ============================================ -->
    <script src="js/editable/jquery.mockjax.js"></script>
    <script src="js/editable/mock-active.js"></script>
    <script src="js/editable/select2.js"></script>
    <script src="js/editable/moment.min.js"></script>
    <script src="js/editable/bootstrap-datetimepicker.js"></script>
    <script src="js/editable/bootstrap-editable.js"></script>
    <script src="js/editable/xediable-active.js"></script>
    <!-- Chart JS
    ============================================ -->
    <script src="js/chart/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- tab JS
    ============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
    ============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
    ============================================ -->
    <script src="js/main.js"></script>
</body>

</html>
<?php }  ?>