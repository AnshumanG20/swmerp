<?php
class testPdf extends Controller {

    function __construct(){
        $this->helper('phpMpdf');
        $this->db = new Database;
    }

    public function index()
    {

    }
    public function offer_letter_pdf()
    {
        try
        {
            $mpdf = phpMpdf(['default_font_size' => 10]);
        $mpdf-> SetTitle ('Offer Letter');
        $mpdf->WriteHTML('<table width="100%" style="margin:0px 0px 0px 0px;">'); // Body
            $mpdf->WriteHTML('<tr>');
             $mpdf->WriteHTML('<th style="text-align:center;color:red;width:50%;">');
               $mpdf->WriteHTML('<span style="font-weight:bold;">JOB OFFER LETTER</span>');
             $mpdf->WriteHTML('</th>');
        $mpdf->WriteHTML('</tr>');
        $mpdf->WriteHTML('<br />');
        $mpdf->WriteHTML('<br />');
        $mpdf->WriteHTML('<br />');
        $mpdf->WriteHTML('<br />');
        $mpdf->WriteHTML('<tr>');
             $mpdf->WriteHTML('<th style="text-align:left;color:red;width:20%;">');
               $mpdf->WriteHTML('<span style="font-weight:bold;">Company Information</span>');
             $mpdf->WriteHTML('</th>');
        $mpdf->WriteHTML('</tr>');
        $mpdf->WriteHTML('<br />');
        $mpdf->WriteHTML('<br />');
        $mpdf->WriteHTML('<tr>');
             $mpdf->WriteHTML('<th style="text-align:left;color:red;width:20%;">');
               $mpdf->WriteHTML('<span style="font-weight:bold;">Date</span>');
             $mpdf->WriteHTML('</th>');
        $mpdf->WriteHTML('</tr>');
         $mpdf->WriteHTML('<br />');
         $mpdf->WriteHTML('<br />');
        $mpdf->WriteHTML('<tr>');
             $mpdf->WriteHTML('<th style="text-align:left;color:red;width:20%;">');
               $mpdf->WriteHTML('<span style="font-weight:bold;">Recipient Name</span>');
             $mpdf->WriteHTML('</th>');
        $mpdf->WriteHTML('</tr>');
          $mpdf->WriteHTML('<tr>');
             $mpdf->WriteHTML('<th style="text-align:left;color:red;width:20%;">');
               $mpdf->WriteHTML('<span style="font-weight:bold;">Title</span>');
             $mpdf->WriteHTML('</th>');
        $mpdf->WriteHTML('</tr>');
        $mpdf->WriteHTML('<tr>');
             $mpdf->WriteHTML('<th style="text-align:left;color:red;width:20%;">');
               $mpdf->WriteHTML('<span style="font-weight:bold;">Company Name</span>');
             $mpdf->WriteHTML('</th>');
        $mpdf->WriteHTML('</tr>');
        $mpdf->WriteHTML('<tr>');
             $mpdf->WriteHTML('<th style="text-align:left;color:red;width:20%;">');
               $mpdf->WriteHTML('<span style="font-weight:bold;">Street Address</span>');
             $mpdf->WriteHTML('</th>');
        $mpdf->WriteHTML('</tr>');
        $mpdf->WriteHTML('<tr>');
             $mpdf->WriteHTML('<th style="text-align:left;color:red;width:20%;">');
               $mpdf->WriteHTML('<span style="font-weight:bold;">City,ST ZIP Code</span>');
             $mpdf->WriteHTML('</th>');
        $mpdf->WriteHTML('</tr>');
        $mpdf->WriteHTML('<br/>');
        $mpdf->WriteHTML('<br/>');
        $mpdf->WriteHTML('<tr>');
             $mpdf->WriteHTML('<th style="text-align:left;color:red;width:20%;">');
               $mpdf->WriteHTML('<span style="font-weight:bold;">Dear :</span>');
            $mpdf->WriteHTML(UPLOAD_DIR);
             $mpdf->WriteHTML('</th>');
        $mpdf->WriteHTML('</tr>');
        $mpdf->WriteHTML('</table>');
        $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('<div>We are pleased to offer you employment at <b><u>Your Company Name.</u></b> We feel that your skills and brackground will be valuable assets to our team. </div>');
        $mpdf->WriteHTML('</p>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('<div>Per our discussion,the position is <b><u>Position Applied For.</u></b> Your starting date will be <b><u>Date To Start</u></b> The enclosed employee handbook outlines the medical and retirement that our company offers. </div>');
            $mpdf->WriteHTML('</p>');
        $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('<div>If you choose to accept this offers, sign the second copy of this letter in the space provided and return it to us. A stamped self-addressed envelope is enclosed for your convenience.</div>');
            $mpdf->WriteHTML('</p>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('<div>We look forward to wecomming as a new employee at <b><u>YOUR COMPANY NAME.</u></b> </div>');
            $mpdf->WriteHTML('</p>');
            $mpdf->WriteHTML('<div>Sincerely,</div>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('</p>');
            $mpdf->WriteHTML('<div>Your Name <br>Title</div>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('</p>');
            $mpdf->WriteHTML('<div>Enclosure</div>');
            $mpdf->WriteHTML('<p>');
            $mpdf->WriteHTML('</p>');
        $fileName = 'file name.pdf'; // pdf file name
       // $pdfFilePath = "download.pdf";
        $mpdf->Output("c:/xampp/htdocs/sri/public/uploads/candidate_offer_letter/".$fileName, "F");
           // $mpdf->Output("".UPLOAD_DIR."candidate_offer_letter/".$fileName, "F");
       $mpdf->Output($fileName, "I");
        // $mpdf->Output($fileName, "D");
            echo "File Save Into Directory";

        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }   
    }
    public function salary_slip_pdf()
    {
        try
        {
            $this->view('pages/salary_slip');
        }
        catch(Exception $e)
        {
             echo $e->getMessage();
        }
      
    }

    public function StateDistCity(){
        $this->helper('StateDistCity');
        $StateDistcity = getStateDistCity();
        
    }

    public function firebase(){
        //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';

        /*api_key available in:
        Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/    
        $api_key = 'AAAADZxFLw8:APA91bGJ_BpP9yRVXyEYcXrVjD9c0fAZqgd1HzUMpiUvEX7SvcLmrYk_KAfnBZMO-QnaRJiScXafWcLOl8_2G9lA0lN30dS5AI9MA733_Sd1LIVXiGwA2e_gh5FBxGXmZZtRgXtUbqCR';
              
        $token = array();

        $device_id1 = 'dy2flmFPTGOSCWW8kGczsN:APA91bF35OU3BlWS5ALM4J1mUb0tVaIU3uq8ge72YqDY6RoLFP5LWK3x1RQlEzi8Ju9qzqvjbNWNV3jJCg6xlGqvSNPhnAXOYp8Kw7vqm-ewFCtrXEme_6tIicLl5nytcRDbj8pDxwbO';
        $device_id2 = 'eJvC5bk1Qm-XYJWyr2rt8w:APA91bE5aVhzpHHVB-6oo9anZoPHb3o1vIUPlBTFCZb-NNW6wnsPrXBq87tknoZcXBj44Akp96ejYusDUZEb-TgwPb-0EGmT0P8xRBWMYXJp54tKNy_6JKhfbkMUu3pqwj9famSEctFz';

        $token[] = $device_id1;
        //$token[] = $device_id2;
        $message = "hiiii";

        $fields = array (
            'registration_ids' => $token,
            'data' => array (
                        "message" => $message
                    )
            );

        //header includes Content type and api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$api_key
        );
                    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        echo $result;
    }

}