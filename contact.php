<?php
/**
 * Created by PhpStorm.
 * User: vadimyushchenko
 * Date: 1/11/14
 * Time: 11:33 PM
 */

//mail("vadim.yushchenko@gmail.com",$_POST["subject"],$_POST["message"],"From:"+ $_POST["email"] +"\r\n");
//print_r($_POST);
//echo $_FILES['document']['tmp_name']."\n";
//echo dirname(__FILE__)."\n";

if($_POST["type"] == 1){

    form1();
} elseif($_POST["type"] == 2){
    form2();
}elseif($_POST["type"] == 3){
    form3();
}elseif($_POST["type"] == 4){
    form4();
}elseif($_POST["type"] == 5){
    form5();
}elseif($_POST["type"] == 6){
    form6();
}


function form1(){
    $uploaddir = '/home/hwb/hwb.uk.com/www/uploads/';
    $files_upload = array();
//echo "<br>form1<br>".$_FILES['documents1'];
//    print_r($_FILES);
//    if(isset($_FILES['documents1'])){


    for($i=0;$i<$_POST["filecount"];$i++){
//        echo "name {$_FILES['documents1']['name'][$i]} tmp_name {$_FILES['documents1']['tmp_name'][$i]}";
        if (move_uploaded_file($_FILES['documents1']['tmp_name'][$i], $uploaddir .
            $_FILES['documents1']['name'][$i])) {

            array_push($files_upload,$_FILES['documents1']['name'][$i]);
//            print "File is valid, and was successfully uploaded.";
        } else {
//            print "There some errors!";
        }
    }



    $subject = "Application form  for financial assistance to medical institutions";

    $message = '<html><head><title>'+$subject+'</title></head><body>';

    $message .= "<b>Name of the institution:</b>".$_POST["institution"];
    $message .= "<br><b>Business profile:</b>".$_POST["business_profile"];
    $message .= "<br><b>Address:</b>".$_POST["address"];
    $message .= "<br><b>The representative of the  institution  First Name ,Last name:</b> ".$_POST["fio"];
    $message .= "<br><b>Contact details:</b> ".$_POST["contact"];
    $message .= "<br><b>Required amount of money  by the institution:</b> ".$_POST["money_amount"];
    $message .= "<br><b>Purpose of funds:</b> ".$_POST["purpose"];
    $message .= "<br><b>Additional information:</b> ".$_POST["addition_info"];
    $message .= "<br><b>Date:</b> ".date("d.m.Y H:i:s");
    $message .="</body></html>";

//    send_mail_attachment("no-reply@hwb.uk.com","info@hwb.uk.com",$subject,$message,$files_upload);
sendMulo("no-reply@hwb.uk.com",$subject,$message,$files_upload);
}

function form2(){
    $uploaddir = '/home/hwb/hwb.uk.com/www/uploads/';
    $files_upload = uploadFile();



    $subject = "Application form for financial support Patient’s profile";

    $message = '<html><head><title>'+$subject+'</title></head><body>';

    $message .= "<b>Patient’s representative/contact person:</b>".$_POST["representative"];
    $message .= "<br><b>Patient’s personal information:</b>".$_POST["patient_info"];
    $message .= "<br><b>Patient’s diagnosis:</b>".$_POST["patient_dialog"];
    $message .= "<br><b>Hosting Medical Institution:</b> ".$_POST["medical_institution"];
    $message .= "<br><b>The required amount of money for treating a patient, the copy of the bill for the treatment :</b> ".$_POST["money_amount_patient"];
    $message .= "<br><b>Preliminary attendance  date to a medical institution:</b> ".$_POST["visit_date"];
    $message .= "<br><b>The amount of money , which is at patient’s disposal  for  the application moment:</b> ".$_POST["money_amount_appl"];
    $message .= "<br><b>Patient’s health  status for  the application moment:</b> ".$_POST["health_status"];
    $message .= "<br><b>Additional information:</b> ".$_POST["addional_info2"];
    $message .= "<br><b>Date:</b> ".date("d.m.Y H:i:s");
    $message .="</body></html>";

//    send_mail_attachment("no-reply@hwb.uk.com","info@hwb.uk.com",$subject,$message,$files_upload);
    sendMulo("no-reply@hwb.uk.com",$subject,$message,$files_upload);
}

function form3(){
    $files_upload = uploadFile();

    $subject = "Application form  for  ’’ imported material” transporting  assistance";
    $message = '<html><head><title>'+$subject+'</title></head><body>';
    $message .= "<br><b>Last,first and middle name of a  contact person:</b> ".$_POST["fio3"];
    $message .= "<br><b>Contact information:</b> ".$_POST["contact3"];
    $message .= "<br><b>The institution’s name providing the necessary „material „:</b> ".$_POST["institution_name3"];
    $message .= "<br><b>Address, contact information:</b> ".$_POST["address3"];
    $message .= "<br><b>The name of  the hosting institution:</b> ".$_POST["hosting_institution3"];
    $message .= "<br><b>Address, contact information:</b> ".$_POST["address32"];
    $message .= "<br><b>Date of transplantation:</b> ".$_POST["transplantation_date3"];
    $message .= "<br><b>Additional information:</b> ".$_POST["aditional_info3"];

    $message .= "<br><b>Date:</b> ".date("d.m.Y H:i:s");
    sendMulo("no-reply@hwb.uk.com",$subject,$message,$files_upload);
}

function form4(){
    $files_upload = uploadFile();

    $subject = "Application form  for  financial support provision for carrying out the transplantation";
    $message = '<html><head><title>'+$subject+'</title></head><body>';
    $message .= "<br><b>Last, first and middle  name of patient’s representative,contact person:</b> ".$_POST["fio4"];
    $message .= "<br><b>Contact information:</b> ".$_POST["contact4"];
    $message .= "<br><b>Required donation material:</b> ".$_POST["donation4"];
    $message .= "<br><b>The name of  the institution that provides required \"imported material\":</b> ".$_POST["imported_material4"];
    $message .= "<br><b>Address, contact information:</b> ".$_POST["address4"];
    $message .= "<br><b>The  required amount of money according to  the invoice of the  institutions:</b> ".$_POST["money_amount4"];
    $message .= "<br><b>The amount of money , which is at patient’s disposal  for  the application moment:</b> ".$_POST["money_amount_appl4"];
    $message .= "<br><b>Additional information:</b> ".$_POST["aditional_info4"];

    $message .= "<br><b>Date:</b> ".date("d.m.Y H:i:s");
    sendMulo("no-reply@hwb.uk.com",$subject,$message,$files_upload);
}

function form5(){
    $files_upload = uploadFile();


    $subject = "Donor’s application form";
    $message = '<html><head><title>'+$subject+'</title></head><body>';
    $message .= "<br><b>Last, first and middle  name of patient’s representative,donor:</b> ".$_POST["fio5"];
    $message .= "<br><b>Contact information, country of living:</b> ".$_POST["contact5"];
    $message .= "<br><b>Age:</b> ".$_POST["age5"];
    $message .= "<br><b>“Imported material “:</b> ".$_POST["imported_material5"];
    $message .= "<br><b>Blood type:</b> ".$_POST["blood5"];
    $message .= "<br><b>Have you ever been a donor before?:</b> ".$_POST["been_donor2"];
    $message .= "<br><b>What diseases have you suffered for the last 6 months?:</b> ".$_POST["diseases5"];
    $message .= "<br><b>Additional information:</b> ".$_POST["additional_info5"];

    $message .= "<br><b>Date:</b> ".date("d.m.Y H:i:s");
    sendMulo("no-reply@hwb.uk.com",$subject,$message,$files_upload);
}
function form6(){


    $subject = "Volunteer’s application form";
    $message = '<html><head><title>'+$subject+'</title></head><body>';
    $message .= "<br><b>Last, first and middle  name of the volunteer:</b> ".$_POST["fio6"];
    $message .= "<br><b>Country of living:</b> ".$_POST["country6"];
    $message .= "<br><b>Contact information, e-mail:</b> ".$_POST["contact6"];
    $message .= "<br><b>What type of help would you like to provide HWB with?:</b> ";
    $message .= "<ul>";
    foreach($_POST["help"] as $help){
        $message .= "<li> ".$help."</li>";
    }
    $message .= "</ul>";
    $message .= "<br><b>Date:</b> ".date("d.m.Y H:i:s");
    sendMulo("no-reply@hwb.uk.com",$subject,$message,null);
}

function send_mail_attachment( $from, $to, $subj, $text, $filenames) {

    $un        = strtoupper(uniqid(time()));
    $head      = "From: $from\n";
    $head     .= "To: $to\n";
    $head     .= "Subject: $subj\n";
    $head     .= "X-Mailer: PHPMail Tool\n";
    $head     .= "Reply-To: $from\n";
    $head     .= "Mime-Version: 1.0\n";
    $head     .= "Content-Type:multipart/mixed;";
    $head     .= "boundary=\"----------".$un."\"\n\n";
    $zag       = "------------".$un."\nContent-Type:text/html; charset=UTF-8\n";
    $zag      .= "Content-Transfer-Encoding: 8bit\n\n$text\n\n";
    $zag      .= "------------".$un."\n";

//    $zag      .= chunk_split(base64_encode(fread($f,filesize($filename))))."\n";

    foreach($filenames as $filename){
        echo "Filename = $filename";
        $f         = fopen($filename,"rb");
        $data = fread($f,filesize($filename));
        $data = chunk_split(base64_encode($data));
        fclose($f);
        $zag      .= "Content-Type: application/octet-stream;\n";
        $zag      .= "name=\"".basename($filename)."\"\n";
        $zag      .= "Content-Disposition:attachment;";
        $zag      .= "filename=\"".basename($filename)."\"\n\n";
        $zag      .= "Content-Transfer-Encoding:base64\n\n".$data."\n\n";
        $zag      .= "------------".$un."\n";
    }

    return @mail($to, $subj, $zag, $head);
}

function sendMulo($from,$subject,$message,$files){
    // email fields: to, from, subject, and so on
    $uploaddir = '/home/hwb/hwb.uk.com/www/uploads/';
    $to = "info@hwb.uk.com";
//    $from = "mail@mail.com";
//    $subject ="My subject";
//    $message = "My message";
    $headers = "From: $from";

// boundary
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

// headers for attachment
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

// multipart boundary
    $message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
    $message .= "--{$mime_boundary}\n";

// preparing attachments
    for($x=0;$x<count($files);$x++){
        $file = fopen($uploaddir.$files[$x],"rb");
        $data = fread($file,filesize($uploaddir.$files[$x]));
        fclose($file);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$files[$x]\"\n" .
            "Content-Disposition: attachment;\n" . " filename=\"$files[$x]\"\n" .
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        $message .= "--{$mime_boundary}\n";
    }

// send
    $ok = @mail($to, $subject, $message, $headers);
//    if ($ok) {
//        echo "<p>mail sent to $to!</p>";
//    } else {
//        echo "<p>mail could not be sent!</p>";
//    }

}

function uploadFile(){
    $uploaddir = '/home/hwb/hwb.uk.com/www/uploads/';
    $files_upload = array();

    for($i=0;$i<$_POST["filecount"];$i++){

        if (move_uploaded_file($_FILES['documents1']['tmp_name'][$i], $uploaddir .
            $_FILES['documents1']['name'][$i])) {
            array_push($files_upload,$_FILES['documents1']['name'][$i]);
        } else {

        }
    }
    return $files_upload;
}