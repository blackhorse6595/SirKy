<!DOCTYPE html>
<html lang="th">
<head>
  <title>ตัวอย่าง : แสดงผล Modal ทันทีที่โหลดหน้าเพจ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- ส่วนของ Bootstrap -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 
 
  <!-- Java Script พอโหลดหน้าเพจแล้วให้เรียกการทำงานของ Modal  -->
  <script type="text/javascript">
  $(window).load(function(){
    $('#myModal').modal('show');
  });
  </script>
 
</head>
<body>
  <!-- เริ่มเนื้อหาหน้าเพจ -->
  <div class="container">
    <h2>ตัวอย่าง : แสดงผล Modal ทันทีที่โหลดหน้าเพจ</h2>
     
 
    <!--ส่วนของ Modal สังเกตุ id myModal ครับ ส่วนนี้แหละจะถูกเรียกด้วย Java Script -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
         
        <!-- เนือหาของ Modal ทั้งหมด -->
        <div class="modal-content">
         <!-- ส่วนหัวของ Modal  -->
         <div class="modal-header">
          <!-- ปุ่มกดปิด (X) ตรงส่วนหัวของ Modal  -->
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">หัวข้อ</h4>
        </div>
        <!-- ส่วนเนื้อหาของ Modal  -->
        <div class="modal-body">
          <p>เนื้อหาที่เราต้องการแสดง</p>
        </div>
        <div class="modal-footer">
         <!-- ปุ่มกดปิด (Close) ตรงส่วนล่างของ Modal  -->
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>
      
   </div>
 </div>
  
</div>
 
 
</body>
</html>