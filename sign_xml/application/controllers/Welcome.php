<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once __DIR__.'/../../assets/src/XmlDigitalSignature.php';
class Welcome extends CI_Controller {
 
	public function index()
	{

		$this->load->view('welcome_message');
	}

	public function generate_xml()
	{ 
		$result=$this->Crud_model->GetData("docs","name,mobile","","","id desc","","1");
		// print_r($result);die;
		if(isset($result)){
		$xml = new DOMDocument("1.0"); 
		// It will format the output in xml format otherwise
		// the output will be in a single row
		$xml->formatOutput=true;
		$fitness=$xml->createElement("users");
		$xml->appendChild($fitness);

		// while($row=mysqli_fetch_array($result))
	/*	foreach ($result as $row) 
		{
		    $user=$xml->createElement("user");
		    $fitness->appendChild($user);
		     
		    $id=$xml->createElement("id", $row->id);
		    $user->appendChild($id);
		     
		    $name=$xml->createElement("name", $row->name);
		    $user->appendChild($name);
		     
		    $mobile=$xml->createElement("mobile", $row->mobile);
		    $user->appendChild($mobile);    
		}*/
		// echo "<xmp>".$xml->saveXML()."</xmp>";

		 // die;

		// print_r($xml);die;
		$xml_code = "<?xml version='1.0' encoding='UTF-8'?>".$xml->saveXML();
		// print_r($xml_code);die;

		$dsig = new XmlDsig\XmlDigitalSignature();

		$dsig
			->setCryptoAlgorithm(XmlDsig\XmlDigitalSignature::RSA_ALGORITHM)
			->setDigestMethod(XmlDsig\XmlDigitalSignature::DIGEST_SHA512)
			->forceStandalone();

		// load the private and public keys
		try
		{
			$dsig->loadPrivateKey(__DIR__ .'/../../assets/keys/private.pem', 'MrMarchello');		
			$dsig->loadPublicKey(__DIR__. '/../../assets/keys/public.pem');
			$dsig->loadPublicXmlKey(__DIR__. '/../../assets/keys/public.xml');
		}
		catch (\UnexpectedValueException $e)
		{
			print_r($e);
			exit(1);
		}
		
		$fakeXml = new \DOMDocument();
		// $fakeXml->loadXML($xml_code);
		$fakeXml->loadXML('<?xml version="1.0" encoding="UTF-8"?><foo><bar><baz>'.$result->name.$result->mobile.'</baz></bar></foo>');
			// $node = $fakeXml->getElementsByTagName('baz')->item(0);
		$node = $fakeXml->getElementsByTagName('foo')->item(0);

		try
		{
			// print_r("Expression");die;
			$dsig->addObject($node, 'object', true);
			$dsig->sign();
			$dsig->verify();
		}
		catch (\UnexpectedValueException $e)
		{
			print_r("Expression else");die;

			print_r($e);
			exit(1);
		}

		echo $fakeXml->saveXML();
		var_dump($dsig->getSignedDocument());
 
		}
		 
}
}