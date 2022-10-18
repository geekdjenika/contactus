<?php
    /**
     * @package djenika.forms
     * @version 1.1.0
     */
    /*
    Plugin Name: Custum Contact Form
    Plugin URI: https://github.com/geekdjenika/wpcontact.git
    Description: Un plugin de formulaire de contact personalisé
    Author: Aboubacar Djenika
    Version: 1.1.0
    Author URI: https://github.com/geekdjenika
    */
    function contact_form()
    {
        $content = '';
        $content .= '<!DOCTYPE html>';
        $content .= '<html lang="en">';
        $content .= '<head>';
        $content .= '<meta charset="UTF-8">';
        $content .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
        $content .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        $content .= '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"';
        $content .= 'integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
        $content .= '<link rel="stylesheet" href="/assets/css/style.css">';
        $content .= '<title>Simple Form</title>';
        $content .= '</head>';
        $content .= '<body>';
        $content .= '<div class="form-box" style="margin-top: 5%;" >';
        $content .= '<h1>Contactez nous !</h1>';
        $content .= '<form action="http://localhost/wordpres/merci-de-nous-avoir-contacte/" method="post">';
        $content .= '<div class="form-group">';
        $content .= '<label for="email">Email</label>';
        $content .= '<input class="form-control" id="email" type="email" name="email" placeholder="Entrer votre email">';
        $content .= '</div>';
        $content .= '<div class="form-group">';
        $content .= '<label for="object">Objet</label>';
        $content .= '<input class="form-control" id="object" type="text" name="objet" placeholder="Quel est l\'objet de votre message ?">';
        $content .= '</div>';
        $content .= '<div class="form-group">';
        $content .= '<label for="description" >Description</label>';
        $content .= '<textarea class="form-control" id="description" name="description" placeholder="Donner une briève description de votre message"></textarea>';
        $content .= '</div>';
        $content .= '<input class="btn btn-primary" type="submit" value="Envoyer" name="custumcontact_submit" />';
        $content .= '</div>';
        $content .= '</form>';
        $content .= '</div>';
        $content .= '</body>';
        $content .= '</html>';

        return $content;
    }

    add_shortcode('custumcontact','contact_form');

    function custumcontact_capture()
    {
        if(isset($_POST['custumcontact_submit']))
        {
            // echo "<pre>";print_r($_POST);echo "</pre>";
            $email = sanitize_text_field($_POST['email']);
            $objet = sanitize_text_field($_POST['objet']);
            $description = sanitize_textarea_field($_POST['description']);

            $to = 'djenikaa@gmail.com';
            $subject = $objet;
            $message = $description.' - '.$email;

            wp_mail($to,$subject,$message);
        }
    }
    add_action('wp_head','custumcontact_capture');
?>