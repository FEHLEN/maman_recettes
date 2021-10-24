<?php //page controller créée à la main
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BonjourController{
    /**
     * @Route("/bonjour")
     */
    public function bonjour():Response{
        //echo "Bonjour à tous";
        return new Response("Bonjour à tous et bonne journée !");
    }
}



?>
