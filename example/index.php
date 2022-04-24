<!DOCTYPE html>
<html lang="en">
<head>
    <title>bKash Direct Charge | Signature & API Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//unpkg.com/json-format-highlight@1.0.1/dist/json-format-highlight.js" type="text/javascript" charset="utf-8"></script>
</head>
<body style="background: #d62267;background-image: url(https://cdn.readme.io/img/bgs/triangles.png);">
  
<div class="container">
    <br>
    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="card-body">
            <!-- <h4 align="center">bKash</h4> -->
            <img src="Bkash-logo.png" height="70" width="110" align="center" class="rounded mx-auto d-block" alt="bKash">
            <h6 align="center">Direct Charge Signature Generation & API Sample</h6><br><br>

            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-2">
                        <label for="body" class="mb-2"><b>Method</b></label>
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
                        <hr>
                        <div class="d-grid gap-2">
                            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#quickDemo">Quick Demo</button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="quickDemo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Demo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="embed-responsive embed-responsive-21by9">
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="body" class="mb-2"><b>Request Body</b></label>
                        <textarea class="form-control" rows="22" id="reqbody" name="text" autocomplete="off" placeholder="Input request body..." style="font-size: 13px;"></textarea>
                        <input type="hidden" name="signature_key" id="signature_key">
                        <br>
                        <button type="button" id="generate" class="btn btn-success btn-sm">Get Signature</button>
                        <button type="button" id="api_request" class="btn btn-primary btn-sm float-end">Proceed</button>
                    </div>

                    <div class="col-md-5">
                        <label for="Signature" class="mb-2"><b>Signature</b></label>
                        <div class="card">
                            <div class="card-body">
                                <pre><code id="sign" style="">Signature will display here..
                                </code></pre>
                                <button type="button" class="btn btn-light btn-sm float-end" onclick="copySign()">Copy</button>
                            </div>
                        </div>

                        <label for="response" class="mb-2"><b>API Response</b></label>
                        <div class="card">
                            <input type="hidden" name="api_responses" id="api_responses">
                            <div class="card-body text-wrap">
                                <pre><code id="apiresp" style="">
                                
                                </code></pre>
                                <button type="button" class="btn btn-light btn-sm float-end" onclick="copyResp()">Copy</button>
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
        $("#api_request").hide();
        $('#generate').on('click', function() {
            document.getElementById('sign').innerHTML = "";
            document.getElementById('signature_key').value = "";

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
                data : {mtd: mode, rbod : reqbody, type: 'sign'},
                async : true, 
                dataType : 'json',
                beforeSend: function () {
                    waitingDialog.show('Generating Signature...', {
                        dialogSize: 'md', 
                        progressType: 'success'
                    });
                },
                success: function (response) {
                    document.getElementById('sign').innerHTML = "<pre>"+jsonFormatHighlight(JSON.stringify(response.sign_key, undefined, 4))+"</pre>";
                    document.getElementById('signature_key').value = response.sign_key.signature;
                    if(response.sign_key.signature != "") {
                        $("#api_request").show();
                    }
                },
                complete: function() {
                    waitingDialog.hide();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    document.getElementById('sign').innerHTML = "<b>Request Body & Method not Matching !</b>";
                    document.getElementById('apiresp').innerHTML = "<b>Something Wrong!</b>";
                }
            });

        });

         $('#api_request').on('click', function() {
            // document.getElementById('sign').innerHTML = "";
            document.getElementById('apiresp').innerHTML = ""
            var ele = document.getElementsByName('optradio');
              
            for(i = 0; i < ele.length; i++) {
                if(ele[i].checked){
                    var mode = ele[i].value;
                }
            }

            var reqbody = document.getElementById('reqbody').value;
            var oldsignature = document.getElementById('signature_key').value;

            if(oldsignature != ""){
                var sigs = oldsignature;
            } else {
                var sigs = null;
            }

            $.ajax({
                type: "POST",
                url: 'process_request.php',
                data : {mtd: mode, rbod : reqbody, sig: sigs, type: 'api'},
                async : true, 
                dataType : 'json',
                beforeSend: function () {
                    waitingDialog.show('Executing Request...', {
                        dialogSize: 'md', 
                        progressType: 'success'
                    });
                },
                success: function (response) {
                    document.getElementById('sign').innerHTML =  "<pre>"+jsonFormatHighlight(JSON.stringify(response.sign_key, undefined, 4))+"</pre>";
                    document.getElementById('signature_key').value = response.sign_key.signature;
                    document.getElementById('apiresp').innerHTML = "<pre>"+jsonFormatHighlight(JSON.stringify(response.api_response, undefined, 4))+"</pre>";
                    document.getElementById('api_responses').value = JSON.stringify(response.api_response, undefined, 4);
                    console.log(response);
                },
                complete: function() {
                    waitingDialog.hide();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    document.getElementById('sign').innerHTML = "<b>Request Body & Method not Matching!</b>";
                    document.getElementById('apiresp').innerHTML = "<b>Request Body & Method not Matching!</b>";
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

    function copyResp() {
      /* Get the text field */
        var copyText = document.getElementById("api_responses");

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