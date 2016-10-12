<?php

namespace MainBundle\Controller;


use MainBundle\Entity\Book;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;



/**
 * Class BookController
 * @package MainBundle\Controller
 * 
 */
class BookController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Retourne un Book individuel
     *
     * @param int $id
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     * @ApiDoc(
     *     output="MainBundle\Entity\Book",
     *     statusCodes={
     *         200 = "Retour quand Succès",
     *         404 = "Retour quand non trouvé"
     *     }
     * )
     */
    public function getAction(int $id)
    {
        return $this->getDoctrine()->getRepository('MainBundle:Book')->find($id);
    }
}
