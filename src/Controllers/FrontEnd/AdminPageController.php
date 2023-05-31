<?php

namespace Portal\Controllers\FrontEnd;

use Portal\Abstracts\Controller;
use Portal\Entities\BaseApplicantEntity;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class AdminPageController extends Controller
{
    private PhpRenderer $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * Checks if the user is admin or not and if true let them into admin page, if false redirect them back.
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        if ($_SESSION['loggedIn'] === true) {
            return $this->renderer->render($response, 'admin.phtml');
        }
        $_SESSION['loggedIn'] = false;
        return $response->withHeader('Location', './')->withStatus(302);
    }
    public function sendEmail()
    {
        $baseApplicant = new BaseApplicantEntity();
        $applicantName = $baseApplicant->getName();
        $applicantId = $baseApplicant->getId();

        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.gmail.com';                // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'testacademyportal@gmail.com';         // SMTP username
            $mail->Password = 'mnhftppxpklunjug';                       // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption; `PHPMailer::
            //ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            // Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('testacademyportal@gmail.com', 'test');  // Add a recipient
            $mail->addAddress('adamyoungy678@gmail.com', 'test');  // Add a recipient
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body = 'The following applicant has edited their student profile:' .
                $applicantName .
                            'Link to the changed application: http://0.0.0.0:8080/public/' .
                            $applicantId;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();

            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
