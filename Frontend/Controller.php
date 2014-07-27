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

        try {
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
