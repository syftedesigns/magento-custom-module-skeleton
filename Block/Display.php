<?php

namespace MagePlaza\HelloWorld\Block;

class Display extends \Magento\Framework\View\Element\Template {

    protected $_postFactory;
    protected $_customer;
    protected $_customerFactory;

    public function __construct(
            \Magento\Framework\View\Element\Template\Context $context,
            \Mageplaza\HelloWorld\Model\PostFactory $postFactory,
            \Magento\Customer\Model\CustomerFactory $customerFactory,
            \Magento\Customer\Model\Customer $customers
    ) {
        $this->_postFactory = $postFactory;
        $this->_customer = $customers;
        $this->_customerFactory = $customerFactory;
        parent::__construct($context);
    }

    public function sayHello() {
        return __('Hello World');
    }

    public function getCustomerCollection() {
        return $this->_customer->getCollection()
                        ->addAttributeToSelect("*")
                        ->load();
    }

    public function getPostCollection() {
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }

    public function getFormAction() {

        return "/helloworld/index/action";
    }

}
