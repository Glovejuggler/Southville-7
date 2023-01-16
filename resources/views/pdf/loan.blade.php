<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $member->name }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <center>
        <p>Southville 7 Credit Cooperative</p>
        <p>Lot 15, Block 5, Site 2, Southville 7, Brgy. Dayap, Calauan, Laguna</p>
    </center>

    <br><br><br>
    <strong>{{ $member->name }}</strong>
    <div>
        <p>Birthdate: {{ $member->birthdate }}
            <br>
            Birthplace: {{ $member->birthplace }}
            <br>
            Address: {{ $member->address }}
    </div>
    <p>
        Mobile number: {{ $member->contact_number }}
        <br>
        Email: {{ $member->email }}
        <br>
        Facebook: {{ $member->facebook }}
    </p>
    </div>

    <br><br><br>
    <strong>Loan information</strong>
    <br>
    <p>{{ $loan->loan_name }}</p>

    <table border="1" cellpadding="2" style="width: 100%">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Date paid</th>
                <th scope="col">Payment</th>
                <th scope="col">Balance</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loan->payments as $payment)
            <tr>
                <td>{{ $payment->month }}</td>
                <td>{{ $payment->date_paid }}</td>
                <td>{{ $payment->payment }}</td>
                <td>{{ $payment->balance }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>