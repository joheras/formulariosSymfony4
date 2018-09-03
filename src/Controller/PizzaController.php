<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Pedido;
use App\Forms\PedidoType;

class PizzaController extends AbstractController {

    public function pizzaDelivery(Request $request) {

        if ($request->get('submit')) {
            $custname = $request->get('custname');
            $custtel = $request->get('custtel');
            $custemail = $request->get('custemail');
            $size = $request->get('size');
            $toppings = $request->get('topping');
            $comments = $request->get('comments');
            return $this->render("summary.html.twig", array('custname' => $custname,
                        'custtel' => $custtel,
                        'custemail' => $custemail,
                        'size' => $size,
                        'toppings' => $toppings,
                        'comments' => $comments));
        } else {
            return $this->render("pizzaform.html.twig");
        }
    }

    public function pizzaDelivery2(Request $peticion) {

        // Creamos el formulario
        $pedido = new Pedido();

        $form = $this->createFormBuilder($pedido) // Creamos el constructor de formulario
                // Añadimos los distintos campos del formulario
                ->add('custname', TextType::class)
                ->add('custtel', TextType::class)
                ->add('custemail', EmailType::class)
                ->add('size', ChoiceType::class, array('choices' =>
                    array('small' => 'small', 'medium' => 'medium', 'large' => 'large')))
                ->add('toppings', ChoiceType::class, array('choices' => array('cheese' => 'cheese', 'bacon' => 'bacon', 'onion' => 'onion', 'mushroom' => 'mushroom'),
                    'multiple' => true))
                ->add('comments')
                // Añadimos el botón de enviar
                ->add('enviar', SubmitType::class, array('label' => 'Enviar'))
                // Finalmente obtenemos el formulario
                ->getForm();
        $form->handleRequest($peticion);
        // Comprobamos si el formulario es válido
        if ($form->isSubmitted() && $form->isValid()) {
            $pedido = $form->getData();
            return $this->render("summary.html.twig", array('custname' => $pedido->getCustname(),
                        'custtel' => $pedido->getCusttel(),
                        'custemail' => $pedido->getCustemail(),
                        'size' => $pedido->getSize(),
                        'toppings' => $pedido->getToppings(),
                        'comments' => $pedido->getComments()));
        }
        // Mostramos el formulario vacío
        return $this->render("pizzaform2.html.twig", array('formulario' => $form->createView()));
    }
    
     public function pizzaDelivery3(Request $peticion) {

        // Creamos el formulario
        $pedido = new Pedido();

        $form = $this->createForm(PedidoType::class,$pedido);
        $form->handleRequest($peticion);
        // Comprobamos si el formulario es válido
        if ($form->isSubmitted() && $form->isValid()) {
            $pedido = $form->getData();
            return $this->render("summary.html.twig", array('custname' => $pedido->getCustname(),
                        'custtel' => $pedido->getCusttel(),
                        'custemail' => $pedido->getCustemail(),
                        'size' => $pedido->getSize(),
                        'toppings' => $pedido->getToppings(),
                        'comments' => $pedido->getComments()));
        }
        // Mostramos el formulario vacío
        return $this->render("pizzaform3.html.twig", array('formulario' => $form->createView()));
    }

}
