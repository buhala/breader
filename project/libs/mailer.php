<?php
class mailer extends b_library{
    private $transport;
    private $message;
    public function __construct() {
        mail('fix288@gmail.com', 'test', '$message');

        
        
        
    }
    public function sendMail($subject,$from,$to,$body){
        $this->message->setSender($from);
        $this->message->setSubject($subject);
        $this->message->setTo($to);
        $this->message->setBody($body, 'text/html');
        $this->transport->send($this->message);
    }
}