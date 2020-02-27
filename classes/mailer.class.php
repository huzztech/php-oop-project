<?php
/**
 * Mail Class
 */

class Mailer
{
    public $sendTo;
    public $subject;
    public $message;
    public $headers;
    public $error = [];

    public function __construct($sendTo, $subject, $message)
    {
        $this->sendTo  = $sendTo;
        $this->subject = $subject;
        $this->message = $message;
        $this->headers = $this->setHeader();
    }

    public function setHeader() {

        $headers = "From: huzztech <info@huzztech.com> \r\n";
        $headers .= "Reply-To: info@huzztech.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $this->headers = $headers;
        return $this;
    }

    public function send() {
        
        $to         = $this->sendTo;
        $subject    = $this->subject;
        $message    = $this->message;
        $headers    = $this->headers;

        return mail($to, $subject, $message, $headers);
    }
}