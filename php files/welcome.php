<?php 
// INSERT INTO `inventory` (`S.no`, `Employee Name`, `Employee Type`, `Division`, `Room no`, `Type`, `Make-Brand`, `Model No`, `Serial No`, `Status`, `Processor`, `Ram`, `Hdd`, `Purchase Date`, `Warranty`, `AMC`) VALUES ('1', 'ARYAN MISHRA', 'Regular', 'EMR', 's92', 'COMPUTER', 'hp', 'nan', '78', 'WORKING', 'intel', '8 gb', '128 gb', '2022-08-03', 'YES', 'YES');
$insert= false;
// Connect to the Database ;;;;
$servername = "localhost";
$username = "root";
$password = "";
$database = "CSIR";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
if(isset( $_POST['SnoEdit'])){
    // echo"yes";  update querry
    $Sno = $_POST["SnoEdit"];
    $employee_name = $_POST['EMPLOYEE_NAME'];
    $employee_type = $_POST['EMPLOYEE_TYPE'];
    $division = $_POST['DIVISION'];
    $room_no = $_POST['ROOM_NO'];
    $type = $_POST['TYPE'];
    $make_brand = $_POST['MAKE-BRAND_NAME'];
    $model_no = $_POST['MODEL_NO'];
    $serial_no = $_POST['SERIAL_NO'];
    $status = $_POST['STATUS'];
    $processor = $_POST['PROCESSOR'];
    $ram = $_POST['RAM'];
    $hdd = $_POST['HDD'];

    $purchase_date = $_POST['PURCHASEDATE'];
    $warranty = $_POST['WARRANTY'];
    $amc = $_POST['AMC'];

    // sql query to be executed

    $sql = "UPDATE `inventory` SET `Employee Name` = '$employee_name' ,`Employee Type` = '$employee_type' , `Division` = '$division' , `Room no` = '$room_no' , `Type` = '$type' , `Make-Brand` = '$make_brand' , `Model No` = '$model_no' , `Serial No`  = '$serial_no' , `Status` = '$status' ,`Processor` = '$processor' , `Ram` = '$ram' , `Hdd` = '$hdd' ,`Purchase Date` = '$purchase_date' , `Warranty` = '$warranty' , `AMC` = '$amc' WHERE `inventory`.`S.no` = $Sno";
    
    // $sql = "UPDATE `inventory` SET `Employee Name` = '$employee_name' AND `Employee Type` = '$employee_type' AND `Division` = '$division' AND `Room no` = '$room_no' AND `Type` = '$type' AND `Make-Brand` = '$make_brand' AND `Model No` = '$model_no' AND `Serial No`  = '$serial_no' AND `Status` = '$status' AND `Processor` = '$processor' AND `Ram` = '$ram' AND `Hdd` = '$hdd' AND `Purchase Date` = '$purchase_date' AND `Warranty` = '$warranty' AND `AMC` = '$amc' WHERE `inventory`.`S.no` = $Sno";
    
    $result = mysqli_query($conn,$sql);

    if($result){
        echo"inserted succesfully";
    }
    else{
        echo"not inserted". mysqli_error($conn);

    }

}

else{
$employee_name = $_POST['EMPLOYEE_NAME'];
    $employee_type = $_POST['EMPLOYEE_TYPE'];
    $division = $_POST['DIVISION'];
    $room_no = $_POST['ROOM_NO'];
    $type = $_POST['TYPE'];
    $make_brand = $_POST['MAKE-BRAND_NAME'];
    $model_no = $_POST['MODEL_NO'];
    $serial_no = $_POST['SERIAL_NO'];
    $status = $_POST['STATUS'];
    $processor = $_POST['PROCESSOR'];
    $ram = $_POST['RAM'];
    $hdd = $_POST['HDD'];

    $purchase_date = $_POST['PURCHASEDATE'];
    $warranty = $_POST['WARRANTY'];
    $amc = $_POST['AMC'];

    // sql query to be executed

    $sql = "INSERT INTO `inventory` (`Employee Name`, `Employee Type`, `Division`, `Room no`, `Type`, `Make-Brand`, `Model No`, `Serial No`, `Status`, `Processor`, `Ram`, `Hdd`, `Purchase Date`, `Warranty`, `AMC`) VALUES ('$employee_name', '$employee_type', '$division', '$room_no', '$type', '$make_brand', '$model_no', '$serial_no', '$status', '$processor', '$ram', '$hdd', '$purchase_date', '$warranty', '$amc')";

    $result = mysqli_query($conn,$sql);
    if($result){
        echo"inserted succesfully";
    }
    else{
        echo"not inserted". mysqli_error($conn);

    }
}
}



?>
<?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>


<!DOCTYPE html>
<html> 

    <head>
        <!-- <link rel="stylesheet" href="welcome.css"> -->
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

 <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    
     </head>
     <style>
            table,th,td{
                border: 1px solid black;
                padding: auto;
                border-collapse: collapse;
                text-align:center;
                margin-left:auto;
                margin-right:auto;
            }
            th,td{
                padding: 5px;
                text-align: center;
            }
        </style>
    <body>
<!-- edit modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal"
 data-target="#editModal">
  Edit Modal
</button> -->

<!--edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form  style="text-align: center;" action="/CSIR/welcome.php" method="POST" >
         <input type ="hidden" id ="SnoEdit" name ="SnoEdit">
                <p> EMPLOYEE NAME: <br>
                    <input type ="text" size="65" name="EMPLOYEE_NAME" id="employeenameEdit"/>
                </p>
                <p>
                    EMPLOYEE TYPE:<br>
                    <select type="text" name="EMPLOYEE_TYPE" value="" id ="employeetypeEdit">
                        <option>Regular</option>
                        <option>Contractual</option>
                        
                    </select>
                    
                </p>
                <p>
                     DIVISION:<br>
                    <select type="text" name="DIVISION" value="" id="divisionEdit">
                        <option>ESD</option>
                        <option>HRDG</option>
                        <option>IT</option>
                        <option>EMR</option>
                        
                    </select>
                    
                </p>
                <p> ROOM NO.: <br>
                    <input type ="text" size="65" name="ROOM_NO" id="roomnoEdit"/>
                </p>
                <p>
                     TYPE:<br>
                    <select type="text" name="TYPE" value="" id="typeEdit">
                        <option>COMPUTER</option>
                        <option>PRINTER</option>
                        <option>SWITCHES</option>
                        <option>SCANNER</option>
                        <option>LAPTOP</option>
                        <option>PHOTOCOPY MACHINE</option>
                        
                    </select>
                    
                </p>
                
                
                <p>
                    MAKE-BRAND NAME:<br>
                    <input type="type" size="65" name="MAKE-BRAND_NAME" id="makebrandEdit"/>
                </p>
                
                <p>
                    MODEL NO.:<br>
                    <input type="type" size="65" name="MODEL_NO" id="modelnoEdit"/>
                </p>
                
                <p>
                    SERIAL NO.:<br>
                    <input type="type" size="65" name="SERIAL_NO" id="serialnoEdit"/>
                </p>
                <p>
                    STATUS:<br>
                    <select type="text" name="STATUS" value="" id="statusEdit">
                        <option>WORKING</option>
                        <option>NOT WORKING</option>
                        <option>NOT IN USE</option>

                    </select>
                    <p>
                        PROCESSOR:<br>
                        <input type="type" size="65" name="PROCESSOR" id="processorEdit"/>
                    </p>
                    <p>
                        RAM:<br>
                        <input type="type" size="65" name="RAM" id="ramEdit"/>
                    </p>
                    <p>
                        HDD:<br>
                        <input type="type" size="65" name="HDD" id="hddEdit"/>
                    </p>
                    <p>
                        PURCHASE DATE:<br>
                        <input type="text" size="65" name="PURCHASEDATE" id="purchasedateEdit"/>
                    </p>
                    <p>
                        WARRANTY:<br>
                        <select type="text" name="WARRANTY" value="" id="warrantyEdit">
                            <option>YES</option>
                            <option>NO</option>
                        </select>
                  </p>
                  <p>
                    AMC:<br>
                    <select type="text" name="AMC" value="" id="amcEdit">
                        <option>YES</option>
                        <option>NO</option>
                    </select>
                </p>            
                <p>
            <input type="submit" value="Send" name="submit"><br>
            
        </p>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" >Save changes</button>
      </div>
    </div>
  </div>
</div>       <!-- <div class="container my-4"> -->

            
            <h1 style="text-align:center;">WELCOME TO INVENTORY</h1>
            <form  style="text-align: center;" action="/CSIR/welcome.php?" method="POST" >
                <p> EMPLOYEE NAME: <br>
                    <input type ="text" size="65" name="EMPLOYEE_NAME"/>
                </p>
                <p>
                    EMPLOYEE TYPE:<br>
                    <select type="text" name="EMPLOYEE_TYPE" value="">
                        <option>Regular</option>
                        <option>Contractual</option>
                        
                    </select>
                    
                </p>
                <p>
                     DIVISION:<br>
                    <select type="text" name="DIVISION" value="">
                        <option>ESD</option>
                        <option>HRDG</option>
                        <option>IT</option>
                        <option>EMR</option>
                        
                    </select>
                    
                </p>
                <p> ROOM NO.: <br>
                    <input type ="text" size="65" name="ROOM_NO"/>
                </p>
                <p>
                     TYPE:<br>
                    <select type="text" name="TYPE" value="">
                        <option>COMPUTER</option>
                        <option>PRINTER</option>
                        <option>SWITCHES</option>
                        <option>SCANNER</option>
                        <option>LAPTOP</option>
                        <option>PHOTOCOPY MACHINE</option>
                        
                    </select>
                    
                </p>
                
                
                <p>
                    MAKE-BRAND NAME:<br>
                    <input type="type" size="65" name="MAKE-BRAND_NAME"/>
                </p>
                
                <p>
                    MODEL NO.:<br>
                    <input type="type" size="65" name="MODEL_NO"/>
                </p>
                
                <p>
                    SERIAL NO.:<br>
                    <input type="type" size="65" name="SERIAL_NO"/>
                </p>
                <p>
                    STATUS:<br>
                    <select type="text" name="STATUS" value="">
                        <option>WORKING</option>
                        <option>NOT WORKING</option>
                        <option>NOT IN USE</option>

                    </select>
                    <p>
                        PROCESSOR:<br>
                        <input type="type" size="65" name="PROCESSOR"/>
                    </p>
                    <p>
                        RAM:<br>
                        <input type="type" size="65" name="RAM"/>
                    </p>
                    <p>
                        HDD:<br>
                        <input type="type" size="65" name="HDD"/>
                    </p>
                    <p>
                        PURCHASE DATE:<br>
                        <input type="text" size="65" name="PURCHASEDATE"/>
                    </p>
                    <p>
                        WARRANTY:<br>
                        <select type="text" name="WARRANTY" value="">
                            <option>YES</option>
                            <option>NO</option>
                        </select>
                  </p>
                  <p>
                    AMC:<br>
                    <select type="text" name="AMC" value="">
                        <option>YES</option>
                        <option>NO</option>
                    </select>
                </p>            
                <p>
            <input type="submit" value="Send" name="submit"><br>
            
        </p>
        </form>

        <table class ="table" id="myTable">
            <thead>
            <!-- <caption><h3> welcome to gbu engineering college</h3></caption> -->
            <tr>
                <th>S.no</th>
                <th>Employee Name</th>
                <th>Employee Type</th>
                <th>Division</th>
                <th>Room No</th>
                <th>Type</th>
                <th>Make Brand</th>
                <th>Model No</th>
                <th>Serial No</th>
                <th>Status</th>
                <th>Processor</th>
                <th>Ram</th>
                <th>HDD</th>
                <th>Purchase Date</th>
                <th>Warranty</th>
                <th>Amc</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
     <?php 
        
        $sql = "SELECT * FROM `inventory`";
        $result = mysqli_query($conn,$sql);
        $Sno = 0;
         while($row = mysqli_fetch_assoc($result)){
             $Sno = $Sno + 1;
            echo "<tr>
            <td>" .$Sno."</td>
            <td>" .$row['Employee Name']."</td>
            <td>" .$row['Employee Type']."</td>
            <td>" .$row['Division']."</td>
            <td>" .$row['Room no']."</td>
            <td>" .$row['Type']."</td>
            <td>" .$row['Make-Brand']."</td>
            <td>" .$row['Model No']."</td>
            <td>" .$row['Serial No']."</td>
            <td>" .$row['Status']."</td>
            <td>" .$row['Processor']."</td>
            <td>" .$row['Ram']."</td>
            <td>" .$row['Hdd']."</td>
            <td>" .$row['Purchase Date']."</td>
            <td>" .$row['Warranty']."</td>
            <td>" .$row['AMC']."</td>
            <td><button class='edit btn btn-sm btn-primary' id=".$row['Sno'].">Edit</button> <a href='/del'>Delete</a></td>
             </tr>";
         }
        //  <a id=".$row['Sno.']." class='edit btn btn-sm btn-primary'>Edit</a>
            

        
        
        ?>

        </tbody> 
        </table>           
      </div>
      <hr>          
                

        <!-- </form> -->
       
 
        
        
        

        <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  
  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script> -->
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[1].innerText;
        a = tr.getElementsByTagName("td")[2].innerText;
        b= tr.getElementsByTagName("td")[3].innerText;
        c = tr.getElementsByTagName("td")[4].innerText;
        d= tr.getElementsByTagName("td")[5].innerText;
        ef = tr.getElementsByTagName("td")[6].innerText;
        f = tr.getElementsByTagName("td")[7].innerText;
         g= tr.getElementsByTagName("td")[8].innerText;
         h= tr.getElementsByTagName("td")[9].innerText;
         i= tr.getElementsByTagName("td")[10].innerText;
         j= tr.getElementsByTagName("td")[11].innerText;
         k= tr.getElementsByTagName("td")[12].innerText;
         l= tr.getElementsByTagName("td")[13].innerText;
        m = tr.getElementsByTagName("td")[14].innerText;
        n = tr.getElementsByTagName("td")[15].innerText;
        console.log(title,a,b,c,d,ef,f,h,i,j,k,l,m,n);
        employeenameEdit.value = title;
        employeetypeEdit.value = a;
        divisionEdit.value = b;
   
        roomnoEdit.value = c;
         typeEdit.value =  d;
        makebrandEdit.value = ef;
        modelnoEdit.value =  f;
        serialnoEdit.value = g;
        statusEdit.value = h;
        processorEdit.value = i;
        ramEdit.value = j;
        hddEdit.value = k;
        purchasedateEdit.value = l;
        warrantyEdit.value =     m;
        amcEdit.value =    n;
        SnoEdit.value = e.target.id;
        console.log(e.target.id);
        $('#editModal').modal('toggle');
      })
    })
     </script>
    </body>
   </html>


   
                      