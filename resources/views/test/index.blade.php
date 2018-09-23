@extends('mylayout')

@section('content')
    <h3>This is content - My age : {{ $age }}</h3>
    <br><br>
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <caption>Thong tin SV</caption>
        <thead>
            <tr>
                <th>MSV</th>
                <th>HT</th>
                <th>Tuoi</th>
                <th>SDT</th>
                <th>Gioi tinh</th>
                <th>HB</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalMoney = 0;
            @endphp
            @foreach ($info as $key => $item)
                <tr>
                    <td>{{ $item['msv'] }}</td>
                    <td>{{ $item['namesv'] }}</td>
                    <td>{{ $item['agesv'] }}</td>
                    <td>{{ $item['phone'] }}</td>
                    <td>{{ ($item['gender'] == 1) ? 'Nam' : 'Nu' }}</td>
                    <td>{{ number_format($item['money']) }}</td>
                </tr>
                @php
                    $totalMoney += $item['money'];
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">Tong Tien</td>
                <td>{{ number_format($totalMoney) }}</td>
            </tr>
        </tfoot>
    </table>
@endsection
