<div class="sign-up">
  <?php
  session_start();
  require "../config/connect.php";
   $select_bill = mysqli_query($con,"SELECT * FROM `bills`,`house` WHERE `bills`.`house`=`house`.`name`");
   $bill = mysqli_fetch_array($select_bill);
   $bill_name = $bill['bill_name'];
   $bill_id = $bill['bill_id'];
   $bill_comment = $bill['comment'];
   $bill_due = $bill['date_due'];
    $bill_amount = $bill['amount'];
   ?>
<h5>Pay Rent by date <?=$bill_due?> of this Month Amount Ksh (<?=$bill_amount?> /=)</h5>

<div id="status"></div>
<form id="payment_frm" action="config/pay.php">
          <div class="sign-u">
							<div class="sign-up1">
								<h4>Mpesa Pay Code* :</h4>
							</div>
							<div class="sign-up2">

									<input type="text"  id="m_code" placeholder=" " required=" ">

							</div>
							<div class="clearfix"> </div>
						</div>
            <div class="sign-u">
  							<div class="sign-up1">
  								<h4>Amount Paid* :</h4>
  							</div>
  							<div class="sign-up2">

  									<input type="text" id="amount" placeholder=" " required=" ">
                    <input id="payment_btn" type="submit" value="Submit">

  							</div>
  							<div class="clearfix"> </div>
  						</div>


</form>

<script>

$("#payment_btn").click(function(evt){
  evt.preventDefault();
  var url = "config/pay.php";
  var code = $("#m_code").val();
  var amount = $("#amount").val();
  var bill = "<?=$bill_id?>";

if (code==''||amount=='') {
       $("#status").html('<div class="alert alert-danger" role="alert">Fill in all the fileds before you submit</div>');
}else {

  $.post(url, {m_code:code, amt:amount, bill_id:bill}, function(res){
     if (res=='paid') {
       $("#payment_frm")[0].reset();
       $("#status").html('<div class="alert alert-success" role="alert">You have submitted your payment successfully.</div>');
     }else {
       $("#status").html(res);
      }
  })
}

})

</script>
