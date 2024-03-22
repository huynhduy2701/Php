 
        <meta charset="UTF-8">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
     google.load('visualization', '1.0', {'packages':['corechart']});
     google.setOnLoadCallback(drawVisualization);
     function drawVisualization() {
		 				//thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
            //b1 tạo ra đưuọc cái bảng datatable 
            var data= new  google.visualization.DataTable();
            var tenhh = new Array();
            var soluong= new Array();
            var dataten=0;
            var slb=0;
            var rows=new Array();

            //rows lấy từ câu truy vấn của database
            <?php
                $hh = new hanghoa();
                $result=$hh->getThongKe();
                while($set=$result->fetch()){
                  $tenhh=$set['tensp'];
                  $soluong=$set['soluong'];
                  echo "tenhh.push('".$tenhh."');";
                  echo "soluong.push('".$soluong."');";

                }
            ?>
            //tạo dòng
            for(var i =0;i<tenhh.length;i++){
              dataten=tenhh[i];
              slb=parseInt(soluong[i]);
              rows.push([dataten,slb]);
            }
            //tạo ra cột
            data.addColumn("string"," Tên Hàng Hóa");
            data.addColumn('number',"Số Lượng Bán");
            data.addRows(rows);
            var options={
              title:"THỐNG KÊ SỐ LƯỢNG BÁN",
              'width':500,
              "height":500,
              "backgroundColor":"#fffffff",
              is3D:true
            };

            //bước 3 tiến hàng vẽ 
            // biểu đồ cột column biểu đồ trong pie
            // var chart =  new google.visualization.PieChart(document.getElementById('chart_div'));
            var chart =  new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data,options)

                   
	 }
                   
    </script>
        <div class="thongke  ">
        <div style=" width:50%;  float: left;" class="shadow p-3 mb-5 bg-body-tertiary rounded"   id="chart_div">dfsf</div>
        <!-- <div style=" width:50%;  float: right"   id="chart_div1">dsfd</div>     -->
      </div>
 
 