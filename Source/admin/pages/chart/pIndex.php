<H1>Biểu đồ kinh doanh</H1>
<div>
<div class="dropdown-menu" >
  <a class="dropdown-item active" href="pages/chart/xlDuLieu.php?b=1">Doanh thu trong tháng </a>
  <a class="dropdown-item " href="pages/chart/xlDuLieu.php?b=2">Doanh thu trong năm</a>
  <a class="dropdown-item" href="pages/chart/xlDuLieu.php?b=3">Hàng hóa</a>
</div></div>

<div class="charts">
    <div id="charts" style="width: 100%; height:400px;">

    </div>
</div>

<script >
    $(function(){
        $.post('pages/chart/xlDuLieu.php',{},function(data){
            var data = $.parseJSON(data);
            console.log(data);
            Highcharts.chart('charts',{
                title: {
                    text: 'Số lượng bán của từng sản phẩm'
                },
                xAxis:
                {
                     categories: data[0]
                },
                
                series:[{
                    name: 'Số lượng bán',
                    data: data[1],
                    type: 'column'
                },
                {
                    name: 'Số lượt xem',
                    data: data[2],
                    type: 'column'
                },
                {
                    name: 'Số lượng tồn',
                    data: data[3],
                    type: 'column'
                }
                ]
            });
        });
    });
</script>