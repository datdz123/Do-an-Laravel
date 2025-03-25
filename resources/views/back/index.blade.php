@extends('back/layouts/masterlayout')
@section('content')
@section('title', 'Trang chủ')


<style type="text/css">
    /* Chart.js */

    @-webkit-keyframes chartjs-render-animation {
        from {
            opacity: 0.99
        }

        to {
            opacity: 1
        }
    }

    @keyframes chartjs-render-animation {
        from {
            opacity: 0.99
        }

        to {
            opacity: 1
        }
    }

    .chartjs-render-monitor {
        -webkit-animation: chartjs-render-animation 0.001s;
        animation: chartjs-render-animation 0.001s;
    }
</style>


<section class="content-header">
    <h1>
        @yield('title')
    </h1>

</section>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $new_order }}</h3>
                    <p>Đơn hàng mới</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url(Config('app')['url'] . '/admin/orders?date%5B%5D=&date%5B%5D=&status=new&price%5B%5D=&price%5B%5D=') }}"
                    class="small-box-footer">Thêm thông tin <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ number_format($revenueYear[0]['totalMoney'], 0, '.', '.') }} Đ</h3>
                    <p>Doanh thu năm {{ $thisYear }}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $users }}</h3>

                    <p>Người dùng đăng ký</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('users') }}" class="small-box-footer">Thêm thông tin <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $order_has_been_cancelled }}</h3>
                    <p>Đơn hàng đã huỷ</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ url(Config('app')['url'] . '/admin/orders?date%5B%5D=&date%5B%5D=&status=order+has+been+cancelled&price%5B%5D=&price%5B%5D=') }}"
                    class="small-box-footer">Thêm thông tin<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- LINE CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Biểu đồ doanh thu tháng {{ $thisMonth }}:
                        {{ number_format($revenueMonth[0]['totalMoney'], 0, '.', '.') }} VND</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <form action="">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="date_from" class="form-control pull-right"
                                            id="date_from_total_money_chart">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="date_to" class="form-control pull-right"
                                            id="date_to_total_money_chart">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <button id="total_money_chart" type="button" class="btn btn-primary"><i
                                            class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="pull-right Monthly_Revenue_Total"></div>
                            </div>
                        </div>
                    </form>
                    <div class="" id="listDay" data-list-day="{{ $listDay }}"
                        data-money="{{ $arrRevenue }}"></div>
                    <canvas class="my-4 chartjs-render-monitor" id="myChart" width="1056" height="300px"
                        style="display: block; height: 222px; width: 528px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Biểu đồ đơn hàng tháng {{ $thisMonth }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="arrTotal_order" data-order="{{ $arrTotal_order }}" class="chart">
                        <canvas id="areaChart" style="height:250px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"> Top sản phẩm bán chạy </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="selling_products" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ảnh</th>
                                <th>Thông tin sản phẩm</th>
                                <th>Đã bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($selling_products as $i => $item)
                                @php
                                    $image = explode(',', $item->images);
                                @endphp
                                <tr>
                                    <td>{{ ++$i }} </td>
                                    <td><a href="{{ route('product/update', $item->id) }}">
                                            <img style="width: 50px;" src="{{ $image[0] }}">
                                        </a>
                                    </td>
                                    <td>
                                        <div class="col-12">
                                            - {{ $item->name }}
                                        </div>
                                        <div class="col-12">
                                            - {{ number_format($item->price, 0, '.', '.') }} VND
                                        </div>
                                    </td>
                                    <td>
                                        {{ $item->sum }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"> Top khách đặt hàng </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="customers_buy_the_most" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>ĐH</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers_buy_the_most as $i => $item)
                                <tr>
                                    <td>{{ ++$i }} </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        {{ $item->email }}
                                    </td>
                                    <td>
                                        {{ $item->phone }}
                                    </td>
                                    <td>
                                        {{ $item->count }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@section('js')

    <script src="{{ asset('back/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function() {
            $('#selling_products').DataTable({ pageLength : 5,lengthMenu: [[5, 10, 20], [5, 10, 20]]})

        })
        $(function() {
            $('#customers_buy_the_most').DataTable({ pageLength : 5,lengthMenu: [[5, 10, 20], [5, 10, 20]]})
        })
    </script>

    <script>
        let listDay = $('#listDay').attr('data-list-day')
        listDay = JSON.parse(listDay)
        let listMoney = $('#listDay').attr('data-money')
        listMoney = JSON.parse(listMoney)
    </script>

    <script>
        $(document).ready(function() {
            revenueByMonth(listDay, listMoney)
            var firstItem = listDay[0];
            var lastItem = listDay[listDay.length - 1];

            $("#date_from_total_money_chart").datepicker("setDate", formatDate(firstItem));
            $("#date_to_total_money_chart").datepicker("setDate", formatDate(lastItem));
            $('.Monthly_Revenue_Total').html(
                `Từ ${formatDate(firstItem)} đến ${formatDate(lastItem)} là: {{ number_format($revenueMonth[0]['totalMoney'], 0, '.', '.') }} VND`
            )
        });

        function formatDate(dateTime) {
            let date = new Date(dateTime);
            let day = date.getDate().toString().padStart(2, '0');
            let month = (date.getMonth() + 1).toString().padStart(2, '0');
            let year = date.getFullYear().toString();
            let formattedDate = `${month}/${day}/${year}`;
            return formattedDate;
        }
    </script>

    <script>
        $('#total_money_chart').click(function(e) {
            e.preventDefault()
            var _token = $('input[name="_token"]').val()
            var from_date = $('#date_from_total_money_chart').val()
            var to_date = $('#date_to_total_money_chart').val()
            $.ajax({
                url: "{{ url('admin/') }}",
                method: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    _token: _token
                },
                dataType: "JSON",
                success: function(res) {
                    revenueByMonth(res.searchListDay, res.listMoney)
                    $('.Monthly_Revenue_Total').html(
                        `Từ ${res.from_date} đến ${res.to_date} là: ${res.totalMoney} VND`
                    )
                }
            });
        })
    </script>
    <script src="{{ asset('back/bower_components/chart.js/Chart.js') }}"></script>
    <script>

        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
        var areaChart = new Chart(areaChartCanvas)
        var areaChartData = {
            labels: listDay,
            datasets: [
                {
                    label: 'Đơn hàng đã hủy',
                    fillColor: 'rgba(210, 214, 222, 1)',
                    strokeColor: 'rgba(210, 214, 222, 1)',
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: {{ $arrTotal_order_has_been_cancelled }}
                },
                {
                    label: 'Đơn hàng hoàn thành',
                    fillColor: 'rgba(60,141,188,0.9)',
                    strokeColor: 'rgba(60,141,188,0.8)',
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: {{ $arrTotal_order }},
                }
            ]
        }
        var areaChartOptions = {
            showScale: true,
            scaleShowGridLines: false,
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            scaleGridLineWidth: 1,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve: true,
            bezierCurveTension: 0.3,
            pointDot: false,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            maintainAspectRatio: true,
            responsive: true
        }
        areaChart.Line(areaChartData, areaChartOptions)
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
        function revenueByMonth(listDay, listMoney) {
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: listDay,
                    datasets: [{
                        data: listMoney,
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#00a65a',
                        borderWidth: 4,
                        pointBackgroundColor: '#00a65a'
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: false
                            }
                        }]
                    },
                    legend: {
                        display: false,
                    }
                }
            });
        }
    </script>
    <script>
        $('#date_from_total_money_chart').datepicker({
            autoclose: true
        })
        $('#date_to_total_money_chart').datepicker({
            autoclose: true
        })
    </script>
@endsection
@endsection
