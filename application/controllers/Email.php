<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
        $this->load->library('PHPMailer'); // load library
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('email/contact');
    }

    function send()
    {
        $this->load->config('email');
        $this->load->library('email');

        $from = $this->config->item('smtp_user');
        $to = $this->input->post('to');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    function emailSend()
    {
        $fromEmail = "alipsayyidah102@gmail.com";
        $isiEmail = "Isi email tulis disini";
        $mail = new PHPMailer();
        $mail->IsHTML(true);    // set email format to HTML
        $mail->IsSMTP();   // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = "alipsurya";  // alamat email kamu
        $mail->Password   = "Suryalana19";            // password GMail
        $mail->SetFrom('info@yourdomain.com', 'noreply');  //Siapa yg mengirim email
        $mail->Subject    = "Subjek email";
        $mail->Body       = $isiEmail;
        $toEmail = "alipsurya9@gmail.com"; // siapa yg menerima email ini
        $mail->AddAddress($toEmail);

        if (!$mail->Send()) {
            echo "Eror: " . $mail->ErrorInfo;
        } else {
            echo "Email berhasil dikirim";
        }
    }
}
