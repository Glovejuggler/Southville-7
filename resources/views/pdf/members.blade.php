<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members</title>

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
    <p style="float: right">Date: {{ now()->isoformat('MMMM D, YYYY') }}</p>
    <br><br>
    @if ($status === 'active')
    <p>Members with active loans</p>
    @elseif ($status === 'inactive')
    <p>Members with inactive loans</p>
    @elseif ($status === 'overdue')
    <p>Members with overdue payments</p>
    @elseif ($status === 'dueToday')
    <p>Members with payments due today</p>
    @else
    <p>Members list</p>
    @endif

    @if ($status === 'active' || $status === 'overdue' || $status === 'dueToday')
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
    <div>
        <p>Total collectibles: <strong>{{ number_format($members->sum('balance')) }}</strong></p>
    </div>
    @else
    <table border="1" cellpadding="7" cellspacing="0" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Share capital</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    {{ $member->name }}
                </td>
                <td>
                    {{ number_format($member->share_capital) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</body>

</html>