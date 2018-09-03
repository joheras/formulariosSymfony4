<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entity;

/**
 * Description of Pedido
 *
 * @author joheras
 */
use Symfony\Component\Validator\Constraints as Assert;

class Pedido {

    /**
     * @Assert\NotBlank()
     */
    public $custname;

    /**
     * @Assert\NotBlank()
     */
    public $custtel;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    public $custemail;

    /**
     * @Assert\NotBlank()
     * @Assert\Choice(choices={"small","medium","large"})
     */
    public $size;

    /**
     * @Assert\Choice(choices={"cheese","onion","bacon","mushroom"},multiple=true)
     */
    public $toppings;
    public $comments;

    /* Getters and setters */

    function getCustname() {
        return $this->custname;
    }

    public function getCusttel() {
        return $this->custtel;
    }

    public function getCustemail() {
        return $this->custemail;
    }

    public function getSize() {
        return $this->size;
    }

    public function getToppings() {
        return $this->toppings;
    }

    public function getComments() {
        return $this->comments;
    }

    public function setCustname($custname) {
        $this->custname = $custname;
    }

    public function setcusttel($custtel) {
        $this->custtel = $custtel;
    }

    public function setCustemail($custemail) {
        $this->custemail = $custemail;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function setToppings($toppings) {
        $this->toppings = $toppings;
    }

    public function setComments($comments) {
        $this->comments = $comments;
    }

}
