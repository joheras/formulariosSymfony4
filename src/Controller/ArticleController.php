<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use App\Forms\ArticleType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Article;
/**
 * Description of ArticleController
 *
 * @author joheras
 */
class ArticleController extends AbstractController{
    
    public function publish(Request $peticion){
        
         // Creamos el formulario
        $article = Article::draft("El Quijote", "En un lugar de la mancha...");

        $form = $this->createForm(ArticleType::class,$article);
        $form->handleRequest($peticion);
        // Comprobamos si el formulario es válido
        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            return $this->render("articleSummary.html.twig", array('article' => $article));
        }
        // Mostramos el formulario vacío
        return $this->render("article.html.twig", array('formulario' => $form->createView()));
        
        
        
    }
    
    
    
}
