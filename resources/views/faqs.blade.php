<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FinTrack | FAQs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: rgb(248, 248, 248);
            font-family: 'Poppins', sans-serif;
        }
        
        .accordion .card-header:after {
            font-family: 'FontAwesome';
            content: "\f068";
            float: right;
        }
        
        .accordion .card-header.collapsed:after {
            /* symbol for "collapsed" panels */
            content: "\f067";
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-md-4 offset-md-4 text-center">
            <a href="{{ url('/') }}" style="color: #5829B8; font-weight: 800; font-size: 250%;" class="d-block nl-4"><img src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1569248451/finance-tracker/Finance_money_Dollar_management_cash_savings_salary-512_sgdosn.png" alt="Logo" style="width:40px;" class="mx-auto img-fluid"><span class="mt-2">fintrack</span></a>
        </div>

        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav">


            </ul>
        </div>
    </nav>

    <div class="container-fluid mt-5">
        <h1 class="mb-5" style="text-align: center; font-weight: 300;">Frequently Asked Questions</h1>
        <div class="col-md-10 offset-md-1 mt-2">

            <div id="accordion" class="accordion">
                <div class="card mb-0">
                    <div class="card-header collapsed pb-3" data-toggle="collapse" href="#collapseOne">
                        <a class="card-title">
                            What is FinTrack?
                        </a>
                    </div>
                    <div id="collapseOne" class="card-body collapse" data-parent="#accordion">
                        <p>Fintrack is an expense tracking web app tailored to suit your everyday spending habits. It takes into account your spending on a daily basis as you record them and then organizes your expense records on a weekly, monthly and yearly
                            basis. It was created to help you understand where your money goes and track of the details as you spend money: when, what, why, & how much.
                        </p>
                    </div>
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <a class="card-title">
                            Is FinTrack private?
                        </a>
                    </div>
                    <div id="collapseTwo" class="card-body collapse" data-parent="#accordion">
                        <p>Absolutely. We have the utmost respect for your privacy. You create a personal account before starting on your tracking journey and your information is safe and secure with FinTrack.
                        </p>
                    </div>
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <a class="card-title">
                            What currencies are available?
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <p>At the moment, the only currency available is the Nigerian Naira &#8358;</p>
                        </div>
                    </div>
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        <a class="card-title">
                            How much does it cost?
                        </a>
                    </div>
                    <div id="collapseFour" class="card-body collapse" data-parent="#accordion">
                        <p>FinTrack is 100% free.
                        </p>
                    </div>
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                        <a class="card-title">
                            Are you available on Mobile?
                        </a>
                    </div>
                    <div id="collapseFive" class="card-body collapse" data-parent="#accordion">
                        <p>At the moment, we are not yet on mobile but we are actively working on it and we should be on your mobile platforms soon.
                        </p>
                    </div>
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                        <a class="card-title">
                            Why doesn’t FinTrack have budgets?
                        </a>
                    </div>
                    <div id="collapseSix" class="card-body collapse" data-parent="#accordion">
                        <p>We are trying to simplify spending tracking for the average person. We believe you don’t need a defined budget to track your spending. We treat your spending as rolling and average amounts that give you the freedom to decide wether
                            you're above or below your goal.
                        </p>
                    </div>
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                        <a class="card-title">
                            Why doesn’t FinTrack have categories?
                        </a>
                    </div>
                    <div id="collapseSeven" class="card-body collapse" data-parent="#accordion">
                        <p>Categories add a lot of complication to budgeting apps, and we want to approach them in the right way in a future release. Often times categories are incorrectly tagged, or not how people think of their spending. Especially when
                            loading your history, it can be a pretty daunting task to go back and re-organize the last few months of spending. For now we focus on simple values, especially short term, and rely on transaction names to help you orient where
                            your money went.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
