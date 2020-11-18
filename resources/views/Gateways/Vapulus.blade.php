<html>

<head>
    <title>Test Hosted Session</title>
    <link rel="icon" href="https://www.vapulus.com/favicon.ico" type="image/x-icon"/>

    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- INCLUDE SESSION.JS JAVASCRIPT LIBRARY -->
    <script src="https://api.vapulus.com:1338/app/session/script?appId=300151571900003"></script>
    <!-- APPLY CLICK-JACKING STYLING AND HIDE CONTENTS OF THE PAGE -->
    <style id="antiClickjack">
        body {
            display: none !important;
        }
    </style>
</head>

<body>
    <section class="text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Hosted Session</h1>
            <p class="lead text-muted">Vapulus Hosted Session Integration Sample.</p>
        </div>
    </section>
    <!-- CREATE THE HTML FOR THE PAYMENT PAGE -->
    <div class="container">
        <div class="row">
            <div class="contents col-12">
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-8 control-label" for="cardNumber">Card number:</label>
                        <div class="col-md-8">
                            <input type="text" id="cardNumber" class="form-control input-md" value="" readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 control-label" for="cardMonth">Expiry month:</label>
                        <div class="col-md-8">
                            <input type="text" id="cardMonth" class="form-control input-md" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 control-label" for="cardYear">Expiry year:</label>
                        <div class="col-md-8">
                            <input type="text" id="cardYear" class="form-control input-md" value="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-8 control-label" for="cardCVC">Security code:</label>
                        <div class="col-md-8">
                            <input type="text" id="cardCVC" class="form-control input-md" value="" readonly />
                        </div>
                    </div>
                </fieldset>
                <button class="btn btn-primary pull-right" id="payButton" onclick="pay();">Pay</button>
            </div>
        </div>


        <!-- JAVASCRIPT FRAME-BREAKER CODE TO PROVIDE PROTECTION AGAINST IFRAME CLICK-JACKING -->
        <script type="text/javascript">
            if(window.PaymentSession){
                PaymentSession.configure({
                    fields: {
                        // ATTACH HOSTED FIELDS IDS TO YOUR PAYMENT PAGE FOR A CREDIT CARD
                        card: {
                            cardNumber: "cardNumber",
                            securityCode: "cardCVC",
                            expiryMonth: "cardMonth",
                            expiryYear: "cardYear"
                        }
                    },
                    callbacks: {
                        initialized: function (err, response) {
                            console.log("init....");
                            console.log(err, response);
                            console.log("/init.....");
                            // HANDLE INITIALIZATION RESPONSE
                        },
                        formSessionUpdate: function (err,response) {
                            console.log("update callback.....");
                            console.log(err,response);
                            console.log("/update callback....");

                            // HANDLE RESPONSE FOR UPDATE SESSION
                            if (response.statusCode) {
                                if (200 == response.statusCode) {
                                    console.log("Session updated with data: " + response.data.sessionId);
                                } else if (201 == response.statusCode) {
                                    console.log("Session update failed with field errors.");

                                    if (response.message) {
                                        var field = response.message.indexOf('valid')
                                        field = response.message.slice(field + 5, response.message.length);
                                        console.log(field + " is invalid or missing.");
                                    }
                                } else {
                                    console.log("Session update failed: " + response);
                                }
                            }
                        }
                    }
                });
            }else{
                alert('Fail to get app/session/script !\n\nPlease check if your appId added in session script tag in head section?')
            }

            function pay() {
                // UPDATE THE SESSION WITH THE INPUT FROM HOSTED FIELDS
                PaymentSession.updateSessionFromForm();
            }
        </script>

</body>

</html>