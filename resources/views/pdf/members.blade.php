<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <center>
        <p>Southville 7 Credit Cooperative</p>
        <p>Lot 15, Block 5, Site 2, Southville 7, Brgy. Dayap, Calauan, Laguna</p>
    </center>

    <br><br>
    <center>
        <p>Members with active loans</p>
        <p>Date: {{ now()->isoformat('MMMM D, YYYY') }}</p>
    </center>

    <br><br>

    <table border="1" cellpadding="7" cellspacing="0" style="width:100%">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Loan</th>
                <th scope="col">Balance</th>
                <th scope="col">Overdue payments</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
            <tr>
                <td>{{ $member->name }}</td>
                <td>
                    {{ $member->loan->loan_name }}
                </td>
                <td>
                    {{ $member->loan->balance }}
                </td>
                <td>
                    {{ $member->loan->has_late_payment }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>