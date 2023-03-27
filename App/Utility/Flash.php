<?php

namespace App\Utility;

class Flash
{
    /**
     * Ajouter un message d'erreur dans la session.
     * @param string $message Le message d'erreur à afficher.
     */
    public static function danger($message)
    {
        $_SESSION['flash']['danger'] = $message;
    }
}

?>