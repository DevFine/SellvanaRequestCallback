<?php defined('BUCKYBALL_ROOT_DIR') || die();

class DevFine_RequestCallback_Frontend_Controller extends FCom_Frontend_Controller_Abstract
{
    /**
     * Collects data posted by user and saves it
     */
    public function action_request__POST()
    {
        $requestData = $this->BRequest->post();

        /** @var DevFine_RequestCallback_Model_Request $entity */
        $entity = $this->DevFine_RequestCallback_Model_Request;

        if (false == $entity->validate($requestData, [], 'frontend')) {
            $this->message($this->_('You must fill all required fields'), 'error');
            return $this->BResponse->redirect($this->BRequest->referrer());
        }

        try {
            /* Check if request has been made from the shopping cart page */
            if (empty($requestData['product_id'])) {
                $cart = $this->FCom_Sales_Model_Cart->sessionCart(true);
                $requestData['cart_id'] = $cart->id();
                unset($requestData['product_id']);
            }

            $entity->submitRequest($requestData);
            $successMessage = $this->_(
                sprintf('%s, thank you for contacting us. We will get back to you in few minutes',
                $requestData['name'])
            );
            $this->message($successMessage, 'success');

        } catch (Exception $e) {
            $this->BDebug->logException($e);
            $this->message($e->getMessage(), 'error');
        }

        $this->BResponse->redirect($this->BRequest->referrer());
    }
}
