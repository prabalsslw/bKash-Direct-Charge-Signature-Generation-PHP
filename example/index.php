<!DOCTYPE html>
<html lang="en">
<head>
    <title>bKash Direct Charge | Signature & API Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: #d62267;background-image: url(https://cdn.readme.io/img/bgs/triangles.png);">
  
<div class="container">
    <br>
    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="card-body">
            <h4 align="center">bKash</h4>
            <h6 align="center">Direct Charge Signature Generation & API Sample</h6><br><br>

            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-2">
                        <label for="body" class="mb-2"><b>Request Mode</b></label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="prepare" checked>
                            <label class="form-check-label" for="radio1">Prepare</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="applytoken">
                            <label class="form-check-label" for="radio2">Apply Token/Bind</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio3" name="optradio" value="directpay">
                            <label class="form-check-label" for="radio3">Derict Debit </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio4" name="optradio" value="auth">
                            <label class="form-check-label" for="radio4">Auth Payment</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio5" name="optradio" value="capture">
                            <label class="form-check-label" for="radio5">Capture Payment</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio6" name="optradio" value="void">
                            <label class="form-check-label" for="radio6">Cancel/Void Payment</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio7" name="optradio" value="inquirypayment">
                            <label class="form-check-label" for="radio7">Inquiry Payment</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio8" name="optradio" value="refund">
                            <label class="form-check-label" for="radio8">Refund Payment</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio9" name="optradio" value="inquiryrefund">
                            <label class="form-check-label" for="radio9">Inquiry Payment</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio10" name="optradio" value="canceltoken">
                            <label class="form-check-label" for="radio10">Cancel Token</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio11" name="optradio" value="userinfo">
                            <label class="form-check-label" for="radio11">User Token/Bind Info</label>
                        </div>
                    </div>
                    
                    <div class="col-md-5">
                        <label for="body" class="mb-2"><b>Request Body</b></label>
                        <textarea class="form-control" rows="22" id="reqbody" name="text" autocomplete="off" placeholder="Input request body..." style="font-size: 13px;"></textarea>
                        <input type="hidden" name="signature_key" id="signature_key">
                        <br>
                        <button type="button" id="generate" class="btn btn-success float-end">Submit</button>
                    </div>

                    <div class="col-md-5">
                        <label for="Signature" class="mb-2"><b>Signature</b></label>
                        <div class="card">
                            <div class="card-body">
                                <pre><code id="sign" style="color: blue;">Signature will display here..
                                </code></pre>
                                <button type="button" class="btn btn-light btn-sm float-end" onclick="copySign()">Copy</button>
                            </div>
                        </div>

                        <label for="response" class="mb-2"><b>API Response</b></label>
                        <div class="card">
                            <div class="card-body">
                                <pre><code>
                                
                                </code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
    <p align="center" style="color: white; font-size: 12px;"><?php echo date("Y");?> ©&nbsp;bKash | By <a href="" target="_blank">PM</a></p>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-waitingfor/1.2.9/bootstrap-waitingfor.min.js" integrity="sha512-GdjagDu3z1snbfYjVNIkBEjKAJPQvL1Un1guZys94l+l9vB8RSFJZTkIsThAy/8eFjE1x+1OXdW9SDMh8VV0AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#generate').on('click', function() {
            document.getElementById('sign').innerHTML = "";
            var ele = document.getElementsByName('optradio');
              
            for(i = 0; i < ele.length; i++) {
                if(ele[i].checked){
                    var mode = ele[i].value;
                }
            }

            var reqbody = document.getElementById('reqbody').value;

            $.ajax({
                type: "POST",
                url: 'process_request.php',
                data : {mtd: mode, rbod : reqbody},
                async : true, 
                dataType : 'json',
                beforeSend: function () {
                    waitingDialog.show('Generating Signature...', {
                        dialogSize: 'md', 
                        progressType: 'success'
                    });
                },
                success: function (response) {
                    document.getElementById('sign').innerHTML = "<b>Signature: "+response.signature+"\nVerify: "+response.valid+"</b>";
                    document.getElementById('signature_key').value = response.signature;
                },
                complete: function() {
                    waitingDialog.hide();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    document.getElementById('sign').innerHTML = "<b>Request Body & Method not Matching !</b>";
                }
            });

        });
    }); 

    function copySign() {
      /* Get the text field */
        var copyText = document.getElementById("signature_key");

      /* Select the text field */
        copyText.select();

       /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

      /* Alert the copied text */
        // alert("Copied the text: " + copyText.value);
        waitingDialog.show('Copied to Clipboard');
        setTimeout(function () {
            waitingDialog.hide();
        }, 200);
    }
</script>
</html>