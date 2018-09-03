<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Forms\DTO;

/**
 * Description of PublishArticleCommand
 *
 * @author joheras
 */
class PublishArticleCommand {
     /**
     * @Assert\Choice(choices = {"draft", "published"})
     */
    public $status;

    public $existingArticle;

}
