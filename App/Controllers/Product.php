<?php

namespace App\Controllers;

use App\Models\Articles;
use App\Utility\Upload;
use \Core\View;
use Exception;

/**
 * Product controller
 */
class Product extends \Core\Controller
{

    /**
     * Affiche la page d'ajout
     * @return void
     */
    public function indexAction()
    {

        if (isset($_POST['submit'])) {

            $f = $_POST;

            // Validation
            $allowed_extensions = array('png', 'jpeg', 'jpg');
            $picture_extension = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));
            if (!in_array($picture_extension, $allowed_extensions)) {
                $error_message = "Seules les images en .png, .jpeg et .jpg sont autorisées.";
                View::renderTemplate('User/Add.html', ['error_message' => $error_message]);
                exit();
            } else {
                $f['user_id'] = $_SESSION['user']['id'];
                $id = Articles::save($f);

                $pictureName = Upload::uploadFile($_FILES['picture'], $id);

                Articles::attachPicture($id, $pictureName);

                header('Location: /product/' . $id);
            }
        }

        View::renderTemplate('Product/Add.html');
    }

    /**
     * Affiche la page d'un produit
     * @return void
     */
    public function showAction()
    {
        $id = $this->route_params['id'];

        try {
            Articles::addOneView($id);
            $suggestions = Articles::getSuggest();
            $article = Articles::getOne($id);
        } catch (\Exception $e) {
            var_dump($e);
        }

        View::renderTemplate('Product/Show.html', [
            'article' => $article[0],
            'suggestions' => $suggestions
        ]);
    }
}
