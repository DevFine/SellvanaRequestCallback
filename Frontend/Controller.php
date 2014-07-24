<?php defined('BUCKYBALL_ROOT_DIR') || die();

class DevFine_RequestCallback_Frontend_Controller extends FCom_Frontend_Controller_Abstract
{
    /**
     * Collects data posted by user and saves it
     */
    public function action_request__POST()
    {
        $requestData = $this->BRequest;
        $name = $requestData->post('callme-name');
        $successMessage = $this->_(
            sprintf('%s, thank you for contacting us. We will get back to you in few minutes', $name)
        );
        $this->message($successMessage, 'success');
        $this->BResponse->redirect($requestData->referrer());
    }
}
