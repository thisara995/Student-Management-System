<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        hr {
            border: 1px solid #ddd;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .footer {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Payment Receipt</h2>
    <hr>
    <p><strong>Receipt No:</strong> {{ $payment->id }}</p>
    <p><strong>Date:</strong> {{ $payment->paid_date }}</p>
    <p><strong>Enrollment No:</strong> {{ $payment->enrollment->enroll_no }}</p>
    <p><strong>Student Name:</strong> {{ $payment->enrollment->student->name }}</p>

    <hr>
    <table>
        <tr>
            <th>Description</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>{{ $payment->enrollment->batch->name }}</td>
            <td>{{ $payment->amount }}</td>
        </tr>
    </table>

    <hr>
    <div class="footer">
        <p><strong>Printed By:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Printed Date:</strong> {{ now()->format('Y-m-d') }}</p>
    </div>
</body>
</html>
