<?php

class ExportController extends Controller {

    public function actionExport_collegian() {
        $GenNumber = $_GET['GenNumber'];
        $collegian = new Collegian();
        $result = $collegian->findAll("GenNumber = '$GenNumber' ");
        $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'A4', true, 'UTF-8');
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor("Nicola Asuni");
        $pdf->SetTitle("TCPDF Example 002");
        $pdf->SetSubject("TCPDF Tutorial");
        $pdf->SetKeywords("TCPDF, PDF, example, test, guide");
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->SetFont('angsanaupc', '', 16);


        $tbl = "รายชื่อนักศึกษา รุ่น $GenNumber<br><br>";
        //$tbl .= "<table style='border:2px solid #000000;'> ";
        $tbl .= "<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\">";
        $tbl .= "<tbody>";
        $tbl .= "<tr style='border:solid 1px #000000;' >";
        $tbl .= "<td align=\"center\">ลำดับ</td>";
        $tbl .= "<td align=\"center\">รหัส</td>";
        $tbl .= "<td> ชื่อ - สกุล</td>";
        $tbl .= "<td align=\"center\">เบอร์โทรศัพท์</td>";
        $tbl .= "</tr>";
        $i = 1;
        foreach ($result as $rs):
            $tbl .= "<tr>";
            $tbl .= "<td align=\"center\">" . $i++ . "</td>";
            $tbl .= "<td align=\"center\">" . $rs['collegian_code'] . "</td>";
            $tbl .= "<td> " . $rs['collegian_name'] . ' ' . $rs['collegian_lname'] . "</td>";
            $tbl .= "<td align=\"center\">" . $rs['collegian_tel'] . "</td>";
            $tbl .= "</tr>";
        endforeach;
        $tbl .= "</tbody>";

        $tbl .= "</table>";

        $pdf->writeHTML($tbl, true, true, false, false, '');
        $pdf->Output("example_002.pdf", "I");
    }

}
