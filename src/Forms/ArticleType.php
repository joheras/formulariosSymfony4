<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Forms\Transformer\PublishArticleTransformer;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType {

    private $transformer;

    public function __construct(PublishArticleTransformer $transformer) {
        $this->transformer = $transformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add(
                'status', ChoiceType::class, [
            'choices' => [
                'draft' => 'Draft',
                'published' => 'Published'
            ]
                ]
        )->add('enviar', SubmitType::class, array('label' => 'Enviar'));

        $builder->addViewTransformer($this->transformer);
    }
    
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array('data_class' => 'App\Forms\DTO\PublishArticleCommand'));
    }


}
