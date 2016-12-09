<?php

namespace Twheme;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Mailer {
    
    function send () {
        // if the submit button is clicked, send the email
        if ( isset( $_POST['message_send'] ) ) {

            // sanitize form values
            $name    = sanitize_text_field( $_POST["message_name"] );
            $company    = sanitize_text_field( $_POST["message_company"] );
            $email   = sanitize_email( $_POST["message_email"] );
            $phone = $_POST["message_phone"];
            $city    = sanitize_text_field( $_POST["message_city"] );
            $state    = sanitize_text_field( $_POST["message_state"] );
            $equipment    = sanitize_text_field( $_POST["message_equipment"] );
            $model    = sanitize_text_field( $_POST["message_model"] );
            $message = esc_textarea( $_POST["message_comments"] );

            // get the blog administrator's email address
            $to = "bruce@cantarim.com";  //'brasil@vermeer.com';

            $subject = "Vermeer - Solicitação de orçamento: " . $equipment . " " . $model;
            $headers = "From: " . $name . " <" .$email . "> " . "\r\n";
            $body = "Olá,\r\n" . $name . " <" .$email . "> da " . $company . ", de " . $city . " " . $state . "acabou de enviar uma solicitação de orçamento de " . $equipment . " " . $model . ". Abaixo segue a mensagem digitada no formulário de contato do site: \r\n\r\n" . $message . "\r\n\r\nO telefone de contato dele é: " . $phone . "\r\nNão se esqueça de entrar em contato.\r\n\r\nAtt.\r\nGRUPO JOTA\r\n41 3333-1023";

            // If email has been process for sending, display a success message
            if ( \mail( $to, $subject, $body, $headers ) ) {
                echo '<div class="container-fluid" style="position:fixed;top:10em;width:100%;z-index:200;"><div class="row"><div class="alert alert-dismissible alert-success"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button><p class="text-center"><small>Obrigado! A sua mensagem foi enviada com sucesso. Em breve entraremos em contato com você.</small></p></div></div></div>';
            } else {
                echo '<div class="container-fluid" style="position:fixed;top:10em;width:100%;z-index:200;"><div class="row"><div class="alert alert-dismissible alert-danger"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button><p class="text-center">Ocorreu um erro ao enviar a sua mensagem. Por favor, tente novamente.</p></div></div></div>';
            }
        }
    }
    
}