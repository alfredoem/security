<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
        table{
            font-size: x-small;
            font-family: Verdana;
        }
        .clearfix{
            content: "";
            padding:5px;
            display: table;
            clear: both;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: small;
        }
    </style>
</head>
<body>
    <div id="details">
        <p align="center">{!! \igmultron\GeneralUtil\Utils::getShopInfo()['NombreComercial']  !!}</p>
        <p align="center">{{trans('labels.pdfDailyInformationbyMachine')}}</p>
        <p align="center">{{trans('labels.pdfDailyTitleCurrency')}}</p>
        <p align="center">{!! date("D jS F, Y", strtotime($txtOperativeDay)) !!}</p>
    </div>
        <table width="100%">
            <thead style="background-color: #007fff">
                <tr>
                    <th align="center">Items</th>
                    <th align="center">{{trans('labels.colComputerId')}}</th>
                    <th align="center">{{trans('labels.colGameDescription')}}</th>
                    <th align="center">{{trans('labels.colBrandDescripcion')}}</th>
                    <th align="center">{{trans('labels.colModelDescripcion')}}</th>
                    <th align="center">{{trans('labels.colZoneDescription')}}</th>
                    <th align="center">{{trans('labels.colCoinInUSD')}}</th>
                    <th align="center">{{trans('labels.colNetWinsUSD')}}</th>
                    <th align="center">{{trans('labels.colPayoutPercentage')}}</th>
                    <th align="center">{{trans('labels.colTeoricPercentage')}}</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $item = 0;
            $sumCoinUsd = 0;
            $sumNetWinsUsd = 0;
            $sumPago = 0;
            $sumGameRTP = 0 ;
            ?>
                @foreach($dailyInformationList as $row)
                    <?php
                        $item += 1;
                        $sumCoinUsd += $row->CoinUsd;
                        $sumNetWinsUsd += $row->NetWinsUsd;
                        $sumPago += $row->Pago;
                        $sumGameRTP += $row->GameRTP ;
                    ?>
                    <tr>
                        <td align="center">{{$item}}</td>
                        <td align="center" >{{$row->ComputerId}}</td>
                        <td align="left" >{{$row->Game}}</td>
                        <td align="left" >{{$row->Brand}}</td>
                        <td align="left" >{{$row->Model}}</td>
                        <td align="left" >{{$row->Zone}}</td>
                        <td align="right">{{$row->CoinUsd}}</td>
                        <td align="right" style="color: {{$row->NetWinsUsd < 0 ? 'red' : ''}};">{{$row->NetWinsUsd}}</td>
                        <td align="right">{{$row->Pago}}</td>
                        <td align="right">{{$row->GameRTP}}</td>
                    </tr>
                @endforeach
                <tr class="clearfix"></tr>
            </tbody>
            <tfoot style="background-color: #007fff" >
                <tr>
                    <td align="center" colspan="6">{{trans('labels.lblTotalShops')}}</td>
                    <td align="right">{{$sumCoinUsd}}</td>
                    <td align="right">{{$sumNetWinsUsd}}</td>
                    <td align="right">{{$sumPago}}</td>
                    <td align="right"></td>
                </tr>
                <tr>
                    <td align="center" colspan="3"> {{ trans('labels.lblOperativeMachines') . ' '. $item}}</td>
                    <td align="center" colspan="3">{{trans('labels.lblDailyAverageMachine')}}</td>
                    <td align="right">{{round($sumCoinUsd/$item,2)}}</td>
                    <td align="right">{{round($sumNetWinsUsd/$item,2)}}</td>
                    <td align="right">{{round($sumPago/$item,2)}}</td>
                    <td align="right">{{round($sumGameRTP/$item,2)}}</td>
                </tr>
            </tfoot>
        </table>
</body>
</html>