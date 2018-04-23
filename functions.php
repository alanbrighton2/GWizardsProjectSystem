<?php
require_once( 'mail/PHPMailer-master/PHPMailerAutoload.php' );
function prepare_mail_setup() {
        $mailer = new PHPMailer;
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->Username = 'gwizproj@gmail.com';
        $mailer->Password = 'greenwich123';
        $mailer->SMTPSecure = 'tls';
        $mailer->Port = 587;
        $mailer->setFrom('Alanw235@hotmail.com', 'GwizardProject');
        $mailer->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        
        $mailer->isHTML(true);
        return $mailer;
    }

    function send_email( $recs, $project_id, $type ) {
        global $user;
        $mailer = prepare_mail_setup();
        foreach ( $recs as $rec ) {
            $mailer->addAddress( $rec['email'] );
        }
        switch ($type) {
            case 'new-project':
                $mailer->Subject = 'New Project has been submitted';
                $mailer->Body    = 'You can check and approve project at <a href="http://localhost/GWizardsSystem/project.php?filter=unapproved"> this link </a>';
                break;

            case 'approve-project':
                $mailer->Subject = 'Your project has been approved';
                $mailer->Body    = 'You can read new comment at <a href="http://localhost/GWizardsSystem/project-single.php?id='.$project_id.'">this link</a>';
                break;

            case 'assignees':
                $mailer->Subject = 'You have been assigned to a new project';
                $mailer->Body    = 'You can access the project at <a href="http://localhost/GWizardsSystem/project-single.php?id='.$project_id.'">this link</a>';
                break;
                
            default:
                # code...
                break;
        }
        $mailer->send();
    }