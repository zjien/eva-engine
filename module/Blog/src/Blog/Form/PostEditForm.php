<?php
namespace Blog\Form;

use Eva\Form\Form;
use Zend\Form\Element;

class PostEditForm extends PostForm
{
    protected $mergeFilters = array(
        'urlName' =>     array(
            'name' => 'urlName',
            'required' => false,
            'filters' => array(
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'max' => 100,
                    ),
                ),
                array(
                    'name' => 'Eva\Validator\Db\NoRecordExistsExcludeSelf',
                    'options' => array(
                        'field' => 'urlName',
                        'table' => 'eva_blog_posts',
                        'exclude' => array(
                            'field' => 'id',
                        ),
                        'messages' => array(
                             'recordFound' => 'Abc',
                        ), 
                    ),

                ),
            ),
        ),
    );
}
