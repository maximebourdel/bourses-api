<?php

namespace MainBundle\Controller;


use MainBundle\Entity\Industry;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;



/**
 * Class IndustryController
 * @package MainBundle\Controller
 * 
 */
class IndustryController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Retourne un Industry individuel
     *
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     * @ApiDoc(
     *     output="MainBundle\Entity\Industry",
     *     statusCodes={
     *         200 = "Retour quand Succès",
     *         404 = "Retour quand non trouvé"
     *     },
     * )
     */
    public function getAllAction()
    {
        //retourne 10 résultats
        return $this->getDoctrine()->getRepository('MainBundle:Industry')->findBy(array(), null,30);
    }
    
    
    /**
     * Retourne un Industry individuel
     *
     * @param String $entry
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     * @ApiDoc(
     *     output="MainBundle\Entity\Industry",
     *     statusCodes={
     *         200 = "Retour quand Succès",
     *         404 = "Retour quand non trouvé"
     *     }
     * )
     */
    public function getAction($entry)
    {
        //retourne 10 résultats
        
        return $this->getDoctrine()->getRepository('MainBundle:Industry')->searchBy($entry);
    }
    
    
}
