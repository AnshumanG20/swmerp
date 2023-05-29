<?php

  require_once 'dompdf/vendor/autoload.php';
  // mpdf (make pdf)
  require_once 'mpdf/vendor/autoload.php';
 use Dompdf\Dompdf;
 function phpMpdf($data = null){
 	if($data==null){
 		$mpdf = new \Mpdf\Mpdf();
 	}else{
 		$mpdf = new \Mpdf\Mpdf($data);
 	}
 	return $mpdf;
 }

// clone here

 function createOfferLetterPDF($data = null){
    if($data!=null){
       
        try
        {
            //echo '<pre>';print_r($data);return;
            //$data['name']=$data['first_name'];
            // $mpdf = new \Mpdf\Mpdf(['default_font_size' => 10]);
            // $mpdf-> SetTitle ('Offer Letter');
           
            // /////////////////////
            // reference the Dompdf namespace

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($data['content']);

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper("A4", "portrait");

            // Render the HTML as PDF
            $dompdf->render();

            // // Output the generated PDF to Browser
            // $dompdf->stream();

            $output = $dompdf->output();
            file_put_contents($data['file_name'], $output);

            // $content = $pdf->download()->getOriginalContent();

            // Storage::put('public/csv/name.pdf',$content) ;
            ///////////////////////

            // $fileName = 'filepdf.pdf'; // pdf file name
            
            // $mpdf->Output($data['file_name']);

            return true;
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }  
    }else{
        return false;
    }
}


 // clone end here

function createOfferLetterPDF23($data = null){
    if($data!=null){
       
        try
        {

            //$data['name']=$data['first_name'];
            $mpdf = new \Mpdf\Mpdf(['default_font_size' => 10]);
            $mpdf-> SetTitle ('Offer Letter');
            $mpdf->WriteHTML('<table width="100%" style="margin:0px 0px 0px 0px;">'); // Body
            $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<th style="text-align:center;width:50%;">');
            $mpdf->WriteHTML('<span style="font-weight:bold;">OFFER OF EMPLOYMENT</span>');
            $mpdf->WriteHTML('</th>');
            $mpdf->WriteHTML('</tr>');
             $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<th style="text-align:center;width:50%;">');
            $mpdf->WriteHTML('<img src="'.URLROOT.'/public/uploads/sri_img/sri_logo_min.jpg" style="height:60px; width:180px;" alt="logo">');
            $mpdf->WriteHTML('</th>');
             $mpdf->WriteHTML('</tr>');
            $mpdf->WriteHTML('<br />');
            $mpdf->WriteHTML('<br />');
            $mpdf->WriteHTML('<br />');
            $mpdf->WriteHTML('<br />');
            $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<th style="text-align:left;width:20%;">');
            $mpdf->WriteHTML('<span style="font-weight:bold;">Aadrika Enterprises.</span>');
            $mpdf->WriteHTML('</th>');
            $mpdf->WriteHTML('</tr>');
            $mpdf->WriteHTML('<br />');
            $mpdf->WriteHTML('<br />');
            $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<th style="text-align:left;width:20%;">');
            $mpdf->WriteHTML('<span style="font-weight:bold;">Date : '. $data["date"].'</span>');
            $mpdf->WriteHTML('</th>');
            $mpdf->WriteHTML('</tr>');
            $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<th style="text-align:left;width:20%;">');
            $mpdf->WriteHTML('<span style="font-weight:bold;">Address :  '. $data["candidateDetails"]["permanent_address"].'</span>');
            $mpdf->WriteHTML('</th>');
            $mpdf->WriteHTML('</tr>');
            $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<th style="text-align:left;width:20%;">');
            $mpdf->WriteHTML('<span style="font-weight:bold;">City :  '. $data["candidateDetails"]["permanent_city"].'<br> District :  '. $data["candidateDetails"]["permanent_district"].'<br> State :  '. $data["candidateDetails"]["permanent_state"].'<br> Pin Code :  '. $data["candidateDetails"]["permanent_pin_code"].'</span>');
            $mpdf->WriteHTML('</th>');
            $mpdf->WriteHTML('</tr>');
            $mpdf->WriteHTML('<br/>');
            $mpdf->WriteHTML('<br/>');
            $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<th style="text-align:left;width:20%;">');
            $mpdf->WriteHTML('<span style="font-weight:bold;">Dear :  '. $data["candidateDetails"]["first_name"]." ".$data["candidateDetails"]["middle_name"]." ".$data["candidateDetails"]["last_name"].'</span>');
            //$mpdf->WriteHTML(UPLOAD_DIR);
            $mpdf->WriteHTML('</th>');
            $mpdf->WriteHTML('</tr>');
            $mpdf->WriteHTML('</table>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('<div>We were all very excited to meet and get to know you over the past few days. We have been impressed with your background and would like to formally offer you the position of <b>'.$data["candidateDetails"]["designation_name"].'</b>. 
                                This is a <b>'.$data["candidateDetails"]["employment_type"].'</b> time position. You will be reporting to the head of the department. 
                                Please note that Sri Publication & Stationers Pvt. Ltd. is an at-will employer. That means that either you or Sri Publication & Stationers Pvt. Ltd. are free to end the employment relationship at any time, with or without notice or cause. </div>');
            $mpdf->WriteHTML('</p>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('<div>We will be offering you an annual gross salary of <b>'.$data["candidateDetails"]["basic_salary"]*12 .'</b> <b>ctc </b>.You will also have mention benefits as per company policy, like health and insurance plan, corporate mobile or travel expenses.  </div>');
            $mpdf->WriteHTML('</p>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('<div>Your expected starting date is <b>'.$data["candidateDetails"]["date_of_joining"].'</b>. You will be asked to sign an agreements at the beginning of your employment. </div>');
            $mpdf->WriteHTML('</p>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('<div>We would like to have your response by <b>'.$data["candidateDetails"]["date_of_joining"].'</b> In the meantime, please feel free to contact me via email: <b>'.$data["candidateDetails"]["company_location_email_id"].'</b> or phone: <b>'.$data["candidateDetails"]["contact_no"].'</b>, should you have any questions.</div>');
            $mpdf->WriteHTML('</p>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('<div>We are all looking forward to having you on our team. </div>');
            $mpdf->WriteHTML('</p>');

            $fileName = 'filepdf.pdf'; // pdf file name
            // $pdfFilePath = "download.pdf";
            // echo "<br/>";
            // print($data['file_name']);
            
            $mpdf->Output($data['file_name']);

            // echo "after pdf";
            //print($data['file_name']);
            // return;
            // $mpdf->Output("".UPLOAD_DIR."candidate_offer_letter/".$fileName, "F");
            //$mpdf->Output($fileName, "I");
            // $mpdf->Output($fileName, "D");
            //echo "File Save Into Directory";
            return true;
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }  
    }else{
        return false;
    }
}



function createExperienceLetterPDF($data = null){
    if($data!=null){
        //print_r($data);
        try
        {

            //$data['name']=$data['first_name'];
            $mpdf = new \Mpdf\Mpdf(['default_font_size' => 10]);
            $mpdf-> SetTitle ('Experience Letter');
            $mpdf->WriteHTML('<table width="100%" style="margin:0px 0px 0px 0px;">'); // Body
            $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<th style="text-align:right;width:50%;">');
            $mpdf->WriteHTML('<span style="font-weight:bold;">Date: <b>'.$data["date"].'</b></span>');
            $mpdf->WriteHTML('</th>');
             $mpdf->WriteHTML('</tr>');
            $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<th style="text-align:center;width:50%;">');
            $mpdf->WriteHTML('<span style="font-weight:bold;">Experience Letter </span>');
            $mpdf->WriteHTML('</th>');
            $mpdf->WriteHTML('</tr>');
             $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<th style="text-align:center;width:50%;">');
            $mpdf->WriteHTML('<img src="'.URLROOT.'/public/uploads/sri_img/sri_logo_min.jpg" style="height:60px; width:180px;" alt="logo">');
            $mpdf->WriteHTML('</th>');
             $mpdf->WriteHTML('</tr>');
            $mpdf->WriteHTML('<br />');
            $mpdf->WriteHTML('<br />');
            $mpdf->WriteHTML('<br />');
            $mpdf->WriteHTML('<br />');
            $mpdf->WriteHTML('<tr>');
            $mpdf->WriteHTML('<th style="text-align:left;width:20%;">');
            $mpdf->WriteHTML('<span style="font-weight:bold;">Aadrika Enterprises.</span>');
            $mpdf->WriteHTML('</th>');
            $mpdf->WriteHTML('</tr>');
            $mpdf->WriteHTML('</table>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('<div>This is to certify that <b>'.$data["emp_experience"]["first_name"]." ".$data["emp_experience"]["middle_name"]." ".$data["emp_experience"]["last_name"].'</b> has worked with us as  <b>'.$data["emp_experience"]["designation_name"].'</b>. 
                                from <b>'.$data["emp_experience"]["joining_date"].'</b> to <b>'.$data["emp_experience"]["notice_period"].'</b>. </div>');
            $mpdf->WriteHTML('</p>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('<div>Your contributions to the organization and its success will always be appreciated. We wish you all the best in your future endeavors.  </div>');
            $mpdf->WriteHTML('</p>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('<div>For Aadrika Enterprises.</div>');
            $mpdf->WriteHTML('</p>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('<div> <b>'.$data["signatureEmp"]["signfirst"]." ".$data["signatureEmp"]["signmiddle"]." ".$data["signatureEmp"]["signlast"].'</b> </div>');
            $mpdf->WriteHTML('<div><b>'.$data["signatureEmp"]["designation_name"].'</b> </div>');
            $mpdf->WriteHTML('</p>');
            
            $fileName = 'filepdf.pdf'; // pdf file name
            // $pdfFilePath = "download.pdf";
            $mpdf->Output($data['file_name']);
            // $mpdf->Output("".UPLOAD_DIR."candidate_offer_letter/".$fileName, "F");
            //$mpdf->Output($fileName, "I");
            // $mpdf->Output($fileName, "D");
            //echo "File Save Into Directory";
            return true;
        }catch(Exception $e){
            echo $e->getMessage();
            return false;
        }  
    }else{
        return false;
    }
}