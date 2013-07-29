<?php

include PROJECT_DIR . 'libs/swift/swift_required.php';

class mailer {

    use b_library;

    public function sendMail($subject, $from, $to, $body) {
        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl');
        $transport->setUsername('asfasdfasdf@gmail.com');
        $transport->setPassword('adfasdf');
        $mailer = Swift_Mailer::newInstance($transport);
        $message = Swift_Message::newInstance($subject, $body);
        $message->setSender($from);
        $message->setTo($to);
        $mailer->send($message);
    }

}