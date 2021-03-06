   <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Inventory
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div align="center">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Inventory Item</a>
        </div>
        <br>

        <div  align="center">
        <table class="table table-striped table-bordered" id="ordertable">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Item Count</th>
                    <th>Increase</th>
                    <th>Decrease</th>
                </tr>
            </thead>

            <?php foreach ($query as $row): { ?>
            <tr>
                <td><?php echo $row['itemname'];?></td>
                <td><?php echo $row['itemcount'];?></td>
                <td align="center"><a data-toggle="modal" data-target="#editInv" onclick="addQuantity('<?php echo $row['itemname'];?>')" class="btn-sm btn-warning">Add</a></td>
                <td align="center"><a data-toggle="modal" data-target="#subInv" onclick="subQuantity('<?php echo $row['itemname'];?>')" class="btn-sm btn-danger">Subtract</a></td>
            </tr>    
            <?php } ?>
            <?php endforeach; ?>


        </table>
        <br>

    </div>
    <div>

    </div>

        <script type="text/javascript">
        $(document).ready( function () {
            $('#ordertable').DataTable();
        } );
        </script>
            
        
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

    <!-- Add new inventory Modal -->
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

    <!-- Subtract inventory Modal for admin -->
        <div class="modal fade" id="subInv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subtract from Inventory</h4>
              </div>
              <div class="modal-body">
              <form action="subfrominventory" method="POST">
                <p id="subinventoryp"></p>
                <input type="number" class="form-control" id="subqty" name="subqty" placeholder="Subtract by how much.">
                <input type="hidden" class="form-control" id="itemnamesub" name="itemnamesub">
              

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Confirm">
              </form>
              </div>
            </div>
          </div>
        </div>
    <!--End Modal -->


   <!-- Add inventory Modal for admin -->
        <div class="modal fade" id="editInv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add to Inventory</h4>
              </div>
              <div class="modal-body">
              <form action="editinventory" method="POST">
                <p id="addinventoryp"></p>
                <input type="number" class="form-control" id="addqty" name="addqty" placeholder="Add by how much.">
                <input type="hidden" class="form-control" id="itemname" name="itemname">
              

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Confirm">
              </form>
              </div>
            </div>
          </div>
        </div>
    <!--End Modal -->