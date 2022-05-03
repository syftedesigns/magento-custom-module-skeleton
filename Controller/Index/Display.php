<?php

namespace MagePlaza\HelloWorld\Controller\Index;

class Display extends \Magento\Framework\App\Action\Action {

    protected $_pageFactory;
    protected $_postFactory;
    protected $_customer;
    protected $_customerFactory;

    public function __construct(
            \Magento\Framework\App\Action\Context $context,
            \Magento\Framework\View\Result\PageFactory $pageFactory,
            \Mageplaza\HelloWorld\Model\PostFactory $postFactory,
            \Magento\Customer\Model\CustomerFactory $customerFactory,
            \Magento\Customer\Model\Customer $customers
            ) {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        $this->_customer = $customers;
        $this->_customerFactory = $customerFactory;
        return parent::__construct($context);
    }

    public function sayHello() {
        return __('Hello World');
    }

    public function getPostCollection() {
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }
    
    public function getCustomerCollection() {
        return $this->_customer->getCollection()
               ->addAttributeToSelect("*")
               ->load();
    }
    
    public function getFormAction() {

        return "/helloworld/index/action";
    }

    public function execute() {
        return $this->_pageFactory->create();
    }

}
