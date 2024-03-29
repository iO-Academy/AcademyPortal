<?php

namespace Portal\Controllers\API;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Portal\Abstracts\Controller;
use Portal\Models\ApplicantModel;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SendEmailController extends Controller
{
    private ApplicantModel $applicantModel;
    private string $hostUsername;
    private string $hostPassword;
    private string $adminEmail;

    public function __construct(ApplicantModel $applicantModel, ContainerInterface $container)
    {
        $this->applicantModel = $applicantModel;
        $settings = $container->get('settings')['adminEmail'];
        $this->hostUsername = $settings['hostUsername'];
        $this->hostPassword = $settings['hostPassword'];
        $this->adminEmail = $settings['adminEmail'];
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $id = $request->getQueryParams()['id'];
        $applicant = $this ->applicantModel->getNameById($id);
        $name = $applicant['name'];
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $this->hostUsername;
            $mail->Password = $this->hostPassword;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress($this->adminEmail, 'Admin1');
            $mail->isHTML(true);
            $mail->Subject = 'Student profile has been updated';
            $mail->Body = '<p>The following applicant has edited their student profile: ' .
                $name . '</p>' .
                '<p>Link to the changed application: http://localhost:8080/editApplicant?id=' .
                $id . '</p>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();

            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
