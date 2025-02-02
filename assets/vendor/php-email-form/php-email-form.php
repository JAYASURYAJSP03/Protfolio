<?php
class PHP_Email_Form {
    public $to = '';
    public $from_name = '';
    public $from_email = '';
    public $subject = '';
    public $smtp = array();
    private $messages = array();

    public function add_message($content, $label, $priority = 0) {
        $this->messages[] = "$label: $content";
    }

    public function send() {
        $email_body = implode("\n", $this->messages);
        $headers = "From: $this->from_name <$this->from_email>\r\n";
        $headers .= "Reply-To: $this->from_email\r\n";

        // Send email using PHP mail()
        if (mail($this->to, $this->subject, $email_body, $headers)) {
            return 'Message sent successfully!';
        } else {
            return 'Failed to send the message!';
        }
    }
}
?>
