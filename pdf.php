<?php

require_once 'dompdf/autoload.inc.php';
//Khai báo sử dụng thư viện
use Dompdf\Dompdf;
//Khởi tạo đối tượng dompdf
$dompdf = new Dompdf();
//Nạp nội dung HTML cần tạo PDF
$dompdf->loadHtml('<h1>Welcome to Gextend</h1>');
//Khai báo khổ giấy và chiều giấy
$dompdf->setPaper('A4', 'landscape');
//Xuất nội dung với định dạng PDF ra trình duyệt
$dompdf->render();
//Hoặc xuất thành tập tin PDF để tải về
$dompdf->stream();
?>