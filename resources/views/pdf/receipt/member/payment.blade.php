<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment - Receipt</title>

    <style>
        .header {
            position: relative;
            padding-top: 2rem;
        }

        .header-content {
            position: absolute;
            transform: translateY(-50%);
        }

        .header-text {
            left: 5rem;
        }

        body {
            font-family: DejaVu Sans
        }
    </style>
</head>

<body>
    <div class="header">
        <img class="header-content" src="https://southville7cc.online/images/logo.png" alt="">
        <div class="header-content header-text">
            <h2><strong>Southville 7 Credit Cooperative</strong></h2>
            <p>Lot 15, Block 5, Site 2, Southville 7, Brgy. Dayap, Calauan, Laguna</p>
        </div>
    </div>
    <hr style="margin-top: 4rem">

    <br>
    <center>
        <strong>PAYMENT RECEIPT</strong>
    </center>
    {{-- <p>Reference #: {{ $payment->ref }}</p> --}}
    <p>Date: {{ $payment->date_paid->isoformat('MMMM D, YYYY') }}</p>
    <p>Time: {{ $payment->date_paid->isoformat('hh:mm A') }}</p>

    <br>
    <center>
        <strong>Payment Information</strong>
    </center>
    <p style="text-indent: 4rem; text-align: justify">
        The undersigned acknowledges that a total amount of <strong>{{
            $numberToWords->format($payment->payment) }} pesos</strong> ({{
        $numberToCurrency->formatCurrency($payment->payment, 'PHP')}}) was paid by
        <strong>{{ $payment->loan->member->name }}</strong> to {{ $payment->payment >= $payment->loan->receivable ?
        'fully' : 'partially' }} pay his/her loan of {{ $payment->loan->loan_name }} ({{
        $numberToCurrency->formatCurrency($payment->loan->receivable, 'PHP').'
        including the '.$payment->loan->rate.'% interest' }}).
    </p>
    <p>Remaining balance: {{ $numberToCurrency->formatCurrency($payment->balance, 'PHP') }}</p>
    <br>
    <p>Received by: {{ $treasurer->member->name }}</p>
    <p>Signature: ___________________</p>
</body>

</html>