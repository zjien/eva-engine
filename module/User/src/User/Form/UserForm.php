<?php
/**
 * EvaEngine
 *
 * @link      https://github.com/AlloVince/eva-engine
 * @copyright Copyright (c) 2012 AlloVince (http://avnpc.com/)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Eva_Api.php
 * @author    AlloVince
 */

namespace User\Form;

/**
 * Eva Form will automatic combination form Elements & Validators & Filters
 * Also allow add sub forms and unit validate
 * 
 * @category   Eva
 * @package    Eva_Form
 */
class UserForm extends \Eva\Form\RestfulForm
{
    protected $subFormGroups = array(
        'default' => array(
            'Profile' => 'User\Form\ProfileForm',
            'Account' => 'User\Form\AccountForm',
        )
    );

    /**
     * Form basic elements
     *
     * @var array
     */
    protected $baseElements = array (
        'id' => array (
            'name' => 'id',
            'type' => 'hidden',
            'options' => array (
                'label' => 'Id',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'userName' => array (
            'name' => 'userName',
            'type' => 'text',
            'options' => array (
                'label' => 'User Name',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'email' => array (
            'name' => 'email',
            'type' => 'text',
            'options' => array (
                'label' => 'Email',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'status' => array (
            'name' => 'status',
            'type' => 'select',
            'options' => array (
                'label' => 'Status',
                'value_options' => array (
                    array (
                        'label' => 'Active',
                        'value' => 'active',
                    ),
                    array (
                        'label' => 'Deleted',
                        'value' => 'deleted',
                    ),
                    array (
                        'label' => 'Inactive',
                        'value' => 'inactive',
                    ),
                ),
            ),
            'attributes' => array (
                'value' => 'active',
            ),
        ),
        'screenName' => array (
            'name' => 'screenName',
            'type' => 'text',
            'options' => array (
                'label' => 'Screen Name',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'salt' => array (
            'name' => 'salt',
            'type' => 'text',
            'options' => array (
                'label' => 'Salt',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'firstName' => array (
            'name' => 'firstName',
            'type' => 'text',
            'options' => array (
                'label' => 'First Name',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'lastName' => array (
            'name' => 'lastName',
            'type' => 'text',
            'options' => array (
                'label' => 'Last Name',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'password' => array (
            'name' => 'password',
            'type' => 'text',
            'options' => array (
                'label' => 'Password',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'oldPassword' => array (
            'name' => 'oldPassword',
            'type' => 'text',
            'options' => array (
                'label' => 'Old Password',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'gender' => array (
            'name' => 'gender',
            'type' => 'select',
            'options' => array (
                'label' => 'Gender',
                'value_options' => array (
                    array (
                        'label' => 'Male',
                        'value' => 'male',
                    ),
                    array (
                        'label' => 'Female',
                        'value' => 'female',
                    ),
                    array (
                        'label' => 'Other',
                        'value' => 'other',
                    ),
                ),
            ),
            'attributes' => array (
            ),
        ),
        'avatar' => array (
            'name' => 'avatar',
            'type' => 'text',
            'options' => array (
                'label' => 'Avatar',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'timezone' => array (
            'name' => 'timezone',
            'type' => 'text',
            'options' => array (
                'label' => 'Timezone',
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'language' => array (
            'name' => 'language',
            'type' => 'text',
            'options' => array (
                'label' => 'Language',
            ),
            'attributes' => array (
                'value' => 'zh_CN',
            ),
        ),
    );

    /**
     * Form basic Validators
     *
     * @var array
     */
    protected $baseFilters = array (
        'id' => array (
            'name' => 'id',
            'required' => false,
            'filters' => array (
            ),
            'validators' => array (
                'notEmpty' => array (
                    'name' => 'NotEmpty',
                    'options' => array (
                    ),
                ),
            ),
        ),
        'userName' => array (
            'name' => 'userName',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'notEmpty' => array (
                    'name' => 'NotEmpty',
                    'options' => array (
                    ),
                ),
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '128',
                    ),
                ),
            ),
        ),
        'email' => array (
            'name' => 'email',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '320',
                    ),
                ),
            ),
        ),
        'status' => array (
            'name' => 'status',
            'required' => false,
            'filters' => array (
            ),
            'validators' => array (
                'inArray' => array (
                    'name' => 'InArray',
                    'options' => array (
                        'haystack' => array (
                            'active',
                            'deleted',
                            'inactive',
                        ),
                    ),
                ),
            ),
        ),
        'screenName' => array (
            'name' => 'screenName',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '128',
                    ),
                ),
            ),
        ),
        'salt' => array (
            'name' => 'salt',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'notEmpty' => array (
                    'name' => 'NotEmpty',
                    'options' => array (
                    ),
                ),
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '32',
                    ),
                ),
            ),
        ),
        'firstName' => array (
            'name' => 'firstName',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '20',
                    ),
                ),
            ),
        ),
        'lastName' => array (
            'name' => 'lastName',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '20',
                    ),
                ),
            ),
        ),
        'password' => array (
            'name' => 'password',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '128',
                    ),
                ),
            ),
        ),
        'oldPassword' => array (
            'name' => 'oldPassword',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '128',
                    ),
                ),
            ),
        ),
        'gender' => array (
            'name' => 'gender',
            'required' => false,
            'filters' => array (
            ),
            'validators' => array (
                'inArray' => array (
                    'name' => 'InArray',
                    'options' => array (
                        'haystack' => array (
                            'male',
                            'female',
                            'other',
                        ),
                    ),
                ),
            ),
        ),
        'avatar' => array (
            'name' => 'avatar',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '255',
                    ),
                ),
            ),
        ),
        'timezone' => array (
            'name' => 'timezone',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '64',
                    ),
                ),
            ),
        ),
        'language' => array (
            'name' => 'language',
            'required' => false,
            'filters' => array (
                'stripTags' => array (
                    'name' => 'StripTags',
                ),
                'stringTrim' => array (
                    'name' => 'StringTrim',
                ),
            ),
            'validators' => array (
                'stringLength' => array (
                    'name' => 'StringLength',
                    'options' => array (
                        'max' => '10',
                    ),
                ),
            ),
        ),
    );
}