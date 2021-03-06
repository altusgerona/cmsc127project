<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Burger House</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/simple-sidebar.css"); ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
                  <div class="container">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#">The Burger House</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                      <ul class="nav navbar-nav">
                    <li>
                        <a href="admin">Order</a>
                    </li>
                    <li>
                        <a href="inventorypage">Inventory</a>
                    </li>
                    <li>
                        <a href="view">Logout</a>
                    </li>
                    
                </ul>
                    </div><!--/.navbar-collapse -->
                  </div>
                </nav>
        <br>
   <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sales Order Report
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <br>

        <div  style="float:left;">
        <table class="table table-striped table-bordered" id="ordertable">
            <thead>
                <tr>
                    <th>Ordered By</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>

            <?php foreach ($query as $key => $value): { ?>
            <tr>
                <td><?php echo $value['Orderedby'];?></td>
                <td><?php echo $value['Date'];?></td>
                <td><?php echo $value['Time'];?></td>
                <td><?php echo $value['ProductName'];?></td>
                <td><?php echo $value['Quantity'];?></td>
                <td><?php echo $value['Price'];?></td>
            </tr>    
            <?php } ?>
            <?php endforeach; ?>


        </table>

    </div>
    <div>

    </div>


    


        
        
    <script type="text/javascript">
        var capnum = 0;
        var pname;
        var dropdown1;
        var currentprice;
        var totalprice;
        var selectedquantity = 1;
        var supertotalprice = 0;
        var orderlist = new Array();
        var orderqtylist = new Array();
        function add(pnamefromclick, currprice){
             pname = pnamefromclick;
             currentprice = currprice;
             document.getElementById("printproductname").innerHTML = pname;
        }
        function insert(){

            dropdown1 = document.getElementById("quantityselect");

            selectedquantity = document.getElementById("quantityselect").value;
            totalprice = selectedquantity * currentprice;

            supertotalprice += totalprice;
            document.getElementById("totalcost").innerHTML = supertotalprice;

            var table = document.getElementById("ordertable");
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.innerHTML = pname;
            cell2.innerHTML = selectedquantity;
            cell3.innerHTML = totalprice;

            orderlist.push(pname);
            document.getElementById('orderlist').value = JSON.stringify(orderlist);;
            orderqtylist.push(selectedquantity);
            document.getElementById('orderqtylist').value = JSON.stringify(orderqtylist);;
        }

        function cleartable(){
            var table = document.getElementById("ordertable");
            var rowCount = table.rows.length;
            while(table.rows.length > 1) {
              table.deleteRow(-1);
            }
        }

        function getOrderlist(){

        }
    </script>

    <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirm Purchase</h4>
              </div>
              <div class="modal-body">
              <form method = "post" action="addinventory" name="addinventory">
                  <p>What inventory item would you like to add?</p>
                  <input type="text" placeholder="Item Name" class="form-control" id="invname" name="invname">
                  <input type="number" placeholder="Item Quantity" class="form-control" id="invqty" name="invqty">
                  <input type="number" placeholder="Item Classification" class="form-control" id="invclass" name="invclass">
    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
                <input type="submit" class = "btn btn-primary" value="Confirm">
                </form>
              </div>
            </div>
          </div>
        </div>
    <!--End Modal -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.4.min.js"); ?>"></script>
   <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

    <script type="text/javascript">
        $(document).ready( function () {
            $('#ordertable').DataTable();
        } );
    </script>

    <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="/DataTables-1.10.9/media/css/jquery.dataTables.css">

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="/DataTables-1.10.9/media/js/jquery.dataTables.js"></script>

</body>

</html>
