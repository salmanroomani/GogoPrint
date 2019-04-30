
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
                <label  style="font-size:30px;font-weight:bold;color:#f4ce15">Business Cards</label>
            </div>
            <div class="content-wthree1">
                <div class="grid-agileits1">
                    <div class="form-control">
                        <label class="header">Format</label>
                        <select onchange="GetPriceTable()" id="PaperFormat">

                        </select>
                    </div>

                    <div class="form-control">
                        <label class="header">Paper Type</label>
                        <select onchange="GetPriceTable()" id="PaperType">

                        </select>
                    </div>


                </div>
                <div class="grid-w3layouts2" style="margin-top :12px">
                    <div class="w3-agile2">
                        <label class="rating">Pages</label>
                        <ul id="Pages" style="margin-left:100px !important">

                        </ul>
                    </div>
                </div>

                <div class="clear"></div>
            </div>

            <div style="width:100%;margin-bottom:15px;">
                <label  style="font-size:30px;font-weight:bold;color:#f4ce15">Pricing</label>
            </div>
            <div class="content-wthree3">
                <div id="PriceTable" class="form-control">

                    <div class="clear"></div>
                </div>
            </div>
            <div class="content-wthree4">
                <div style="text-align:right;" class="form-control">
               <input  type="button" onclick="document.location.href='OrdersList.php';" class="transparent_btn Blue" value="List All Orders in Database">

                    <input  type="button" onclick="AddToCart()" class="transparent_btn yellow" value="Add To Cart">

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

        // Populating Form Options
        $.ajax({
            type: "POST",
            data: {},
            url: 'api/ConfigurationTypes/GetFormOptions.php',
            dataType: 'json',
            success: function(res) {

               var html="";
               var checked="";
                for(i=0;i<res.length;i++)
               {
                   if(res[i].TypeName=="PaperFormat")
                   {
                       $("#PaperFormat").append("<option value='"+res[i].id+"' >"+res[i].TypeValue+"</option>");
                   }
                   else if(res[i].TypeName=="PaperType")
                   {
                       $("#PaperType").append("<option value='"+res[i].id+"' >"+res[i].TypeValue+"</option>");
                   }
                   else if(res[i].TypeName=="Pages")
                   {
                       if(html=="")
                           checked='checked="checked"';
                       else
                           checked='';
                       html +=' <li>  <input type="radio" value="'+res[i].id+'" '+checked+'  id="'+res[i].id+'" name="Page">';
                       html +=' <label for="'+res[i].id+'">'+res[i].TypeValue+'</label>'
                       html+=' <div class="check"></div> </li>';
                   }

               }
                $("#Pages").html(html);

                // On Page radio button change call function to update the price table
                $("input[name=Page]:radio").change(function () {
                    GetPriceTable();
                });
                // After Populating Form Options Get the Price Table
                GetPriceTable();

            }
        });

    });

    function GetPriceTable()
    {
        var PaperFormat = $("#PaperFormat").val();
        var Page = $("input[name='Page']:checked").val();
        var PaperType = $("#PaperType").val();

        $.ajax({
            type: "GET",
            data: {PaperFormat:PaperFormat,Page:Page,PaperType:PaperType},
            url: 'api/ConfigurationPricing/GetPriceTable.php',
            dataType: 'json',
            success: function(res) {

                var html="<table> <tr> <th>Qty </th>";
                // Creating Date Table Header
                var startDate = new Date();
                var endDate = "", noOfDaysToAdd = 4, count = 0;
                var day=[];
                while(count < noOfDaysToAdd){
                    endDate = new Date(startDate.setDate(startDate.getDate() + 1));
                    if(endDate.getDay() != 0){ // if sunday then skip
                        html+="<th>"+endDate.toString('ddd / MM / yyyy')+"</th>";
                        day[count]=endDate.toString('dd/MM/yyyy');
                        count++;
                    }
                }
                html+="</tr>";
                // Adding Pricing to table
                var checked="";

                for(i=0;i<res.length;i++)
                {
                  if(i==0)
                      checked="checked='checked'";
                  else
                      checked="";
                  var FirstDayPrice= ((parseInt(res[i].Price) * 0.5 ) + parseInt(res[i].Price)).toFixed();
                  var SecondDayPrice= ((parseInt(res[i].Price) * 0.3 ) + parseInt(res[i].Price)).toFixed();
                  var ThirdDayPrice= ((parseInt(res[i].Price) * 0.15 ) + parseInt(res[i].Price)).toFixed();
                    html+="<tr>";
                    html+="<td><p style='font-weight: :bold;font-size: 18px;'>"+res[i].Quantity+"</td>";
                    //Day 1
                    html +='<td> <label class="container"><input type="radio" '+checked+' value="'+res[i].id+"|1|"+day[0]+'" + checked+ name="PriceRadio"> '+FirstDayPrice+ ' THB';
                    html+='   <span class="checkmark"></span> </label></td>';
                    //Day 2
                    html +='<td> <label class="container"><input type="radio" value="'+res[i].id+"|2|"+day[1]+'" + + checked+ name="PriceRadio"> '+SecondDayPrice+ ' THB';
                    html+='   <span class="checkmark"></span> </label></td>';
                    //Day 3
                    html +='<td> <label class="container"><input type="radio" value="'+res[i].id+"|3|"+day[2]+'" + + checked+ name="PriceRadio"> '+ThirdDayPrice+ ' THB';
                    html+='   <span class="checkmark"></span> </label></td>';
                    //Day 4
                    html +='<td> <label class="container"> <input type="radio" value="'+res[i].id+"|4|"+day[3]+'" + + checked+ name="PriceRadio"> '+res[i].Price+ ' THB';
                    html+='   <span class="checkmark"></span> </label></td>';
                    html+="</tr>";
                }
                //Generating the Price Table
                $("#PriceTable").html(html);

            }
        });
    }
    function AddToCart()
    {
        var PriceRadio = $("input[name='PriceRadio']:checked").val();
        var res = PriceRadio.split("|");
        var ConfigurationID=res[0];
        var ProcessingDays=res[1];
        var DueDate = res[2];

        $.ajax({
            type: "POST",
            data: {ConfigurationID:ConfigurationID,ProcessingDays:ProcessingDays,DueDate:DueDate},
            url: 'api/AddCart/AddToCart.php',
            dataType: 'json',
            success: function(res) {
                alert("Successfully Added To Cart");
            }
        });

    }
</script>
</body>
</html>
