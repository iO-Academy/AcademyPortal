<?php

namespace Portal\Controllers\API;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Portal\Abstracts\Controller;
use Portal\Entities\BaseApplicantEntity;
use Portal\Models\ApplicantModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SendEmailController extends Controller
{
    private ApplicantModel $applicantModel;

    public function __construct(ApplicantModel $applicantModel)
    {
        $this->applicantModel = $applicantModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
//        $baseApplicant = new BaseApplicantEntity();
//        $applicantName = $baseApplicant->getName();
//        $applicantId = $baseApplicant->getId();

        $id = $request->getQueryParams()['id'];

        $applicant = $this ->applicantModel->getNameById($id);
        $name = $applicant['name'];
//echo '<pre>';
//print_r($name);
//    echo'</pre>';
//    exit;
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
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body = '<p>The following applicant has edited their student profile: ' .
                $name . '</p>' .
                '<p>Link to the changed application: http://0.0.0.0:8080/public/' .
                $id . '</p>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();

            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}