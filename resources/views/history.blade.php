@extends('layout')
@section('content')

    <div id="container" style="height: 400px; min-width: 310px"></div>

    <br><h2>Company history</h2><br>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Open</th>
            <th scope="col">High</th>
            <th scope="col">Low</th>
            <th scope="col">Close</th>
            <th scope="col">Volume</th>
        </tr>
        </thead>
        <tbody>
        @foreach($history as $value)
            <tr>
                <td>{{ date('Y-m-d', $value['date']) }}</td>
                <td>{{ $value['open'] }}</td>
                <td>{{ $value['high'] }}</td>
                <td>{{ $value['low'] }}</td>
                <td>{{ $value['close'] }}</td>
                <td>{{ $value['volume'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/" class="btn btn-primary">Back</a>

    <script>
        var chartData = [
            @foreach($history as $value)
                [{{ $value['date'] }}000, {{ $value['open'] }}, {{ $value['high'] }}, {{ $value['low'] }}, {{ $value['close'] }} ],
            @endforeach
        ];
        Highcharts.stockChart('container', {
            rangeSelector: {
                selected: 1
            },

            title: {
                text: 'AAPL Stock Price'
            },

            series: [{
                type: 'candlestick',
                name: 'AAPL Stock Price',
                data: chartData,
                dataGrouping: {
                    units: [
                        [
                            'week', // unit name
                            [1] // allowed multiples
                        ], [
                            'month',
                            [1, 2, 3, 4, 6]
                        ]
                    ]
                }
            }]
        });
    </script>
@endsection
