<?php
/**
 * SAML 1.1 remote SP metadata for simpleSAMLphp.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-sp-remote
 */

/*
 * This is just an example:
 */
$metadata['wwwdev.cypress.com'] = array(
	'AssertionConsumerService' => 'http://wwwdev.cypress.com/Shibboleth.sso/SAML2/POST',
	'audience'                 => 'urn:mace:cypress:shiblab',
	'base64attributes'         => FALSE,
  'SingleLogoutService' => 'http://wwwdev.cypress.com/Shibboleth.sso/SLO/POST',
);

$metadata['mydev.cypress.com'] = array(
	'AssertionConsumerService' => 'http://mydev.cypress.com/Shibboleth.sso/SAML2/POST',
	'audience'                 => 'urn:mace:cypress:shiblab',
	'base64attributes'         => FALSE,
  'SingleLogoutService' => 'http://mydev.cypress.com/Shibboleth.sso/SLO/POST',
);