<?php
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
if(isset($_REQUEST['submitrequest'])){
 // Checking for Empty Fields
 if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requestdate'] == "")){
  // msg displayed if required field missing
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
   // Assigning User Values to Variable
   $rinfo = $_REQUEST['requestinfo'];
   $rdesc = $_REQUEST['requestdesc'];
   $rname = $_REQUEST['requestername'];
   $radd1 = $_REQUEST['requesteradd1'];
   $radd2 = $_REQUEST['requesteradd2'];
   $rcity = $_REQUEST['requestercity'];
   $rstate = $_REQUEST['requesterstate'];
   $rzip = $_REQUEST['requesterzip'];
   $remail = $_REQUEST['requesteremail'];
   $rmobile = $_REQUEST['requestermobile'];
   $rdate = $_REQUEST['requestdate'];
   $sql = "INSERT INTO submitrequest_tb(request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date) VALUES ('$rinfo','$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";
   if($conn->query($sql) == TRUE){
       $genid = mysqli_insert_id($conn);
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Request Submitted Successfully Your' . $genid .' </div>';
    session_start();
    $_SESSION['myid'] = $genid;
    echo "<script> location.href='submitrequestsuccess.php'; </script>";
    // include('submitrequestsuccess.php');
   } else {
    
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit Your Request </div>';
   }
 }
}
?>
<div class="col-sm-9 col-md-10 mt-5">
  <form class="mx-5" action="#" method="POST" name="frm"  onsubmit="return validation()">
    <div class="form-group">
      <label for="inputRequestInfo">Request Info</label>
      <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestinfo"/>
      <span id='riname' name='ri' class="text-danger font-weight-bold "></span>
    </div>
   
    <div class="form-group">
      <label for="inputRequestDescription">Description</label>
      <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestdesc">
      <span id='rd' class="text-danger font-weight-bold "></span>
    </div>
    <div class="form-group">
      <label for="inputName">Name</label>
      <input type="text" class="form-control" id="inputName" placeholder="Name" name="requestername">
      <span id='rn' class="text-danger font-weight-bold "></span>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputAddress">Address Line 1</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Address 1" name="requesteradd1">
        <span id='ra1' class="text-danger font-weight-bold "></span>
      </div>
      <div class="form-group col-md-6">
        <label for="inputAddress2">Address Line 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Address 2" name="requesteradd2">
        <span id='ra2' class="text-danger font-weight-bold "></span>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity" name="requestercity">
        <span id='rc' class="text-danger font-weight-bold "></span>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <input type="text" class="form-control" id="inputState" name="requesterstate">
        <span id='rs' class="text-danger font-weight-bold "></span>
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="number" class="form-control" id="inputZip" name="requesterzip" >
        <span id='rz' class="text-danger  "></span>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="requesteremail">
      </div>
      <div class="form-group col-md-2">
        <label for="inputMobile">Mobile</label>
        <input type="number" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)">
        <span id='rm' class="text-danger font-weight-bold "></span>
      </div>
      <div class="form-group col-md-2">
              <!-- <label for="inputDate">Date</label> -->
        <input type="text" hidden value="<?php echo date("y/m/d");?>" class="form-control" id="inputDate" name="requestdate">
      </div>
    </div>

    <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
  </form>
  <?php if(isset($msg)) {echo $msg; } ?>
</div>
</div>
</div>
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
  function validation(){
    var requestinfo=document.getElementById('inputRequestInfo').value;
    var rid=document.getElementById('riname');
    var correct_way=/^[A-Za-z ]+$/;
    // if(!isNaN(frm.requestinfo.value)){
    //   document.getElementById('riname').innerHTML="enter character only";
    //   return false;
    // }
    ///////////////new///
    if(frm.requestinfo.value.length<3){
      document.getElementById('riname').innerHTML="enter more than three words";
      return false;
    }
    if(frm.requestinfo.value.length>20){
      document.getElementById('riname').innerHTML="enter under twenty words";
      return false;
    }
    if(frm.requestinfo.value.match(correct_way)){
      true;
    }else{
      document.getElementById('riname').innerHTML="alphabets only";
      return false;
    }
   
    // if(!isNaN(frm.requestdesc.value)){
    //   document.getElementById('rd').innerHTML="enter character only";
    //   return false;
    // }
/////////////////new
if(frm.requestdesc.value.length<10){
      document.getElementById('rd').innerHTML="write deccription in more than ten words";
      return false;
    }
    if(frm.requestdesc.value.length>50){
      document.getElementById('rd').innerHTML="write description under fifty words";
      return false;
    }
    if(frm.requestdesc.value.match(correct_way)){
      true;
    }else{
      document.getElementById('rd').innerHTML="alphabets only";
      return false;
    }
    
   /////new
   
    // if(!isNaN(frm.requestername.value)){
    //   document.getElementById('rn').innerHTML="enter character only";
    //   return false;
    // }
    if(frm.requestername.value.length<3){
      document.getElementById('rn').innerHTML="enter more than two character";
      return false;
    }
    if(frm.requestername.value.length>20){
      document.getElementById('rn').innerHTML="enter more less than twenty character";
      return false;
    }
    if(frm.requestername.value.match(correct_way)){
      true;
    }else{
      document.getElementById('rn').innerHTML="alphabets only";
      return false;
    }
    ////////////////new 

    // if(!isNaN(frm.inputCity.value)){
    //   document.getElementById('rc').innerHTML="enter character only";
    //   return false;
    // }
    if(frm.inputCity.value.length<3){
      document.getElementById('rc').innerHTML="enter more than two character";
      return false;
    }
    if(frm.inputCity.value.length>20){
      document.getElementById('rc').innerHTML="enter more less than twenty character";
      return false;
    }
    if(frm.inputCity.value.match(correct_way)){
      true;
    }else{
      document.getElementById('rc').innerHTML="alphabets only";
      return false;
    }
/////////////////new
//  if(!isNaN(frm.inputState.value)){
//       document.getElementById('rs').innerHTML="enter character only";
//       return false;
//     }
   
if(frm.inputState.value.length<3){
      document.getElementById('rs').innerHTML="enter more than two character";
      return false;
    }
    if(frm.inputState.value.length>20){
      document.getElementById('rs').innerHTML="enter more less than twenty character";
      return false;
    }
    if(frm.inputState.value.match(correct_way)){
      true;
    }else{
      document.getElementById('rs').innerHTML="alphabets only";
      return false;
    }
   
   
    if(frm.requesterzip.value.length > 6){
      document.getElementById('rz').innerHTML="please enter less than six digit";
      return false;
    }
    if((frm.requestermobile.value.length > 10) || (frm.requestermobile.value.length < 10)){
      document.getElementById('rm').innerHTML="please enter only ten digit";
      return false;
    }  
              
  }
</script>
<?php
include('includes/footer.php'); 
$conn->close();
?>