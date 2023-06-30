<?php 

  function view_bulletin ($filename)
  {
    header("content-type: application/pdf");
    readfile('../views/files/bulletin/'.$filename);
  }

  define('PDF_LOGO', 'logo.jpg');
  define('HEADER_TITLE', 'Bulletin de paie');
  define('HEADER_STARTING', 'JI2A Company');
  
  function generate_bulletin_paie ($idEmploye, $month)
  {
    require_once 'TCPDF/tcpdf.php';
    require_once 'employe.inc.php';
    $emp = getEmploye($idEmploye);
    $bulletin = valider_paie_employe($idEmploye, $month);
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('JI2A Company');
    $pdf->SetTitle('Bulletin');
    $pdf->SetSubject('Bulletin de paie');
    // set default header data
    $pdf->SetHeaderData(PDF_LOGO, PDF_HEADER_LOGO_WIDTH, HEADER_TITLE.' N°001', HEADER_STARTING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128));
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }
    // ---------------------------------------------------------
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 12, '', true);
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();
    // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
    
    $info = "";
    foreach ($bulletin as $key => $value):
      $info .= 
      "<tr>
        <td>".$key ."</td>
        <td align=\"right\">".number_format($value,2,'.',' ')." DH</td>
      </tr>";
    endforeach;

    $content = "
      <p align=\"right\"><small>Date : ".date('d/m/y h:m')."</small></p>
      <h4 align=\"center\">Bulletin de paie de mois ".$month."</h4>
      <table>
          <tr>
            <td>Nom</td> <td>".$emp['nom']."</td>
          </tr>
          <tr>
            <td>Prénom</td> <td>".$emp['prenom']."</td>
          </tr>
          <tr>
            <td>CIN</td> <td>".$emp['cin']."</td>
          </tr>
          <tr>
            <td>Date Naissance</td> <td>".$emp['dateNaiss']."</td>
          </tr>
          <tr>
            <td>Adresse</td> <td colspan=\"3\">".$emp['adresse']."</td>
          </tr>
          <tr>
            <td>Ville</td> <td colspan=\"3\">".$emp['ville']."</td>
          </tr>
          <tr>
            <td>Email</td> <td colspan=\"3\">".$emp['email']."</td>
          </tr>
          <tr>
            <td>Phone</td> <td colspan=\"3\">".$emp['phone']."</td>
          </tr>
      </table>
      <br><br>
      <hr>
      <br>
      <div class=\"content\">
        <table class=\"table\">
          <tbody>
          ".$info."
          </tbody>
        </table>
      </div>
    </div>
    ";
    // Set some content to print
    $html = 
    <<<EOD
    $content
    EOD;
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    // Save pdf
    $file_name = "bulletin_".$month."_".$idEmploye;
    $pdf->Output(__DIR__.'/../views/files/bulletins/'.$file_name.'.pdf', 'F');
    return $file_name;
  }