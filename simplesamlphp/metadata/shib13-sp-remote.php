<?php

switch ($_SERVER["HTTP_HOST"]) {
  case 'cypresscomdev.prod.acquia-sites.com':
    $site_prefix = 'wwwdev';
    $mysite_prefix = 'mydev';
    break;
  case 'cypresscom.prod.acquia-sites.com':
  case 'cypresscomstg.prod.acquia-sites.com':
    $site_prefix = 'wwwqa';
    $mysite_prefix = 'myqa';
    break;
  default:
    $site_prefix = 'wwwqa';
    $mysite_prefix = 'myqa';
    break;
}

/**
 * SAML 1.1 remote SP metadata for simpleSAMLphp.
 *
 * See: https://rnd.feide.no/content/sp-remote-metadata-reference
 */

/*
 * This is just an example:
 */
$metadata['http://' . $site_prefix . '.cypress.com.com/shibboleth'] = array (
  'entityid' => 'http://' . $site_prefix . '.cypress.com.com/shibboleth',
  'contacts' => 
  array (
  ),
  'metadata-set' => 'shib13-sp-remote',
  'AssertionConsumerService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'http://' . $site_prefix . '.cypress.com/Shibboleth.sso/SAML2/POST',
      'index' => 1,
    ),
    1 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST-SimpleSign',
      'Location' => 'http://' . $site_prefix . '.cypress.com/Shibboleth.sso/SAML2/POST-SimpleSign',
      'index' => 2,
    ),
    2 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
      'Location' => 'http://' . $site_prefix . '.cypress.com/Shibboleth.sso/SAML2/Artifact',
      'index' => 3,
    ),
    3 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:PAOS',
      'Location' => 'http://' . $site_prefix . '.cypress.com/Shibboleth.sso/SAML2/ECP',
      'index' => 4,
    ),
    4 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
      'Location' => 'http://' . $site_prefix . '.cypress.com/Shibboleth.sso/SAML/POST',
      'index' => 5,
    ),
    5 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
      'Location' => 'http://' . $site_prefix . '.cypress.com/Shibboleth.sso/SAML/Artifact',
      'index' => 6,
    ),
  ),
  'keys' => 
  array (
    0 => 
    array (
      'encryption' => true,
      'signing' => true,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIDJDCCAgygAwIBAgIJAIwIf8GGdxT/MA0GCSqGSIb3DQEBBQUAMCoxKDAmBgNV
BAMTHzI0OTI1Ny13d3dkZXYuZGZ3LmludGVuc2l2ZS5pbnQwHhcNMTUwMjExMTM0
OTAxWhcNMjUwMjA4MTM0OTAxWjAqMSgwJgYDVQQDEx8yNDkyNTctd3d3ZGV2LmRm
dy5pbnRlbnNpdmUuaW50MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA
1nJrXxhdBpaqC/+4+2W+oQJhLZdCQu6v8beKEMTGnL8J2XlJIlFHr7QRQypRQVxF
w1ojZdszqhRC1zOga19IsvfXpdF9tDWkt0wZ0mBQoJmr0kJn/loT2oaE7K8vWI86
AglPS4CXwAbPOk1VOzV4jGCAfcUjOK1XtVAAL4ovy332uOQEUR+Sx/WXjN5nreZs
0XtR7ut+fvJk+VsrrOw9U+vGfMyTj17q4Ywiw4Z2tvdVmxrp9M6tRq5gHYhHHAwC
2PVvcudjJV/T817yC3lSRwTqjoaDLXTzrRhfkbDdIEDIg6qjc/0tjGb3npqOv7EE
0sxfTKP2SzpTou0/1zOPTwIDAQABo00wSzAqBgNVHREEIzAhgh8yNDkyNTctd3d3
ZGV2LmRmdy5pbnRlbnNpdmUuaW50MB0GA1UdDgQWBBQEKsXM0FtFdXwJYCmTjlUS
lanrLTANBgkqhkiG9w0BAQUFAAOCAQEA1OmMkBo2tAeSAzbNuRCxNZR3RV8pjPxW
F4CZZJMKXhpmXYdqWAfpAk0bT0tLIF/Cg1fcvJhwvet7/I5aLIvpejUl92mugYVg
toftSuJs4dmSeen6amU7Ea7nSqrdtBMkSm+ATPPMblAp5soePnF0Xiylb7ljIxWU
gWqU2RgJcNVWTIf1rHmpJYq/Od0EyHGhmu4maoF2BYrREEkO2ZguVhf/upyC31md
vhDmkgxJ9eIulDFCmcoRf/hC8dNlGVZTtepqoXbmSKEm/7tSYFlCk1g2bbpDm2k3
ThjGjxRjXXzBvU8icN0Lj9IPadcH9pacYb/CwEKVusyrC7VyYRJFpA==
',
    ),
  ),
);

$metadata['http://' . $mysite_prefix . '.cypress.com.com/shibboleth'] = array (
  'entityid' => 'http://' . $mysite_prefix . '.cypress.com.com/shibboleth',
  'contacts' => 
  array (
  ),
  'metadata-set' => 'shib13-sp-remote',
  'AssertionConsumerService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'http://' . $mysite_prefix . '.cypress.com/Shibboleth.sso/SAML2/POST',
      'index' => 1,
    ),
    1 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST-SimpleSign',
      'Location' => 'http://' . $mysite_prefix . '.cypress.com/Shibboleth.sso/SAML2/POST-SimpleSign',
      'index' => 2,
    ),
    2 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
      'Location' => 'http://' . $mysite_prefix . '.cypress.com/Shibboleth.sso/SAML2/Artifact',
      'index' => 3,
    ),
    3 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:PAOS',
      'Location' => 'http://' . $mysite_prefix . '.cypress.com/Shibboleth.sso/SAML2/ECP',
      'index' => 4,
    ),
    4 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
      'Location' => 'http://' . $mysite_prefix . '.cypress.com/Shibboleth.sso/SAML/POST',
      'index' => 5,
    ),
    5 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
      'Location' => 'http://' . $mysite_prefix . '.cypress.com/Shibboleth.sso/SAML/Artifact',
      'index' => 6,
    ),
  ),
  'keys' => 
  array (
    0 => 
    array (
      'encryption' => true,
      'signing' => true,
      'type' => 'X509Certificate',
      'X509Certificate' => 'MIIDJDCCAgygAwIBAgIJAIwIf8GGdxT/MA0GCSqGSIb3DQEBBQUAMCoxKDAmBgNV
BAMTHzI0OTI1Ny13d3dkZXYuZGZ3LmludGVuc2l2ZS5pbnQwHhcNMTUwMjExMTM0
OTAxWhcNMjUwMjA4MTM0OTAxWjAqMSgwJgYDVQQDEx8yNDkyNTctd3d3ZGV2LmRm
dy5pbnRlbnNpdmUuaW50MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA
1nJrXxhdBpaqC/+4+2W+oQJhLZdCQu6v8beKEMTGnL8J2XlJIlFHr7QRQypRQVxF
w1ojZdszqhRC1zOga19IsvfXpdF9tDWkt0wZ0mBQoJmr0kJn/loT2oaE7K8vWI86
AglPS4CXwAbPOk1VOzV4jGCAfcUjOK1XtVAAL4ovy332uOQEUR+Sx/WXjN5nreZs
0XtR7ut+fvJk+VsrrOw9U+vGfMyTj17q4Ywiw4Z2tvdVmxrp9M6tRq5gHYhHHAwC
2PVvcudjJV/T817yC3lSRwTqjoaDLXTzrRhfkbDdIEDIg6qjc/0tjGb3npqOv7EE
0sxfTKP2SzpTou0/1zOPTwIDAQABo00wSzAqBgNVHREEIzAhgh8yNDkyNTctd3d3
ZGV2LmRmdy5pbnRlbnNpdmUuaW50MB0GA1UdDgQWBBQEKsXM0FtFdXwJYCmTjlUS
lanrLTANBgkqhkiG9w0BAQUFAAOCAQEA1OmMkBo2tAeSAzbNuRCxNZR3RV8pjPxW
F4CZZJMKXhpmXYdqWAfpAk0bT0tLIF/Cg1fcvJhwvet7/I5aLIvpejUl92mugYVg
toftSuJs4dmSeen6amU7Ea7nSqrdtBMkSm+ATPPMblAp5soePnF0Xiylb7ljIxWU
gWqU2RgJcNVWTIf1rHmpJYq/Od0EyHGhmu4maoF2BYrREEkO2ZguVhf/upyC31md
vhDmkgxJ9eIulDFCmcoRf/hC8dNlGVZTtepqoXbmSKEm/7tSYFlCk1g2bbpDm2k3
ThjGjxRjXXzBvU8icN0Lj9IPadcH9pacYb/CwEKVusyrC7VyYRJFpA==
',
    ),
  ),
);