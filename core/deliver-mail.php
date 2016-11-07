<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

namespace Twheme;
use \;

// if the submit button is clicked, send the email
if ( isset( $_POST['message_send'] ) ) {

    // sanitize form values
    $name    = sanitize_text_field( $_POST["message_name"] );
    $email   = sanitize_email( $_POST["message_email"] );
    $phone = $_POST["message_phone"];
    $message = esc_textarea( $_POST["message_text"] );

    // get the blog administrator's email address
    $to = get_option( 'admin_email' );

    $subject = "Bonardi - Nova mensagem recebida de ". $name;
    $headers = "From: " . $name . " <" .$email . "> " . "\r\n";
    $body = "Olá,\r\n" . $name . " <" .$email . "> acabou de enviar uma mensagem pelo formulário de contato do site: \r\n\r\n" . $message . "\r\n\r\nO telefone de contato dele é: " . $phone . "\r\nNão se esqueça de entrar em contato.\r\n\r\nAtt.\r\nGRUPO JOTA\r\n41 3333-1023";

    // If email has been process for sending, display a success message
    if ( wp_mail( $to, $subject, $body, $headers ) ) {
        echo '<div class="container-fluid" style="position:fixed;top:50;width:100%;z-index:3;"><div class="row"><div class="alert alert-dismissible alert-success"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button><p class="text-center"><small>Obrigado! A sua mensagem foi enviada com sucesso. Em breve entraremos em contato com você.</small></p></div></div></div>';
    } else {
        echo '<div class="container-fluid" style="position:fixed;top:70;width:100%;z-index:3;"><div class="row"><div class="alert alert-dismissible alert-danger"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button><p class="text-center">Ocorreu um erro ao enviar a sua mensagem. Por favor, tente novamente.</p></div></div></div>';
    }
}