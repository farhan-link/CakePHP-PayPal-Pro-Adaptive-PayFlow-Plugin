<?php
/**
 * DoMobileCheckoutPaymentComponent
 *
 * @author David Luu
 * @link http://github.com/whatsthegoss
 */

// Include required library files.
App::import('Vendor', 'Paypal.Paypal_Config');
App::import('Vendor', 'Paypal.Paypal');

class DoMobileCheckoutPaymentComponent extends Component {
	
	public function execute() {

		// Create PayPal object.
		$PayPalConfig = array(
							'Sandbox' => $this->sandbox,
							'APIUsername' => $this->api_username,
							'APIPassword' => $this->api_password,
							'APISignature' => $this->api_signature
							);

		$PayPal = new PayPal($PayPalConfig);

		// Prepare request arrays
		$DMCFields = array(
						   'token' => ''				// Token returned by SetMobileCheckout
						   );
				   
		$PayPalRequestData = array('DMCFields'=>$DMCFields);

		// Pass data into class for processing with PayPal and load the response array into $PayPalResult
		$PayPalResult = $PayPal->DoMobileCheckoutPayment($PayPalRequestData);

		return $PayPalResult;
	}
}
?>