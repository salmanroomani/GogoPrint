
<!doctype html>
<html lang="en">
<head>
    <title>GogoPrint Assignment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- css files -->
    <link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
    <!-- /css files -->
</head>
<body>
<h1 class="header-w3ls"><img src="images/logo.png" width="450px" height="auto" /></h1>
<div class="content-w3ls">
    <div class="form-w3ls">
        <div style="width:100%;margin-bottom:25px;">
            <label  style="font-size:30px;font-weight:bold;color:#f4ce15">All Orders</label>
        </div>
        <div class="content-wthree3">
            <div class="form-control">
                <Table id="tblOrdersList">
                    <tr>
                        <th>Paper Format</th>
                        <th>Page</th>
                        <th>Paper Type</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Processing Days</th>
                        <th>Due Date</th>
                    </tr>
                </Table>
                <div class="clear"></div>
            </div>
        </div>
        <div class="content-wthree4">
            <div style="text-align:right;" class="form-control">
                <input  type="button" onclick="document.location.href='index.php';" class="transparent_btn yellow" value="Go Back">

                <div class="clear"></div>
            </div>
        </div>

    </div>
</div>

<p class="copyright">© 2019 Feedback Form. All Rights Reserved | Design by <a href="https://www.gogoprint.com.my/" target="_blank">GogoPrint</a></p>
<script src="js/jquery.js"></script>
<script src="js/date.js"></script>
<script>

    $( document ).ready(function() {

        // Populating Orders List
        $.ajax({
            type: "POST",
            data: {},
            url: 'api/Orders/ListAllOrders.php',
            dataType: 'json',
            success: function(res) {

                var html="";
                var price=0;
                for(i=0;i<res.length;i++)
                {
                   if(res[i].ProcessingDays == 1)
                       price=((parseInt(res[i].Price) * 0.5 ) + parseInt(res[i].Price)).toFixed();
                   else if(res[i].ProcessingDays == 2)
                       price=((parseInt(res[i].Price) * 0.3 ) + parseInt(res[i].Price)).toFixed();
                   else if(res[i].ProcessingDays == 3)
                       price=((parseInt(res[i].Price) * 0.15 ) + parseInt(res[i].Price)).toFixed();
                   else
                       price = res[i].Price;

                    html+="<tr>";
                    html+="<td>"+res[i].PaperFormat+"</td>";
                    html+="<td>"+res[i].Page+"</td>";
                    html+="<td>"+res[i].PaperType+"</td>";
                    html+="<td>"+res[i].Quantity+"</td>";
                    html+="<td>"+price+" TBH</td>";
                    html+="<td>"+res[i].ProcessingDays+"</td>";
                    html+="<td>"+res[i].DueDate+"</td>";
                    html+="</tr>";
                }
                //Generating the Price Table
                $("#tblOrdersList").append(html);
            }
        });

    });

</script>
</body>
</html>
<?php
