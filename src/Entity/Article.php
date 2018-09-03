<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entity;

/**
 * Description of Article
 *
 * @author joheras
 */
class Article {

    private $title;
    private $body;
    private $createdOn;
    private $status;

    public static function draft($title, $body) {
        $article = new self();
        $article->title = $title;
        $article->body = $body;
        $article->createdOn = new \DateTime();
        $article->status = 'draft';
        return $article;
    }
    
    function getTitle() {
        return $this->title;
    }

    function getBody() {
        return $this->body;
    }

    function getCreatedOn() {
        return $this->createdOn;
    }

    function getStatus() {
        return $this->status;
    }

    
    public function publish() {
        $this->status = 'published';
    }

    public function unpublish() {
        $this->status = 'published';
    }

}
