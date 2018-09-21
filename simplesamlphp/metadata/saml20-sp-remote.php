<?php

/**
 * SAML 2.0 remote SP metadata for simpleSAMLphp.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-sp-remote
 */

// Common protocol, but potentially can be overriden per environment.
$protocol = 'https://';

// Dynamically generate metadata based on environments.
switch ($_SERVER["HTTP_HOST"]) {
    case 'cypresscomdev.prod.acquia-sites.com':
        $site_prefixes = array('wwwdev', 'mydev');
        $protocol = 'http://';
        break;
    case 'cypresscomstg.prod.acquia-sites.com':
        $site_prefixes = array('wwwqa', 'myqa');
        $protocol = 'http://';
        break;
    case 'cypresscom.prod.acquia-sites.com':
    case 'test-www.cypress.com':
    case 'www.cypress.com':
        $site_prefixes = array('my');
        break;
    default:
        $site_prefixes = array('wwwqa', 'myqa');
        break;
}

foreach ($site_prefixes as $site_prefix) {
    $base_url = $protocol . $site_prefix . '.cypress.com';

    $metadata[$base_url . '/shibboleth'] = array (
        'entityid' => $base_url . '/shibboleth',
        'contacts' =>
            array (
            ),
        'metadata-set' => 'saml20-sp-remote',
        'AssertionConsumerService' =>
            array (
                0 =>
                    array (
                        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                        'Location' => $base_url . '/Shibboleth.sso/SAML2/POST',
                        'index' => 1,
                    ),
                1 =>
                    array (
                        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST-SimpleSign',
                        'Location' => $base_url . '/Shibboleth.sso/SAML2/POST-SimpleSign',
                        'index' => 2,
                    ),
                2 =>
                    array (
                        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
                        'Location' => $base_url . '/Shibboleth.sso/SAML2/Artifact',
                        'index' => 3,
                    ),
                3 =>
                    array (
                        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:PAOS',
                        'Location' => $base_url . '/Shibboleth.sso/SAML2/ECP',
                        'index' => 4,
                    ),
                4 =>
                    array (
                        'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
                        'Location' => $base_url . '/Shibboleth.sso/SAML/POST',
                        'index' => 5,
                    ),
                5 =>
                    array (
                        'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
                        'Location' => $base_url . '/Shibboleth.sso/SAML/Artifact',
                        'index' => 6,
                    ),
            ),
        'SingleLogoutService' =>
            array (
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
}

// SFDC DEV metadata
$sfdc_profiles = array(
    'partners',
    'customers',
);

foreach ($sfdc_profiles as $sfdc_profile) {
    $metadata['https://bigmach-cypress.cs41.force.com/' . $sfdc_profile] = array(
        'entityid' => 'https://bigmach-cypress.cs41.force.com/' . $sfdc_profile,
        'contacts' =>
            array(),
        'metadata-set' => 'saml20-sp-remote',
        'expire' => 1762235963,
        'AssertionConsumerService' =>
            array(
                0 =>
                    array(
                        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                        'Location' => 'https://mycase--BigMach.cs41.my.salesforce.com?so=00D550000005wxe',
                        'index' => 0,
                        'isDefault' => TRUE,
                    ),
                1 =>
                    array(
                        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                        'Location' => 'https://bigmach-cypress.cs41.force.com/customers/login?so=00D550000005wxe',
                        'index' => 1,
                    ),
                2 =>
                    array(
                        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                        'Location' => 'https://bigmach-cypress.cs41.force.com/partners/login?so=00D550000005wxe',
                        'index' => 2,
                    ),
            ),
        'SingleLogoutService' =>
            array(),
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
        'keys' =>
            array(
                0 =>
                    array(
                        'encryption' => FALSE,
                        'signing' => TRUE,
                        'type' => 'X509Certificate',
                        'X509Certificate' => 'MIIFYDCCBEigAwIBAgIQQ4KxN7E3aAGP1rpwQm6gZzANBgkqhkiG9w0BAQUFADCBvDELMAk
GA1UEBhMCVVMxFzAVBgNVBAoTDlZlcmlTaWduLCBJbmMuMR8wHQYDVQQLExZWZXJpU2lnbi
BUcnVzdCBOZXR3b3JrMTswOQYDVQQLEzJUZXJtcyBvZiB1c2UgYXQgaHR0cHM6Ly93d3cud
mVyaXNpZ24uY29tL3JwYSAoYykxMDE2MDQGA1UEAxMtVmVyaVNpZ24gQ2xhc3MgMyBJbnRl
cm5hdGlvbmFsIFNlcnZlciBDQSAtIEczMB4XDTEzMTAxODAwMDAwMFoXDTE3MTAxNzIzNTk
1OVowgY8xCzAJBgNVBAYTAlVTMRMwEQYDVQQIEwpDYWxpZm9ybmlhMRYwFAYDVQQHFA1TYW
4gRnJhbmNpc2NvMR0wGwYDVQQKFBRTYWxlc2ZvcmNlLmNvbSwgSW5jLjEVMBMGA1UECxQMQ
XBwbGljYXRpb25zMR0wGwYDVQQDFBRwcm94eS5zYWxlc2ZvcmNlLmNvbTCCASIwDQYJKoZI
hvcNAQEBBQADggEPADCCAQoCggEBALJtS/8tJmPZ/CKOz/dJ7MXrgz0MPQKxEAdgrdOFdRj
savTY+RviREe+zwjrKd9ZsCS3GltV2GBFD+YxXzuptQr+ZUDC8Vwx+49WQ13D55nmoUJVcB
1nHlTXBICJQDo87cZ4AIViuSVkUfQRG7BeMfKTMngyGdAOIsnSFwp1ONmRqaIarWTfr2w0S
NFNPikW9rQjehAF/eh6Ib4H3bJEE/kAwRS4mFJoxEKsiJQhnymqeoVgLMSb3UTS8J9R1RmQ
i+kisC39NAzVwQjM1X677cdQt0FaF6GlZ97vCH/rpNAJnAVwaWiRNQ32AR2X39rp8DVpSk9
eynNGp1JI/6mIv3ECAwEAAaOCAYcwggGDMB8GA1UdEQQYMBaCFHByb3h5LnNhbGVzZm9yY2
UuY29tMAkGA1UdEwQCMAAwDgYDVR0PAQH/BAQDAgWgMCgGA1UdJQQhMB8GCCsGAQUFBwMBB
ggrBgEFBQcDAgYJYIZIAYb4QgQBMEMGA1UdIAQ8MDowOAYKYIZIAYb4RQEHNjAqMCgGCCsG
AQUFBwIBFhxodHRwczovL3d3dy52ZXJpc2lnbi5jb20vY3BzMB8GA1UdIwQYMBaAFNebfNg
ioBX33a1fzimbWMO8RgC1MEEGA1UdHwQ6MDgwNqA0oDKGMGh0dHA6Ly9TVlJJbnRsLUczLW
NybC52ZXJpc2lnbi5jb20vU1ZSSW50bEczLmNybDByBggrBgEFBQcBAQRmMGQwJAYIKwYBB
QUHMAGGGGh0dHA6Ly9vY3NwLnZlcmlzaWduLmNvbTA8BggrBgEFBQcwAoYwaHR0cDovL1NW
UkludGwtRzMtYWlhLnZlcmlzaWduLmNvbS9TVlJJbnRsRzMuY2VyMA0GCSqGSIb3DQEBBQU
AA4IBAQAEMsL4HAd5uYW3j0SQFX4Opl7p0Vo4o7HKBHCtV4ZjzkSFwvRR9+5zijYqlhe4ou
1SL4WAWAsTKMTpKz0CL1S9Npt0IcKmIWeRsjJKKznFa8sxHhgEvm3O11a9uVfgvmnwn0VEp
uTmGvXvIUSAZ5q0CVDgzbGsrjWnZXllgO6krwPonEg6MdFarA87bAkLCrLZ0HqWeUVlf2nt
fvR7kjr0trUM/EBxPdcPxeMK70EJqku7GMEPOxkexTr2O0yD/2lZM0il+AUuOboZDl0Syfj
U0N7YIKNKZq5hcoUP/sCpcReMNj0dAWeVYmADrV7LlOVvndgHKcLrUydS/9obQHen',
                    ),
            ),
        'validate.authnrequest' => TRUE,
        'saml20.sign.assertion' => TRUE,
        'simplesaml.nameidattribute' => 'Contact.Email',
    );
}

// SFDC STAGE metadata.
$sfdc_stg_prod_profiles = array(
    'partner',
    'customer',
    'employee',
);

foreach ($sfdc_stg_prod_profiles as $sfdc_stg_profile) {
    $metadata['https://uat-cypress.cs14.force.com/' . $sfdc_stg_profile] = array (
        'entityid' => 'https://uat-cypress.cs14.force.com/' . $sfdc_stg_profile,
        'contacts' =>
            array (
            ),
        'metadata-set' => 'saml20-sp-remote',
        'expire' => 1837425704,
        'AssertionConsumerService' =>
            array (
                0 =>
                    array (
                        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                        'Location' => 'https://test.salesforce.com?so=00Dc0000003odbd',
                        'index' => 0,
                        'isDefault' => true,
                    ),
                1 =>
                    array (
                        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                        'Location' => 'https://uat-cypress.cs14.force.com/customer/login?so=00Dc0000003odbd',
                        'index' => 1,
                    ),
                2 =>
                    array (
                        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                        'Location' => 'https://uat-cypress.cs14.force.com/partner/login?so=00Dc0000003odbd',
                        'index' => 2,
                    ),
                3 =>
                    array (
                        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                        'Location' => 'https://uat-cypress.cs14.force.com/employee/login?so=00Dc0000003odbd',
                        'index' => 3,
                    ),
            ),
        'SingleLogoutService' =>
            array (
            ),
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
        'keys' =>
            array (
                0 =>
                    array (
                        'encryption' => false,
                        'signing' => true,
                        'type' => 'X509Certificate',
                        'X509Certificate' => 'MIIEkDCCA3igAwIBAgIOAV2fGArIAAAAABQP/xcwDQYJKoZIhvcNAQELBQAwgYcx
HzAdBgNVBAMMFkN5cHJlc3NfU2luZ2xlX1NpZ25fb24xGDAWBgNVBAsMDzAwRDFh
MDAwMDAwWU11VzEXMBUGA1UECgwOU2FsZXNmb3JjZS5jb20xFjAUBgNVBAcMDVNh
biBGcmFuY2lzY28xCzAJBgNVBAgMAkNBMQwwCgYDVQQGEwNVU0EwHhcNMTcwODAx
MTgzODU5WhcNMTgwODAxMTIwMDAwWjCBhzEfMB0GA1UEAwwWQ3lwcmVzc19TaW5n
bGVfU2lnbl9vbjEYMBYGA1UECwwPMDBEMWEwMDAwMDBZTXVXMRcwFQYDVQQKDA5T
YWxlc2ZvcmNlLmNvbTEWMBQGA1UEBwwNU2FuIEZyYW5jaXNjbzELMAkGA1UECAwC
Q0ExDDAKBgNVBAYTA1VTQTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEB
AI/4IFwnr2SrOtJgSxQblEM25wVgGzEJopGHACPo2mfjFQRBNUawu880BXo0o3DX
SByqMCKIRsdqp1xMTn1z/Oc/Mn4Lue15Tbk6CXBt6gIRLURVr//pGb9DMk3DAsY+
IGLwCjz2R6PCq3q/D+YWhzphBlubStzN8LOTHw3PbHifiBx01yLFDbYAQabXnXVQ
1+WCukdzZtnLSvLlpc2x+zLtevUo2udn1NuOVj7htwVKdf/19jk14OdBdrU9LL6I
oeWsilUqNg6C1wwBeFxQ6FM22dhhFn/4l5hVMGPBPq4fPJ73vhrNV8e9kCGpJbr4
X+e8SoUPEuTv9ZYCLRPW2rMCAwEAAaOB9zCB9DAdBgNVHQ4EFgQUMwpB0kmHDdQd
389Ewk01P01EcqYwDwYDVR0TAQH/BAUwAwEB/zCBwQYDVR0jBIG5MIG2gBQzCkHS
SYcN1B3fz0TCTTU/TURypqGBjaSBijCBhzEfMB0GA1UEAwwWQ3lwcmVzc19TaW5n
bGVfU2lnbl9vbjEYMBYGA1UECwwPMDBEMWEwMDAwMDBZTXVXMRcwFQYDVQQKDA5T
YWxlc2ZvcmNlLmNvbTEWMBQGA1UEBwwNU2FuIEZyYW5jaXNjbzELMAkGA1UECAwC
Q0ExDDAKBgNVBAYTA1VTQYIOAV2fGArIAAAAABQP/xcwDQYJKoZIhvcNAQELBQAD
ggEBACn581Sxg/OSEqqe60/vsHB+PQAl2WXlV4TjXTz7VcDFKCfjJSMC+LW3aNWA
KbNYwPSQmyVHvVZmNQ0H1fOUNIDdRCejExogQoHZjzI6WHJy0omi1HyPpGODeqk4
GC7f5YO1Q/LAyWxNbEeY6GYOkUTh7zgtsS/4KoGpVrxGlqyMkNYJARLMDxwbEGo2
mxj0hf0y4D9jT7AG3duiDU2H5zDA7Unfs5iq/bntC3/mr4Eh3E33T/xYYUpXVF6Y
gaA2zEIGQ9AiOJP1JQ/CobpipNMrh7/e/9M7djLd35opDyMsvBg1D1sWKW3SXg9X
aJyXTrZN4r3YhovTarmiih199ZM=',
                    ),
				1 =>
                    array (
                        'encryption' => false,
                        'signing' => true,
                        'type' => 'X509Certificate',
                        'X509Certificate' => 'MIIEnzCCA4egAwIBAgIOAWRdJDVuAAAAAHOOpdEwDQYJKoZIhvcNAQELBQAwgYwx
JDAiBgNVBAMMG0N5cHJlc3NfU2luZ2xlX1NpZ25fb25fMjAxOTEYMBYGA1UECwwP
MDBEYzAwMDAwMDNvZGJkMRcwFQYDVQQKDA5TYWxlc2ZvcmNlLmNvbTEWMBQGA1UE
BwwNU2FuIEZyYW5jaXNjbzELMAkGA1UECAwCQ0ExDDAKBgNVBAYTA1VTQTAeFw0x
ODA3MDIyMjM2NTFaFw0xOTA3MDIxMjAwMDBaMIGMMSQwIgYDVQQDDBtDeXByZXNz
X1NpbmdsZV9TaWduX29uXzIwMTkxGDAWBgNVBAsMDzAwRGMwMDAwMDAzb2RiZDEX
MBUGA1UECgwOU2FsZXNmb3JjZS5jb20xFjAUBgNVBAcMDVNhbiBGcmFuY2lzY28x
CzAJBgNVBAgMAkNBMQwwCgYDVQQGEwNVU0EwggEiMA0GCSqGSIb3DQEBAQUAA4IB
DwAwggEKAoIBAQC7URaUfWyaTh0muOsfNhVRN/EUwXTKhhkuSGh82hoQITXESM38
m5VfRNloadmQVwVMmVsz0h9c2TtWQSX1B6JlJEfQ89nJDqzyM32RdCy2Wq5R2tOP
Fhe9youV9KPQj2egXlgruN8X9Qml0tm2OJk0iryFSysK8/4kyK8MnWLwt80vWLM5
9JWEQdm+UqfxtWoDBzFwyEu5VdwAzrbMOntrfIspHFRm79+fNJZNFR9T9CMiXMy2
4tEH0kZKZHdPqMHO4KKvpfdZalOwEmHeYtXndAVVZqITFYDcxKws5ID3mJW4fpqr
MeSH8itfpZuSTZFvBR3Y6BVzgs38DvHpC8IDAgMBAAGjgfwwgfkwHQYDVR0OBBYE
FEVddvYk9nEtmxn24eFDhDlzPzeDMA8GA1UdEwEB/wQFMAMBAf8wgcYGA1UdIwSB
vjCBu4AURV129iT2cS2bGfbh4UOEOXM/N4OhgZKkgY8wgYwxJDAiBgNVBAMMG0N5
cHJlc3NfU2luZ2xlX1NpZ25fb25fMjAxOTEYMBYGA1UECwwPMDBEYzAwMDAwMDNv
ZGJkMRcwFQYDVQQKDA5TYWxlc2ZvcmNlLmNvbTEWMBQGA1UEBwwNU2FuIEZyYW5j
aXNjbzELMAkGA1UECAwCQ0ExDDAKBgNVBAYTA1VTQYIOAWRdJDVuAAAAAHOOpdEw
DQYJKoZIhvcNAQELBQADggEBADWM3tjZDFyNyDP585cX2Vquk0GO/wVgFMdCgIF6
EXc7j4nFAnDOyR2mNayITBYIdHqAjJ1O13NPl0G1CjBMixaKN0wfCcnSKmRREUQi
3VlqpVuljLe0I0mVniwb4vjhtUzpIuoaS0VGiZbDXEKXVjmwD9emT2R57jsyH3O0
rdj6Ec9VZEiInsck7NcR3uzFGAx5az2C58hwg5esjtv5Z4p08uEpmcFexmn4M7gL
nVPg7FI188Yfw8cuvhzeyWKYzdxPckkOHYx/l/2YOsZ8AiCz69KGpzBaEp7dZgFj
zpH+h19ucXK+Bq4HoyV3bKbRSdXvliN0tqLAAI7p5gjT4SY=',
                    ),
            ),
        'validate.authnrequest' => true,
        'saml20.sign.assertion' => true,
        'simplesaml.nameidattribute' => 'User.Email',
    );
}

// SFDC PROD metadata
foreach ($sfdc_stg_prod_profiles as $sfdc_prod_profile) {
    $metadata['https://cypress.force.com/' . $sfdc_prod_profile] = array(
        'entityid'                   => 'https://cypress.force.com/' . $sfdc_prod_profile,
        'contacts'                   =>
            array(),
        'metadata-set'               => 'saml20-sp-remote',
        'expire'                     => 1815196923,
        'AssertionConsumerService'   =>
            array(
                0 =>
                    array(
                        'Binding'   => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                        'Location'  => 'https://login.salesforce.com?so=00D1a000000YMuW',
                        'index'     => 0,
                        'isDefault' => TRUE,
                    ),
                1 =>
                    array(
                        'Binding'  => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                        'Location' => 'https://cypress.force.com/customer/login?so=00D1a000000YMuW',
                        'index'    => 1,
                    ),
                2 =>
                    array(
                        'Binding'  => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                        'Location' => 'https://cypress.force.com/employee/login?so=00D1a000000YMuW',
                        'index'    => 2,
                    ),
                3 =>
                    array(
                        'Binding'  => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                        'Location' => 'https://cypress.force.com/partner/login?so=00D1a000000YMuW',
                        'index'    => 3,
                    ),
            ),
        'SingleLogoutService'        =>
            array(),
        'NameIDFormat'               => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
        'keys'                       =>
            array(
                0 =>
                    array(
                        'encryption'      => FALSE,
                        'signing'         => TRUE,
                        'type'            => 'X509Certificate',
                        'X509Certificate' => 'MIIFYDCCBEigAwIBAgIQQ4KxN7E3aAGP1rpwQm6gZzANBgkqhkiG9w0BAQUFADCBvDELMAk
GA1UEBhMCVVMxFzAVBgNVBAoTDlZlcmlTaWduLCBJbmMuMR8wHQYDVQQLExZWZXJpU2lnbi
BUcnVzdCBOZXR3b3JrMTswOQYDVQQLEzJUZXJtcyBvZiB1c2UgYXQgaHR0cHM6Ly93d3cud
mVyaXNpZ24uY29tL3JwYSAoYykxMDE2MDQGA1UEAxMtVmVyaVNpZ24gQ2xhc3MgMyBJbnRl
cm5hdGlvbmFsIFNlcnZlciBDQSAtIEczMB4XDTEzMTAxODAwMDAwMFoXDTE3MTAxNzIzNTk
1OVowgY8xCzAJBgNVBAYTAlVTMRMwEQYDVQQIEwpDYWxpZm9ybmlhMRYwFAYDVQQHFA1TYW
4gRnJhbmNpc2NvMR0wGwYDVQQKFBRTYWxlc2ZvcmNlLmNvbSwgSW5jLjEVMBMGA1UECxQMQ
XBwbGljYXRpb25zMR0wGwYDVQQDFBRwcm94eS5zYWxlc2ZvcmNlLmNvbTCCASIwDQYJKoZI
hvcNAQEBBQADggEPADCCAQoCggEBALJtS/8tJmPZ/CKOz/dJ7MXrgz0MPQKxEAdgrdOFdRj
savTY+RviREe+zwjrKd9ZsCS3GltV2GBFD+YxXzuptQr+ZUDC8Vwx+49WQ13D55nmoUJVcB
1nHlTXBICJQDo87cZ4AIViuSVkUfQRG7BeMfKTMngyGdAOIsnSFwp1ONmRqaIarWTfr2w0S
NFNPikW9rQjehAF/eh6Ib4H3bJEE/kAwRS4mFJoxEKsiJQhnymqeoVgLMSb3UTS8J9R1RmQ
i+kisC39NAzVwQjM1X677cdQt0FaF6GlZ97vCH/rpNAJnAVwaWiRNQ32AR2X39rp8DVpSk9
eynNGp1JI/6mIv3ECAwEAAaOCAYcwggGDMB8GA1UdEQQYMBaCFHByb3h5LnNhbGVzZm9yY2
UuY29tMAkGA1UdEwQCMAAwDgYDVR0PAQH/BAQDAgWgMCgGA1UdJQQhMB8GCCsGAQUFBwMBB
ggrBgEFBQcDAgYJYIZIAYb4QgQBMEMGA1UdIAQ8MDowOAYKYIZIAYb4RQEHNjAqMCgGCCsG
AQUFBwIBFhxodHRwczovL3d3dy52ZXJpc2lnbi5jb20vY3BzMB8GA1UdIwQYMBaAFNebfNg
ioBX33a1fzimbWMO8RgC1MEEGA1UdHwQ6MDgwNqA0oDKGMGh0dHA6Ly9TVlJJbnRsLUczLW
NybC52ZXJpc2lnbi5jb20vU1ZSSW50bEczLmNybDByBggrBgEFBQcBAQRmMGQwJAYIKwYBB
QUHMAGGGGh0dHA6Ly9vY3NwLnZlcmlzaWduLmNvbTA8BggrBgEFBQcwAoYwaHR0cDovL1NW
UkludGwtRzMtYWlhLnZlcmlzaWduLmNvbS9TVlJJbnRsRzMuY2VyMA0GCSqGSIb3DQEBBQU
AA4IBAQAEMsL4HAd5uYW3j0SQFX4Opl7p0Vo4o7HKBHCtV4ZjzkSFwvRR9+5zijYqlhe4ou
1SL4WAWAsTKMTpKz0CL1S9Npt0IcKmIWeRsjJKKznFa8sxHhgEvm3O11a9uVfgvmnwn0VEp
uTmGvXvIUSAZ5q0CVDgzbGsrjWnZXllgO6krwPonEg6MdFarA87bAkLCrLZ0HqWeUVlf2nt
fvR7kjr0trUM/EBxPdcPxeMK70EJqku7GMEPOxkexTr2O0yD/2lZM0il+AUuOboZDl0Syfj
U0N7YIKNKZq5hcoUP/sCpcReMNj0dAWeVYmADrV7LlOVvndgHKcLrUydS/9obQHen',
                    ),
                1 =>
                    array(
                        'encryption'      => FALSE,
                        'signing'         => TRUE,
                        'type'            => 'X509Certificate',
                        'X509Certificate' => 'MIIEkDCCA3igAwIBAgIOAV2fGArIAAAAABQP/xcwDQYJKoZIhvcNAQELBQAwgYcx
HzAdBgNVBAMMFkN5cHJlc3NfU2luZ2xlX1NpZ25fb24xGDAWBgNVBAsMDzAwRDFh
MDAwMDAwWU11VzEXMBUGA1UECgwOU2FsZXNmb3JjZS5jb20xFjAUBgNVBAcMDVNh
biBGcmFuY2lzY28xCzAJBgNVBAgMAkNBMQwwCgYDVQQGEwNVU0EwHhcNMTcwODAx
MTgzODU5WhcNMTgwODAxMTIwMDAwWjCBhzEfMB0GA1UEAwwWQ3lwcmVzc19TaW5n
bGVfU2lnbl9vbjEYMBYGA1UECwwPMDBEMWEwMDAwMDBZTXVXMRcwFQYDVQQKDA5T
YWxlc2ZvcmNlLmNvbTEWMBQGA1UEBwwNU2FuIEZyYW5jaXNjbzELMAkGA1UECAwC
Q0ExDDAKBgNVBAYTA1VTQTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEB
AI/4IFwnr2SrOtJgSxQblEM25wVgGzEJopGHACPo2mfjFQRBNUawu880BXo0o3DX
SByqMCKIRsdqp1xMTn1z/Oc/Mn4Lue15Tbk6CXBt6gIRLURVr//pGb9DMk3DAsY+
IGLwCjz2R6PCq3q/D+YWhzphBlubStzN8LOTHw3PbHifiBx01yLFDbYAQabXnXVQ
1+WCukdzZtnLSvLlpc2x+zLtevUo2udn1NuOVj7htwVKdf/19jk14OdBdrU9LL6I
oeWsilUqNg6C1wwBeFxQ6FM22dhhFn/4l5hVMGPBPq4fPJ73vhrNV8e9kCGpJbr4
X+e8SoUPEuTv9ZYCLRPW2rMCAwEAAaOB9zCB9DAdBgNVHQ4EFgQUMwpB0kmHDdQd
389Ewk01P01EcqYwDwYDVR0TAQH/BAUwAwEB/zCBwQYDVR0jBIG5MIG2gBQzCkHS
SYcN1B3fz0TCTTU/TURypqGBjaSBijCBhzEfMB0GA1UEAwwWQ3lwcmVzc19TaW5n
bGVfU2lnbl9vbjEYMBYGA1UECwwPMDBEMWEwMDAwMDBZTXVXMRcwFQYDVQQKDA5T
YWxlc2ZvcmNlLmNvbTEWMBQGA1UEBwwNU2FuIEZyYW5jaXNjbzELMAkGA1UECAwC
Q0ExDDAKBgNVBAYTA1VTQYIOAV2fGArIAAAAABQP/xcwDQYJKoZIhvcNAQELBQAD
ggEBACn581Sxg/OSEqqe60/vsHB+PQAl2WXlV4TjXTz7VcDFKCfjJSMC+LW3aNWA
KbNYwPSQmyVHvVZmNQ0H1fOUNIDdRCejExogQoHZjzI6WHJy0omi1HyPpGODeqk4
GC7f5YO1Q/LAyWxNbEeY6GYOkUTh7zgtsS/4KoGpVrxGlqyMkNYJARLMDxwbEGo2
mxj0hf0y4D9jT7AG3duiDU2H5zDA7Unfs5iq/bntC3/mr4Eh3E33T/xYYUpXVF6Y
gaA2zEIGQ9AiOJP1JQ/CobpipNMrh7/e/9M7djLd35opDyMsvBg1D1sWKW3SXg9X
aJyXTrZN4r3YhovTarmiih199ZM=',
                    ),
            ),
        'validate.authnrequest'      => TRUE,
        'saml20.sign.assertion'      => TRUE,
        'simplesaml.nameidattribute' => 'User.Email'
    );
}

// Hackster Prod metadata.
$metadata['https://www.hackster.io/users/auth/saml/metadata'] = array (
    'entityid' => 'https://www.hackster.io/users/auth/saml/metadata',
    'contacts' =>
        array (
        ),
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'https://www.hackster.io/users/auth/saml/callback',
                    'index' => 0,
                    'isDefault' => true,
                ),
        ),
    'SingleLogoutService' =>
        array (
        ),
    'keys' =>
        array (
            0 =>
                array (
                    'encryption' => false,
                    'signing' => true,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIIEdzCCA1+gAwIBAgIJANPwUIzcAIrGMA0GCSqGSIb3DQEBBQUAMIGDMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDVNhbiBGcmFuY2lzY28xFzAVBgNVBAoTDkhhY2tzdGVyLCBJbmMuMRQwEgYDVQQDEwtoYWNrc3Rlci5pbzEgMB4GCSqGSIb3DQEJARYRYWRtaW5AaGFja3N0ZXIuaW8wHhcNMTUxMTAzMTkxMjU3WhcNMTYxMTAyMTkxMjU3WjCBgzELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRcwFQYDVQQKEw5IYWNrc3RlciwgSW5jLjEUMBIGA1UEAxMLaGFja3N0ZXIuaW8xIDAeBgkqhkiG9w0BCQEWEWFkbWluQGhhY2tzdGVyLmlvMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAynEf26N4n+o3XsLKC6A2g2Auvi14tAWzGyfGZ3K5/BIpazzLMh5EJWSmz8uKXWUP9fcR2BzJ9v4oxucncKFhAI+AknUEU9HNMgny7rqXBFShYqA/N2A3HisaHjpn8FBa37/zCR0FWyqSGEjRb77j8kdxJGoL8Ch0yYlGk+HsruLysj5dBShmJg3e0FIV2rD6oK0SM6K9jP39g4bQcEduCHYadz4uZyAOc7B6c0SFEGIzJaZFiKs7FtW3ucKTPOBo/kM447cVInNjSEH006RLYCxrV3hfDBxFge3yVkGqwB2ufQLrhOmlot9TSyp5MHNyA49Qwijik/f1ZPe53E0iAwIDAQABo4HrMIHoMB0GA1UdDgQWBBS4sI+jcyOeAJO1EZKe3br+GkfZoDCBuAYDVR0jBIGwMIGtgBS4sI+jcyOeAJO1EZKe3br+GkfZoKGBiaSBhjCBgzELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRcwFQYDVQQKEw5IYWNrc3RlciwgSW5jLjEUMBIGA1UEAxMLaGFja3N0ZXIuaW8xIDAeBgkqhkiG9w0BCQEWEWFkbWluQGhhY2tzdGVyLmlvggkA0/BQjNwAisYwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOCAQEABx+ncHwKq1YcysfPl3/s5n5J/hvBOiTmyRzN3/xWdK3lenZNGFt9EuzNB8JaC6uY5/wh7sECIxz5meCB8KEQ18OnlHXVXxdZ4zzcZe+cPXJaZl7l+QXps8XKeXhszU2MW+3EHa35AjaG/bwVUgw8DutqiGXGesOYduAou70qKHfG5My6nyEJohcU55PRTPK0ykGUUkXEr/cXyX5Y8TFtGk5XhAUjgnm/jhqoL1q+ACzV3U1gsQGfosortqd8PBNCRQ3hYWhieMZiI1T/KS0DLJ4jJ/YqiN2zrnD+5dTkIB/9sljxbBeqBxwVFLILVsiVHYX5zMEKdMF8ajOqJDbu4Q==',
                ),
            1 =>
                array (
                    'encryption' => true,
                    'signing' => false,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIIEdzCCA1+gAwIBAgIJANPwUIzcAIrGMA0GCSqGSIb3DQEBBQUAMIGDMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDVNhbiBGcmFuY2lzY28xFzAVBgNVBAoTDkhhY2tzdGVyLCBJbmMuMRQwEgYDVQQDEwtoYWNrc3Rlci5pbzEgMB4GCSqGSIb3DQEJARYRYWRtaW5AaGFja3N0ZXIuaW8wHhcNMTUxMTAzMTkxMjU3WhcNMTYxMTAyMTkxMjU3WjCBgzELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRcwFQYDVQQKEw5IYWNrc3RlciwgSW5jLjEUMBIGA1UEAxMLaGFja3N0ZXIuaW8xIDAeBgkqhkiG9w0BCQEWEWFkbWluQGhhY2tzdGVyLmlvMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAynEf26N4n+o3XsLKC6A2g2Auvi14tAWzGyfGZ3K5/BIpazzLMh5EJWSmz8uKXWUP9fcR2BzJ9v4oxucncKFhAI+AknUEU9HNMgny7rqXBFShYqA/N2A3HisaHjpn8FBa37/zCR0FWyqSGEjRb77j8kdxJGoL8Ch0yYlGk+HsruLysj5dBShmJg3e0FIV2rD6oK0SM6K9jP39g4bQcEduCHYadz4uZyAOc7B6c0SFEGIzJaZFiKs7FtW3ucKTPOBo/kM447cVInNjSEH006RLYCxrV3hfDBxFge3yVkGqwB2ufQLrhOmlot9TSyp5MHNyA49Qwijik/f1ZPe53E0iAwIDAQABo4HrMIHoMB0GA1UdDgQWBBS4sI+jcyOeAJO1EZKe3br+GkfZoDCBuAYDVR0jBIGwMIGtgBS4sI+jcyOeAJO1EZKe3br+GkfZoKGBiaSBhjCBgzELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRcwFQYDVQQKEw5IYWNrc3RlciwgSW5jLjEUMBIGA1UEAxMLaGFja3N0ZXIuaW8xIDAeBgkqhkiG9w0BCQEWEWFkbWluQGhhY2tzdGVyLmlvggkA0/BQjNwAisYwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOCAQEABx+ncHwKq1YcysfPl3/s5n5J/hvBOiTmyRzN3/xWdK3lenZNGFt9EuzNB8JaC6uY5/wh7sECIxz5meCB8KEQ18OnlHXVXxdZ4zzcZe+cPXJaZl7l+QXps8XKeXhszU2MW+3EHa35AjaG/bwVUgw8DutqiGXGesOYduAou70qKHfG5My6nyEJohcU55PRTPK0ykGUUkXEr/cXyX5Y8TFtGk5XhAUjgnm/jhqoL1q+ACzV3U1gsQGfosortqd8PBNCRQ3hYWhieMZiI1T/KS0DLJ4jJ/YqiN2zrnD+5dTkIB/9sljxbBeqBxwVFLILVsiVHYX5zMEKdMF8ajOqJDbu4Q==',
                ),
        ),
    'validate.authnrequest' => false,
    'saml20.sign.assertion' => true,
);

// Hackster.io dev metadata.
$metadata['https://dev.hackster.io/users/auth/saml/metadata'] = array (
    'entityid' => 'https://dev.hackster.io/users/auth/saml/metadata',
    'contacts' =>
        array (
        ),
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'https://dev.hackster.io/users/auth/saml/callback',
                    'index' => 0,
                    'isDefault' => true,
                ),
        ),
    'SingleLogoutService' =>
        array (
        ),
    'keys' =>
        array (
            0 =>
                array (
                    'encryption' => false,
                    'signing' => true,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIIEdzCCA1+gAwIBAgIJANPwUIzcAIrGMA0GCSqGSIb3DQEBBQUAMIGDMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDVNhbiBGcmFuY2lzY28xFzAVBgNVBAoTDkhhY2tzdGVyLCBJbmMuMRQwEgYDVQQDEwtoYWNrc3Rlci5pbzEgMB4GCSqGSIb3DQEJARYRYWRtaW5AaGFja3N0ZXIuaW8wHhcNMTUxMTAzMTkxMjU3WhcNMTYxMTAyMTkxMjU3WjCBgzELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRcwFQYDVQQKEw5IYWNrc3RlciwgSW5jLjEUMBIGA1UEAxMLaGFja3N0ZXIuaW8xIDAeBgkqhkiG9w0BCQEWEWFkbWluQGhhY2tzdGVyLmlvMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAynEf26N4n+o3XsLKC6A2g2Auvi14tAWzGyfGZ3K5/BIpazzLMh5EJWSmz8uKXWUP9fcR2BzJ9v4oxucncKFhAI+AknUEU9HNMgny7rqXBFShYqA/N2A3HisaHjpn8FBa37/zCR0FWyqSGEjRb77j8kdxJGoL8Ch0yYlGk+HsruLysj5dBShmJg3e0FIV2rD6oK0SM6K9jP39g4bQcEduCHYadz4uZyAOc7B6c0SFEGIzJaZFiKs7FtW3ucKTPOBo/kM447cVInNjSEH006RLYCxrV3hfDBxFge3yVkGqwB2ufQLrhOmlot9TSyp5MHNyA49Qwijik/f1ZPe53E0iAwIDAQABo4HrMIHoMB0GA1UdDgQWBBS4sI+jcyOeAJO1EZKe3br+GkfZoDCBuAYDVR0jBIGwMIGtgBS4sI+jcyOeAJO1EZKe3br+GkfZoKGBiaSBhjCBgzELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRcwFQYDVQQKEw5IYWNrc3RlciwgSW5jLjEUMBIGA1UEAxMLaGFja3N0ZXIuaW8xIDAeBgkqhkiG9w0BCQEWEWFkbWluQGhhY2tzdGVyLmlvggkA0/BQjNwAisYwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOCAQEABx+ncHwKq1YcysfPl3/s5n5J/hvBOiTmyRzN3/xWdK3lenZNGFt9EuzNB8JaC6uY5/wh7sECIxz5meCB8KEQ18OnlHXVXxdZ4zzcZe+cPXJaZl7l+QXps8XKeXhszU2MW+3EHa35AjaG/bwVUgw8DutqiGXGesOYduAou70qKHfG5My6nyEJohcU55PRTPK0ykGUUkXEr/cXyX5Y8TFtGk5XhAUjgnm/jhqoL1q+ACzV3U1gsQGfosortqd8PBNCRQ3hYWhieMZiI1T/KS0DLJ4jJ/YqiN2zrnD+5dTkIB/9sljxbBeqBxwVFLILVsiVHYX5zMEKdMF8ajOqJDbu4Q==',
                ),
            1 =>
                array (
                    'encryption' => true,
                    'signing' => false,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIIEdzCCA1+gAwIBAgIJANPwUIzcAIrGMA0GCSqGSIb3DQEBBQUAMIGDMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDVNhbiBGcmFuY2lzY28xFzAVBgNVBAoTDkhhY2tzdGVyLCBJbmMuMRQwEgYDVQQDEwtoYWNrc3Rlci5pbzEgMB4GCSqGSIb3DQEJARYRYWRtaW5AaGFja3N0ZXIuaW8wHhcNMTUxMTAzMTkxMjU3WhcNMTYxMTAyMTkxMjU3WjCBgzELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRcwFQYDVQQKEw5IYWNrc3RlciwgSW5jLjEUMBIGA1UEAxMLaGFja3N0ZXIuaW8xIDAeBgkqhkiG9w0BCQEWEWFkbWluQGhhY2tzdGVyLmlvMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAynEf26N4n+o3XsLKC6A2g2Auvi14tAWzGyfGZ3K5/BIpazzLMh5EJWSmz8uKXWUP9fcR2BzJ9v4oxucncKFhAI+AknUEU9HNMgny7rqXBFShYqA/N2A3HisaHjpn8FBa37/zCR0FWyqSGEjRb77j8kdxJGoL8Ch0yYlGk+HsruLysj5dBShmJg3e0FIV2rD6oK0SM6K9jP39g4bQcEduCHYadz4uZyAOc7B6c0SFEGIzJaZFiKs7FtW3ucKTPOBo/kM447cVInNjSEH006RLYCxrV3hfDBxFge3yVkGqwB2ufQLrhOmlot9TSyp5MHNyA49Qwijik/f1ZPe53E0iAwIDAQABo4HrMIHoMB0GA1UdDgQWBBS4sI+jcyOeAJO1EZKe3br+GkfZoDCBuAYDVR0jBIGwMIGtgBS4sI+jcyOeAJO1EZKe3br+GkfZoKGBiaSBhjCBgzELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRcwFQYDVQQKEw5IYWNrc3RlciwgSW5jLjEUMBIGA1UEAxMLaGFja3N0ZXIuaW8xIDAeBgkqhkiG9w0BCQEWEWFkbWluQGhhY2tzdGVyLmlvggkA0/BQjNwAisYwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOCAQEABx+ncHwKq1YcysfPl3/s5n5J/hvBOiTmyRzN3/xWdK3lenZNGFt9EuzNB8JaC6uY5/wh7sECIxz5meCB8KEQ18OnlHXVXxdZ4zzcZe+cPXJaZl7l+QXps8XKeXhszU2MW+3EHa35AjaG/bwVUgw8DutqiGXGesOYduAou70qKHfG5My6nyEJohcU55PRTPK0ykGUUkXEr/cXyX5Y8TFtGk5XhAUjgnm/jhqoL1q+ACzV3U1gsQGfosortqd8PBNCRQ3hYWhieMZiI1T/KS0DLJ4jJ/YqiN2zrnD+5dTkIB/9sljxbBeqBxwVFLILVsiVHYX5zMEKdMF8ajOqJDbu4Q==',
                ),
        ),
    'validate.authnrequest' => false,
    'saml20.sign.assertion' => true,
);

// Hackster.io dev metadata wihtout https.
$metadata['http://dev.hackster.io/users/auth/saml/metadata'] = array (
    'entityid' => 'http://dev.hackster.io/users/auth/saml/metadata',
    'contacts' =>
        array (
        ),
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'http://dev.hackster.io/users/auth/saml/callback',
                    'index' => 0,
                    'isDefault' => true,
                ),
        ),
    'SingleLogoutService' =>
        array (
        ),
    'keys' =>
        array (
            0 =>
                array (
                    'encryption' => false,
                    'signing' => true,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIIEdzCCA1+gAwIBAgIJANPwUIzcAIrGMA0GCSqGSIb3DQEBBQUAMIGDMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDVNhbiBGcmFuY2lzY28xFzAVBgNVBAoTDkhhY2tzdGVyLCBJbmMuMRQwEgYDVQQDEwtoYWNrc3Rlci5pbzEgMB4GCSqGSIb3DQEJARYRYWRtaW5AaGFja3N0ZXIuaW8wHhcNMTUxMTAzMTkxMjU3WhcNMTYxMTAyMTkxMjU3WjCBgzELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRcwFQYDVQQKEw5IYWNrc3RlciwgSW5jLjEUMBIGA1UEAxMLaGFja3N0ZXIuaW8xIDAeBgkqhkiG9w0BCQEWEWFkbWluQGhhY2tzdGVyLmlvMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAynEf26N4n+o3XsLKC6A2g2Auvi14tAWzGyfGZ3K5/BIpazzLMh5EJWSmz8uKXWUP9fcR2BzJ9v4oxucncKFhAI+AknUEU9HNMgny7rqXBFShYqA/N2A3HisaHjpn8FBa37/zCR0FWyqSGEjRb77j8kdxJGoL8Ch0yYlGk+HsruLysj5dBShmJg3e0FIV2rD6oK0SM6K9jP39g4bQcEduCHYadz4uZyAOc7B6c0SFEGIzJaZFiKs7FtW3ucKTPOBo/kM447cVInNjSEH006RLYCxrV3hfDBxFge3yVkGqwB2ufQLrhOmlot9TSyp5MHNyA49Qwijik/f1ZPe53E0iAwIDAQABo4HrMIHoMB0GA1UdDgQWBBS4sI+jcyOeAJO1EZKe3br+GkfZoDCBuAYDVR0jBIGwMIGtgBS4sI+jcyOeAJO1EZKe3br+GkfZoKGBiaSBhjCBgzELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRcwFQYDVQQKEw5IYWNrc3RlciwgSW5jLjEUMBIGA1UEAxMLaGFja3N0ZXIuaW8xIDAeBgkqhkiG9w0BCQEWEWFkbWluQGhhY2tzdGVyLmlvggkA0/BQjNwAisYwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOCAQEABx+ncHwKq1YcysfPl3/s5n5J/hvBOiTmyRzN3/xWdK3lenZNGFt9EuzNB8JaC6uY5/wh7sECIxz5meCB8KEQ18OnlHXVXxdZ4zzcZe+cPXJaZl7l+QXps8XKeXhszU2MW+3EHa35AjaG/bwVUgw8DutqiGXGesOYduAou70qKHfG5My6nyEJohcU55PRTPK0ykGUUkXEr/cXyX5Y8TFtGk5XhAUjgnm/jhqoL1q+ACzV3U1gsQGfosortqd8PBNCRQ3hYWhieMZiI1T/KS0DLJ4jJ/YqiN2zrnD+5dTkIB/9sljxbBeqBxwVFLILVsiVHYX5zMEKdMF8ajOqJDbu4Q==',
                ),
            1 =>
                array (
                    'encryption' => true,
                    'signing' => false,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIIEdzCCA1+gAwIBAgIJANPwUIzcAIrGMA0GCSqGSIb3DQEBBQUAMIGDMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDVNhbiBGcmFuY2lzY28xFzAVBgNVBAoTDkhhY2tzdGVyLCBJbmMuMRQwEgYDVQQDEwtoYWNrc3Rlci5pbzEgMB4GCSqGSIb3DQEJARYRYWRtaW5AaGFja3N0ZXIuaW8wHhcNMTUxMTAzMTkxMjU3WhcNMTYxMTAyMTkxMjU3WjCBgzELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRcwFQYDVQQKEw5IYWNrc3RlciwgSW5jLjEUMBIGA1UEAxMLaGFja3N0ZXIuaW8xIDAeBgkqhkiG9w0BCQEWEWFkbWluQGhhY2tzdGVyLmlvMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAynEf26N4n+o3XsLKC6A2g2Auvi14tAWzGyfGZ3K5/BIpazzLMh5EJWSmz8uKXWUP9fcR2BzJ9v4oxucncKFhAI+AknUEU9HNMgny7rqXBFShYqA/N2A3HisaHjpn8FBa37/zCR0FWyqSGEjRb77j8kdxJGoL8Ch0yYlGk+HsruLysj5dBShmJg3e0FIV2rD6oK0SM6K9jP39g4bQcEduCHYadz4uZyAOc7B6c0SFEGIzJaZFiKs7FtW3ucKTPOBo/kM447cVInNjSEH006RLYCxrV3hfDBxFge3yVkGqwB2ufQLrhOmlot9TSyp5MHNyA49Qwijik/f1ZPe53E0iAwIDAQABo4HrMIHoMB0GA1UdDgQWBBS4sI+jcyOeAJO1EZKe3br+GkfZoDCBuAYDVR0jBIGwMIGtgBS4sI+jcyOeAJO1EZKe3br+GkfZoKGBiaSBhjCBgzELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1TYW4gRnJhbmNpc2NvMRcwFQYDVQQKEw5IYWNrc3RlciwgSW5jLjEUMBIGA1UEAxMLaGFja3N0ZXIuaW8xIDAeBgkqhkiG9w0BCQEWEWFkbWluQGhhY2tzdGVyLmlvggkA0/BQjNwAisYwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOCAQEABx+ncHwKq1YcysfPl3/s5n5J/hvBOiTmyRzN3/xWdK3lenZNGFt9EuzNB8JaC6uY5/wh7sECIxz5meCB8KEQ18OnlHXVXxdZ4zzcZe+cPXJaZl7l+QXps8XKeXhszU2MW+3EHa35AjaG/bwVUgw8DutqiGXGesOYduAou70qKHfG5My6nyEJohcU55PRTPK0ykGUUkXEr/cXyX5Y8TFtGk5XhAUjgnm/jhqoL1q+ACzV3U1gsQGfosortqd8PBNCRQ3hYWhieMZiI1T/KS0DLJ4jJ/YqiN2zrnD+5dTkIB/9sljxbBeqBxwVFLILVsiVHYX5zMEKdMF8ajOqJDbu4Q==',
                ),
        ),
    'validate.authnrequest' => false,
    'saml20.sign.assertion' => true,
);

// Successfactors.com metadata for SSO between cy.com and sap dev system.
$metadata['https://www.successfactors.com/cypresssemD1'] = array (
    'entityid' => 'https://www.successfactors.com/cypresssemD1',
    'contacts' =>
        array (
        ),
    'metadata-set' => 'saml20-sp-remote',
    'NameIDFormat'               => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'https://performancemanager4.successfactors.com/saml2/SAMLAssertionConsumer?company=cypresssemD1',
                    'index' => 0,
                ),
        ),
    'SingleLogoutService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                    'Location' => 'https://performancemanager4.successfactors.com/saml2/LogoutServiceHTTPRedirect?company=cypresssemD1',
                    'ResponseLocation' => 'https://performancemanager4.successfactors.com/saml2/LogoutServiceHTTPRedirectResponse?company=cypresssemD1',
                ),
        ),
    'keys' =>
        array (
            0 =>
                array (
                    'encryption' => true,
                    'signing' => true,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIICDTCCAXagAwIBAgIETAl/KDANBgkqhkiG9w0BAQUFADBLMQswCQYDVQQGEwJVUzEbMBkGA1UEChMSU3VjY2Vzc2ZhY3RvcnMuY29tMQwwCgYDVQQLEwNPcHMxETAPBgNVBAMTCFNGIEFkbWluMB4XDTEwMDYwNDIyMzMxMloXDTI1MDYwMjIyMzMxMlowSzELMAkGA1UEBhMCVVMxGzAZBgNVBAoTElN1Y2Nlc3NmYWN0b3JzLmNvbTEMMAoGA1UECxMDT3BzMREwDwYDVQQDEwhTRiBBZG1pbjCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEAkS3xlwL9v/5kHmfnW0fy2JzIDvHKK4TmkZYHN+JHBLRRzNtlGo1f4yUseMjVn4RF1W11uEqnBySokXv5FYoPd1guJ1Xt3u2Xnj52l/lG4S7ichsPwF3ddDk+pW bKF29Ixt0iBN+keknSRyNGdh9jtOekCg6xq4i4YndwKCucABUCAwEAATANBgkqhkiG9w0BAQUFAAOBgQBzhTmtBbnXpT1aTWDa3PRUx8fWTx/oPjL7xP+WeoTJZmeY4N1c6Q3aZ+u+MhxvmhyDTGo43pyyFVBQjiFzrZUEAAPUrLr7M0e4kGULhxE1p2jnBNfzmVYK397+QPHD2kN/BIzVcMBFsrS+fpdDGWnzj1hjuGLNO/XuPO9eSBRkZA==',
                ),
        ),
    'validate.authnrequest' => true,
    'simplesaml.nameidattribute' => 'User.Email'
);

// Success factor production meta data.
$metadata['https://www.successfactors.com/cypresssemP'] = array (
    'entityid' => 'https://www.successfactors.com/cypresssemP',
    'description' =>
        array (
            'en' => 'SuccessFactors',
        ),
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
    'OrganizationName' =>
        array (
            'en' => 'SuccessFactors',
        ),
    'url' =>
        array (
            'en' => 'http://www.successfactors.com',
        ),
    'OrganizationURL' =>
        array (
            'en' => 'http://www.successfactors.com',
        ),
    'contacts' =>
        array (
        ),
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'https://performancemanager4.successfactors.com/saml2/SAMLAssertionConsumer?company=cypresssemP',
                    'index' => 0,
                ),
        ),
    'SingleLogoutService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                    'Location' => 'https://performancemanager4.successfactors.com/saml2/LogoutServiceHTTPRedirect?company=cypresssemP',
                    'ResponseLocation' => 'https://performancemanager4.successfactors.com/saml2/LogoutServiceHTTPRedirectResponse?company=cypresssemP',
                ),
        ),
    'keys' =>
        array (
            0 =>
                array (
                    'encryption' => true,
                    'signing' => true,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIICDTCCAXagAwIBAgIETAl/KDANBgkqhkiG9w0BAQUFADBLMQswCQYDVQQGEwJVUzEbMBkGA1UEChMSU3VjY2Vzc2ZhY3RvcnMuY29tMQwwCgYDVQQLEwNPcHMxETAPBgNVBAMTCFNGIEFkbWluMB4XDTEwMDYwNDIyMzMxMloXDTI1MDYwMjIyMzMxMlowSzELMAkGA1UEBhMCVVMxGzAZBgNVBAoTElN1Y2Nlc3NmYWN0b3JzLmNvbTEMMAoGA1UECxMDT3BzMREwDwYDVQQDEwhTRiBBZG1pbjCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEAkS3xlwL9v/5kHmfnW0fy2JzIDvHKK4TmkZYHN+JHBLRRzNtlGo1f4yUseMjVn4RF1W11uEqnBySokXv5FYoPd1guJ1Xt3u2Xnj52l/lG4S7ichsPwF3ddDk+pWbKF29Ixt0iBN+keknSRyNGdh9jtOekCg6xq4i4YndwKCucABUCAwEAATANBgkqhkiG9w0BAQUFAAOBgQBzhTmtBbnXpT1aTWDa3PRUx8fWTx/oPjL7xP+WeoTJZmeY4N1c6Q3aZ+u+MhxvmhyDTGo43pyyFVBQjiFzrZUEAAPUrLr7M0e4kGULhxE1p2jnBNfzmVYK397+QPHD2kN/BIzVcMBFsrS+fpdDGWnzj1hjuGLNO/XuPO9eSBRkZA==',
                ),
        ),
    'validate.authnrequest' => true,
    'simplesaml.nameidattribute' => 'User.Email'
);

// JIVE UAT DEV.
$metadata['https://uat.community.cypress.com'] = array (
    'entityid' => 'https://uat.community.cypress.com',
    'contacts' =>
        array (
        ),
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'https://uat.community.cypress.com/saml/sso',
                    'index' => 0,
                    'isDefault' => true,
                ),
        ),
    'SingleLogoutService' =>
        array (
        ),
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
    'keys' =>
        array (
            0 =>
                array (
                    'encryption' => false,
                    'signing' => true,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIIDXzCCAkcCBgFW+hW5vDANBgkqhkiG9w0BAQ0FADBzMQswCQYDVQQGEwJVUzELMAkGA1UECBMCT1IxETAPBgNVBAcTCFBvcnRsYW5kMRYwFAYDVQQKEw1KaXZlIFNvZnR3YXJlMRQwEgYDVQQLEwtFbmdpbmVlcmluZzEWMBQGA1UEAxMNSml2ZSBTb2Z0d2FyZTAeFw0xNjA5MDUxMTIyMjNaFw00NjA5MDUxNzQ1MjJaMHMxCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJPUjERMA8GA1UEBxMIUG9ydGxhbmQxFjAUBgNVBAoTDUppdmUgU29mdHdhcmUxFDASBgNVBAsTC0VuZ2luZWVyaW5nMRYwFAYDVQQDEw1KaXZlIFNvZnR3YXJlMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAmexwraBQBknex2l5sH2jbLNPzUiJ/ofwoILdCKDWVOCYSrFgUIM4dUMIxKLBonWltFW2EDpRStsIfUwzz3i3BGXU6LWmJpB+xTFFB0HueDwTN4S78kj0x7megYcIljzZx7/bJWSqvUiQvbrcbgz2Bt5+QhrXFDxNn+E9Y6kyze543fBf5yKCmEOgYyaIUzdRfXVzsJcSBFi4H/ErUN0w/qDc0kCdBy93cwTkKFhcCnbh7CG4DQvwqTnd645s4uIe2Mse+JFODAOnmNh+ZHCIQmXJWGwowoSEeHLL++t7izwjVdHlrKDE3HaL8Dlwcdc99uSD+UKXgw3KuJULQPfleQIDAQABMA0GCSqGSIb3DQEBDQUAA4IBAQB7gfiKpMPX7Fg17pPxnU6GznEmn7ka72BIM2vCVeW08rdOnUAK+z/e+zrQeGvU9zjCW+py0NBZgJYCwCt7jWu9D+cysXcEmpb+oAr9epYlj4YFoTJ76RqjHDEGZFAdm9P/gyoChHRuzFnTcNhBsabCP6ruW6dhBLc0nSCEHOvF0Ttml1W0zK8Qd0+RzTW9lcfgrj3J/f8sa/97iS1N1wfC3c8hAWlp9Z6Gv+Kdlo9NzPeL/g3Pc+zrTWVaujEs6vvsOJgK2DZTjk9kGgl5qCg51m3+TAQ9FLcvOGLszosR9vEJbYyiCieYWnwa2vjwh8fZZMYMQ3MiwF4tDrFZPPeh',
                ),
            1 =>
                array (
                    'encryption' => true,
                    'signing' => false,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIIDXzCCAkcCBgFW+hW5vDANBgkqhkiG9w0BAQ0FADBzMQswCQYDVQQGEwJVUzELMAkGA1UECBMCT1IxETAPBgNVBAcTCFBvcnRsYW5kMRYwFAYDVQQKEw1KaXZlIFNvZnR3YXJlMRQwEgYDVQQLEwtFbmdpbmVlcmluZzEWMBQGA1UEAxMNSml2ZSBTb2Z0d2FyZTAeFw0xNjA5MDUxMTIyMjNaFw00NjA5MDUxNzQ1MjJaMHMxCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJPUjERMA8GA1UEBxMIUG9ydGxhbmQxFjAUBgNVBAoTDUppdmUgU29mdHdhcmUxFDASBgNVBAsTC0VuZ2luZWVyaW5nMRYwFAYDVQQDEw1KaXZlIFNvZnR3YXJlMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAmexwraBQBknex2l5sH2jbLNPzUiJ/ofwoILdCKDWVOCYSrFgUIM4dUMIxKLBonWltFW2EDpRStsIfUwzz3i3BGXU6LWmJpB+xTFFB0HueDwTN4S78kj0x7megYcIljzZx7/bJWSqvUiQvbrcbgz2Bt5+QhrXFDxNn+E9Y6kyze543fBf5yKCmEOgYyaIUzdRfXVzsJcSBFi4H/ErUN0w/qDc0kCdBy93cwTkKFhcCnbh7CG4DQvwqTnd645s4uIe2Mse+JFODAOnmNh+ZHCIQmXJWGwowoSEeHLL++t7izwjVdHlrKDE3HaL8Dlwcdc99uSD+UKXgw3KuJULQPfleQIDAQABMA0GCSqGSIb3DQEBDQUAA4IBAQB7gfiKpMPX7Fg17pPxnU6GznEmn7ka72BIM2vCVeW08rdOnUAK+z/e+zrQeGvU9zjCW+py0NBZgJYCwCt7jWu9D+cysXcEmpb+oAr9epYlj4YFoTJ76RqjHDEGZFAdm9P/gyoChHRuzFnTcNhBsabCP6ruW6dhBLc0nSCEHOvF0Ttml1W0zK8Qd0+RzTW9lcfgrj3J/f8sa/97iS1N1wfC3c8hAWlp9Z6Gv+Kdlo9NzPeL/g3Pc+zrTWVaujEs6vvsOJgK2DZTjk9kGgl5qCg51m3+TAQ9FLcvOGLszosR9vEJbYyiCieYWnwa2vjwh8fZZMYMQ3MiwF4tDrFZPPeh',
                ),
        ),
    'validate.authnrequest' => false,
    'saml20.sign.assertion' => true,
    'simplesaml.nameidattribute' => 'User.Email',
);

// cypress.com extranet SSO.
$metadata['http://cypressextdev.prod.acquia-sites.com'] = array(
    'SingleLogoutService' =>
        array(
            0 =>
                array(
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                    'Location' => 'http://cypressextdev.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
            1 =>
                array(
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
                    'Location' => 'http://cypressextdev.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
        ),
    'AssertionConsumerService' =>
        array(
            0 =>
                array(
                    'index' => 0,
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'http://cypressextdev.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                ),
            1 =>
                array(
                    'index' => 1,
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
                    'Location' => 'http://cypressextdev.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
                ),
            2 =>
                array(
                    'index' => 2,
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
                    'Location' => 'http://cypressextdev.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                ),
            3 =>
                array(
                    'index' => 3,
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
                    'Location' => 'http://cypressextdev.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
                ),
        ),
    'contacts' =>
        array(
            0 =>
                array(
                    'emailAddress' => 'webmaster@cypress.com',
                    'contactType' => 'technical',
                    'givenName' => 'Cypress',
                    'surName' => 'Webmaster',
                ),
        ),
    'certData' => 'MIID+zCCAuOgAwIBAgIJAL3PQLjyUcjmMA0GCSqGSIb3DQEBCwUAMIGTMQswCQYDVQQGEwJJTjESMBAGA1UECAwJS2FybmF0YWthMRIwEAYDVQQHDAlCYW5nYWxvcmUxEzARBgNVBAoMClZhbHVlYm91bmQxEjAQBgNVBAsMCXRlY2huaWNhbDEPMA0GA1UEAwwGc291bXlhMSIwIAYJKoZIhvcNAQkBFhNydmFyaWFyMTBAZ21haWwuY29tMB4XDTE2MTEwODEyNDgwOVoXDTI2MTEwODEyNDgwOVowgZMxCzAJBgNVBAYTAklOMRIwEAYDVQQIDAlLYXJuYXRha2ExEjAQBgNVBAcMCUJhbmdhbG9yZTETMBEGA1UECgwKVmFsdWVib3VuZDESMBAGA1UECwwJdGVjaG5pY2FsMQ8wDQYDVQQDDAZzb3VteWExIjAgBgkqhkiG9w0BCQEWE3J2YXJpYXIxMEBnbWFpbC5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC63DAHRVCZPALlzceYdela48SHYj0arPzQ1f/v0OFJ35QSGUR3eC/FmH1+R91/JhGYzwp3kCms/TfXG5UHEj1AWb0sOfISm92aWPvT8zczLKCynz0tXx/F+/hsH0rAS8NqPXhtuKUNS6yRlvLb7LT2l2X8edtYiwSozfMZ0xgV4slCIUlnyZh1csDLbZvb99IDqcM42xG2PcvSZqNG/VUCFhjZ2S0Fo+GRNfZvPxIjo0WoIG4M8ZBzpuoiCrVVKpgbpNLtuDRFnINLR735ygJZU5hV0t7MypH3ldFrFQH9JJSTvFXpaEgDTTfIDI7r3KubSXM/gZZRslMazGpJrg63AgMBAAGjUDBOMB0GA1UdDgQWBBSLlBeHf0VWVKdNbuP2RunYjQTnaTAfBgNVHSMEGDAWgBSLlBeHf0VWVKdNbuP2RunYjQTnaTAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBAQAcmJjx7sKumgxCLcSS87Sc2WxRaMmFATRRrlDokpbx2ME4Mfg3KKdyOGWIdaXrdfbt3Dr0EHk34UrSnH8LoSJvWf91JDh3S4xYtcO46a3Cx0etzgdxj2JiGqURQJajUCCDfdnnwb657Hs58cKd450e/98Lo4ipaH7/GozpJnMo7YU78TsmS7ZNqpogg3lmDljXeThb/v+LBUwYuXxt84jSK4SuE1dwQn2rWdVHiCmkt5D1yK2A/bdvfXsVSoLasvSaE39hxGv2bV6khprLKsebEhDvpo+uw66um3bi7xbTE8iCZGjgCj3BfSQZKXBFglqPY0TwFxnFe9hyhQ3Hq+O6',
    'redirect.validate' => TRUE,
);

// JIVE SSO PRODUCTION METADATA.
$metadata['https://community.cypress.com'] = array (
    'entityid' => 'https://community.cypress.com',
    'contacts' =>
        array (
        ),
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'https://community.cypress.com/saml/sso',
                    'index' => 0,
                    'isDefault' => true,
                ),
        ),
    'SingleLogoutService' =>
        array (
        ),
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
    'keys' =>
        array (
            0 =>
                array (
                    'encryption' => false,
                    'signing' => true,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIIDXzCCAkcCBgFY+oB3pjANBgkqhkiG9w0BAQ0FADBzMQswCQYDVQQGEwJVUzELMAkGA1UECBMCT1IxETAPBgNVBAcTCFBvcnRsYW5kMRYwFAYDVQQKEw1KaXZlIFNvZnR3YXJlMRQwEgYDVQQLEwtFbmdpbmVlcmluZzEWMBQGA1UEAxMNSml2ZSBTb2Z0d2FyZTAeFw0xNjEyMTMyMzI0MzdaFw00NjEyMTQwNTQ3MzZaMHMxCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJPUjERMA8GA1UEBxMIUG9ydGxhbmQxFjAUBgNVBAoTDUppdmUgU29mdHdhcmUxFDASBgNVBAsTC0VuZ2luZWVyaW5nMRYwFAYDVQQDEw1KaXZlIFNvZnR3YXJlMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAnBYePu22LqsfPd+esgvoG+5yuK4BPG1wIo/bxXbHX95NShe4BRiMHExf5THostlwZOZ+Oke7WXi0Lp0xIaOGyzNkS00aQQbdKof56REc0TiTMvhHkLbUrWEibXkUE3wZuygSZCBG1SLTLKjtlF/LxEFCltZ2ykfd64ubb/H+Fw15DcYyzKYxaVKtDdlI5M0uKL2mBTr41zqt1QicyffUUFAXRjXhllHZ1d7Xvj6WssSbu33KaBasPal/bU6ElEVJjSmEdshxrv4ws3H/5DRI5NYHrRRLimi4OElyt/PSkJ55UzIFZkUPtNxWrXkXKfTmVrAexwnmJykqrUGokxeJmQIDAQABMA0GCSqGSIb3DQEBDQUAA4IBAQAIStph3FYRJ5LM1uSfbipmv3FzCxKyd6Q1FJa5g6gfQ7gMoxTzZK8/Lm0wRVdWQEACrjj96LHK6V00yW44hpTdNPd4CW1Nn02/6Giv0vz3BbqXO9t5IhcGbYVslvVrZKwasbIEh4w+YMbhnHq+pTCO/sKxI7R4iqeFf83xjuF/yuoTB9gDSTGyMxsEhwTuDa2L6bnevkwnUME9EwftvwWdirrsJQLWzAf0nYqWr3vueqalODx36agvDbu3T1wFwZo0rmOShvTjqN8eVrgCWInXCWakqf6imEct3O32qBvrozrXb/UhrL57LeYb5UoWwldlWICeQgRXQoKARF6YDO/I',
                ),
            1 =>
                array (
                    'encryption' => true,
                    'signing' => false,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIIDXzCCAkcCBgFY+oB3pjANBgkqhkiG9w0BAQ0FADBzMQswCQYDVQQGEwJVUzELMAkGA1UECBMCT1IxETAPBgNVBAcTCFBvcnRsYW5kMRYwFAYDVQQKEw1KaXZlIFNvZnR3YXJlMRQwEgYDVQQLEwtFbmdpbmVlcmluZzEWMBQGA1UEAxMNSml2ZSBTb2Z0d2FyZTAeFw0xNjEyMTMyMzI0MzdaFw00NjEyMTQwNTQ3MzZaMHMxCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJPUjERMA8GA1UEBxMIUG9ydGxhbmQxFjAUBgNVBAoTDUppdmUgU29mdHdhcmUxFDASBgNVBAsTC0VuZ2luZWVyaW5nMRYwFAYDVQQDEw1KaXZlIFNvZnR3YXJlMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAnBYePu22LqsfPd+esgvoG+5yuK4BPG1wIo/bxXbHX95NShe4BRiMHExf5THostlwZOZ+Oke7WXi0Lp0xIaOGyzNkS00aQQbdKof56REc0TiTMvhHkLbUrWEibXkUE3wZuygSZCBG1SLTLKjtlF/LxEFCltZ2ykfd64ubb/H+Fw15DcYyzKYxaVKtDdlI5M0uKL2mBTr41zqt1QicyffUUFAXRjXhllHZ1d7Xvj6WssSbu33KaBasPal/bU6ElEVJjSmEdshxrv4ws3H/5DRI5NYHrRRLimi4OElyt/PSkJ55UzIFZkUPtNxWrXkXKfTmVrAexwnmJykqrUGokxeJmQIDAQABMA0GCSqGSIb3DQEBDQUAA4IBAQAIStph3FYRJ5LM1uSfbipmv3FzCxKyd6Q1FJa5g6gfQ7gMoxTzZK8/Lm0wRVdWQEACrjj96LHK6V00yW44hpTdNPd4CW1Nn02/6Giv0vz3BbqXO9t5IhcGbYVslvVrZKwasbIEh4w+YMbhnHq+pTCO/sKxI7R4iqeFf83xjuF/yuoTB9gDSTGyMxsEhwTuDa2L6bnevkwnUME9EwftvwWdirrsJQLWzAf0nYqWr3vueqalODx36agvDbu3T1wFwZo0rmOShvTjqN8eVrgCWInXCWakqf6imEct3O32qBvrozrXb/UhrL57LeYb5UoWwldlWICeQgRXQoKARF6YDO/I',
                ),
        ),
    'validate.authnrequest' => false,
    'saml20.sign.assertion' => true,
    'simplesaml.nameidattribute' => 'User.Email',
);

// cypress.com extranet staging sso metadata.
$metadata['http://cypressextstg.prod.acquia-sites.com'] = array (
    'SingleLogoutService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                    'Location' => 'http://cypressextstg.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
            1 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
                    'Location' => 'http://cypressextstg.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
        ),
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'index' => 0,
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'http://cypressextstg.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                ),
            1 =>
                array (
                    'index' => 1,
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
                    'Location' => 'http://cypressextstg.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
                ),
            2 =>
                array (
                    'index' => 2,
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
                    'Location' => 'http://cypressextstg.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                ),
            3 =>
                array (
                    'index' => 3,
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
                    'Location' => 'http://cypressextstg.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
                ),
        ),
    'contacts' =>
        array (
            0 =>
                array (
                    'emailAddress' => 'webmaster@cypress.com',
                    'contactType' => 'technical',
                    'givenName' => 'Cypress',
                    'surName' => 'Webmaster',
                ),
        ),
    'certData' => 'MIID+zCCAuOgAwIBAgIJAL3PQLjyUcjmMA0GCSqGSIb3DQEBCwUAMIGTMQswCQYDVQQGEwJJTjESMBAGA1UECAwJS2FybmF0YWthMRIwEAYDVQQHDAlCYW5nYWxvcmUxEzARBgNVBAoMClZhbHVlYm91bmQxEjAQBgNVBAsMCXRlY2huaWNhbDEPMA0GA1UEAwwGc291bXlhMSIwIAYJKoZIhvcNAQkBFhNydmFyaWFyMTBAZ21haWwuY29tMB4XDTE2MTEwODEyNDgwOVoXDTI2MTEwODEyNDgwOVowgZMxCzAJBgNVBAYTAklOMRIwEAYDVQQIDAlLYXJuYXRha2ExEjAQBgNVBAcMCUJhbmdhbG9yZTETMBEGA1UECgwKVmFsdWVib3VuZDESMBAGA1UECwwJdGVjaG5pY2FsMQ8wDQYDVQQDDAZzb3VteWExIjAgBgkqhkiG9w0BCQEWE3J2YXJpYXIxMEBnbWFpbC5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC63DAHRVCZPALlzceYdela48SHYj0arPzQ1f/v0OFJ35QSGUR3eC/FmH1+R91/JhGYzwp3kCms/TfXG5UHEj1AWb0sOfISm92aWPvT8zczLKCynz0tXx/F+/hsH0rAS8NqPXhtuKUNS6yRlvLb7LT2l2X8edtYiwSozfMZ0xgV4slCIUlnyZh1csDLbZvb99IDqcM42xG2PcvSZqNG/VUCFhjZ2S0Fo+GRNfZvPxIjo0WoIG4M8ZBzpuoiCrVVKpgbpNLtuDRFnINLR735ygJZU5hV0t7MypH3ldFrFQH9JJSTvFXpaEgDTTfIDI7r3KubSXM/gZZRslMazGpJrg63AgMBAAGjUDBOMB0GA1UdDgQWBBSLlBeHf0VWVKdNbuP2RunYjQTnaTAfBgNVHSMEGDAWgBSLlBeHf0VWVKdNbuP2RunYjQTnaTAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBAQAcmJjx7sKumgxCLcSS87Sc2WxRaMmFATRRrlDokpbx2ME4Mfg3KKdyOGWIdaXrdfbt3Dr0EHk34UrSnH8LoSJvWf91JDh3S4xYtcO46a3Cx0etzgdxj2JiGqURQJajUCCDfdnnwb657Hs58cKd450e/98Lo4ipaH7/GozpJnMo7YU78TsmS7ZNqpogg3lmDljXeThb/v+LBUwYuXxt84jSK4SuE1dwQn2rWdVHiCmkt5D1yK2A/bdvfXsVSoLasvSaE39hxGv2bV6khprLKsebEhDvpo+uw66um3bi7xbTE8iCZGjgCj3BfSQZKXBFglqPY0TwFxnFe9hyhQ3Hq+O6',
    'redirect.validate' => true,
);

// extranet.cypress.com metadata SSO.
$metadata['https://extranet.cypress.com'] = array (
    'SingleLogoutService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                    'Location' => 'https://extranet.cypress.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
            1 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
                    'Location' => 'https://extranet.cypress.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
        ),
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'index' => 0,
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'https://extranet.cypress.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                ),
            1 =>
                array (
                    'index' => 1,
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
                    'Location' => 'https://extranet.cypress.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
                ),
            2 =>
                array (
                    'index' => 2,
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
                    'Location' => 'https://extranet.cypress.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                ),
            3 =>
                array (
                    'index' => 3,
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
                    'Location' => 'https://extranet.cypress.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
                ),
        ),
    'contacts' =>
        array (
            0 =>
                array (
                    'emailAddress' => 'webmaster@cypress.com',
                    'contactType' => 'technical',
                    'givenName' => 'Cypress',
                    'surName' => 'Webmaster',
                ),
        ),
    'certData' => 'MIID+zCCAuOgAwIBAgIJAL3PQLjyUcjmMA0GCSqGSIb3DQEBCwUAMIGTMQswCQYDVQQGEwJJTjESMBAGA1UECAwJS2FybmF0YWthMRIwEAYDVQQHDAlCYW5nYWxvcmUxEzARBgNVBAoMClZhbHVlYm91bmQxEjAQBgNVBAsMCXRlY2huaWNhbDEPMA0GA1UEAwwGc291bXlhMSIwIAYJKoZIhvcNAQkBFhNydmFyaWFyMTBAZ21haWwuY29tMB4XDTE2MTEwODEyNDgwOVoXDTI2MTEwODEyNDgwOVowgZMxCzAJBgNVBAYTAklOMRIwEAYDVQQIDAlLYXJuYXRha2ExEjAQBgNVBAcMCUJhbmdhbG9yZTETMBEGA1UECgwKVmFsdWVib3VuZDESMBAGA1UECwwJdGVjaG5pY2FsMQ8wDQYDVQQDDAZzb3VteWExIjAgBgkqhkiG9w0BCQEWE3J2YXJpYXIxMEBnbWFpbC5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC63DAHRVCZPALlzceYdela48SHYj0arPzQ1f/v0OFJ35QSGUR3eC/FmH1+R91/JhGYzwp3kCms/TfXG5UHEj1AWb0sOfISm92aWPvT8zczLKCynz0tXx/F+/hsH0rAS8NqPXhtuKUNS6yRlvLb7LT2l2X8edtYiwSozfMZ0xgV4slCIUlnyZh1csDLbZvb99IDqcM42xG2PcvSZqNG/VUCFhjZ2S0Fo+GRNfZvPxIjo0WoIG4M8ZBzpuoiCrVVKpgbpNLtuDRFnINLR735ygJZU5hV0t7MypH3ldFrFQH9JJSTvFXpaEgDTTfIDI7r3KubSXM/gZZRslMazGpJrg63AgMBAAGjUDBOMB0GA1UdDgQWBBSLlBeHf0VWVKdNbuP2RunYjQTnaTAfBgNVHSMEGDAWgBSLlBeHf0VWVKdNbuP2RunYjQTnaTAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBAQAcmJjx7sKumgxCLcSS87Sc2WxRaMmFATRRrlDokpbx2ME4Mfg3KKdyOGWIdaXrdfbt3Dr0EHk34UrSnH8LoSJvWf91JDh3S4xYtcO46a3Cx0etzgdxj2JiGqURQJajUCCDfdnnwb657Hs58cKd450e/98Lo4ipaH7/GozpJnMo7YU78TsmS7ZNqpogg3lmDljXeThb/v+LBUwYuXxt84jSK4SuE1dwQn2rWdVHiCmkt5D1yK2A/bdvfXsVSoLasvSaE39hxGv2bV6khprLKsebEhDvpo+uw66um3bi7xbTE8iCZGjgCj3BfSQZKXBFglqPY0TwFxnFe9hyhQ3Hq+O6',
    'redirect.validate' => true,
);

// Store dev SP metadata.
$metadata['http://cypressextdev2.prod.acquia-sites.com'] = array (
    'SingleLogoutService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                    'Location' => 'http://cypressextdev2.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
            1 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
                    'Location' => 'http://cypressextdev2.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
        ),
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'index' => 0,
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'http://cypressextdev2.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                ),
            1 =>
                array (
                    'index' => 1,
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
                    'Location' => 'http://cypressextdev2.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
                ),
            2 =>
                array (
                    'index' => 2,
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
                    'Location' => 'http://cypressextdev2.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                ),
            3 =>
                array (
                    'index' => 3,
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
                    'Location' => 'http://cypressextdev2.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
                ),
        ),
    'contacts' =>
        array (
            0 =>
                array (
                    'emailAddress' => 'webmaster@cypress.com',
                    'contactType' => 'technical',
                    'givenName' => 'Cypress',
                    'surName' => 'Webmaster',
                ),
        ),
    'certData' => 'MIID+zCCAuOgAwIBAgIJAL3PQLjyUcjmMA0GCSqGSIb3DQEBCwUAMIGTMQswCQYDVQQGEwJJTjESMBAGA1UECAwJS2FybmF0YWthMRIwEAYDVQQHDAlCYW5nYWxvcmUxEzARBgNVBAoMClZhbHVlYm91bmQxEjAQBgNVBAsMCXRlY2huaWNhbDEPMA0GA1UEAwwGc291bXlhMSIwIAYJKoZIhvcNAQkBFhNydmFyaWFyMTBAZ21haWwuY29tMB4XDTE2MTEwODEyNDgwOVoXDTI2MTEwODEyNDgwOVowgZMxCzAJBgNVBAYTAklOMRIwEAYDVQQIDAlLYXJuYXRha2ExEjAQBgNVBAcMCUJhbmdhbG9yZTETMBEGA1UECgwKVmFsdWVib3VuZDESMBAGA1UECwwJdGVjaG5pY2FsMQ8wDQYDVQQDDAZzb3VteWExIjAgBgkqhkiG9w0BCQEWE3J2YXJpYXIxMEBnbWFpbC5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC63DAHRVCZPALlzceYdela48SHYj0arPzQ1f/v0OFJ35QSGUR3eC/FmH1+R91/JhGYzwp3kCms/TfXG5UHEj1AWb0sOfISm92aWPvT8zczLKCynz0tXx/F+/hsH0rAS8NqPXhtuKUNS6yRlvLb7LT2l2X8edtYiwSozfMZ0xgV4slCIUlnyZh1csDLbZvb99IDqcM42xG2PcvSZqNG/VUCFhjZ2S0Fo+GRNfZvPxIjo0WoIG4M8ZBzpuoiCrVVKpgbpNLtuDRFnINLR735ygJZU5hV0t7MypH3ldFrFQH9JJSTvFXpaEgDTTfIDI7r3KubSXM/gZZRslMazGpJrg63AgMBAAGjUDBOMB0GA1UdDgQWBBSLlBeHf0VWVKdNbuP2RunYjQTnaTAfBgNVHSMEGDAWgBSLlBeHf0VWVKdNbuP2RunYjQTnaTAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBAQAcmJjx7sKumgxCLcSS87Sc2WxRaMmFATRRrlDokpbx2ME4Mfg3KKdyOGWIdaXrdfbt3Dr0EHk34UrSnH8LoSJvWf91JDh3S4xYtcO46a3Cx0etzgdxj2JiGqURQJajUCCDfdnnwb657Hs58cKd450e/98Lo4ipaH7/GozpJnMo7YU78TsmS7ZNqpogg3lmDljXeThb/v+LBUwYuXxt84jSK4SuE1dwQn2rWdVHiCmkt5D1yK2A/bdvfXsVSoLasvSaE39hxGv2bV6khprLKsebEhDvpo+uw66um3bi7xbTE8iCZGjgCj3BfSQZKXBFglqPY0TwFxnFe9hyhQ3Hq+O6',
    'redirect.validate' => true,
);

// Store stg2 SP SSO.
$metadata['http://cypressextstg2.prod.acquia-sites.com'] = array (
    'SingleLogoutService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                    'Location' => 'http://cypressextstg2.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
            1 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
                    'Location' => 'http://cypressextstg2.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
        ),
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'index' => 0,
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'http://cypressextstg2.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                ),
            1 =>
                array (
                    'index' => 1,
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
                    'Location' => 'http://cypressextstg2.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
                ),
            2 =>
                array (
                    'index' => 2,
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
                    'Location' => 'http://cypressextstg2.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                ),
            3 =>
                array (
                    'index' => 3,
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
                    'Location' => 'http://cypressextstg2.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
                ),
        ),
    'contacts' =>
        array (
            0 =>
                array (
                    'emailAddress' => 'webmaster@cypress.com',
                    'contactType' => 'technical',
                    'givenName' => 'Cypress',
                    'surName' => 'Webmaster',
                ),
        ),
    'certData' => 'MIID+zCCAuOgAwIBAgIJAL3PQLjyUcjmMA0GCSqGSIb3DQEBCwUAMIGTMQswCQYDVQQGEwJJTjESMBAGA1UECAwJS2FybmF0YWthMRIwEAYDVQQHDAlCYW5nYWxvcmUxEzARBgNVBAoMClZhbHVlYm91bmQxEjAQBgNVBAsMCXRlY2huaWNhbDEPMA0GA1UEAwwGc291bXlhMSIwIAYJKoZIhvcNAQkBFhNydmFyaWFyMTBAZ21haWwuY29tMB4XDTE2MTEwODEyNDgwOVoXDTI2MTEwODEyNDgwOVowgZMxCzAJBgNVBAYTAklOMRIwEAYDVQQIDAlLYXJuYXRha2ExEjAQBgNVBAcMCUJhbmdhbG9yZTETMBEGA1UECgwKVmFsdWVib3VuZDESMBAGA1UECwwJdGVjaG5pY2FsMQ8wDQYDVQQDDAZzb3VteWExIjAgBgkqhkiG9w0BCQEWE3J2YXJpYXIxMEBnbWFpbC5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC63DAHRVCZPALlzceYdela48SHYj0arPzQ1f/v0OFJ35QSGUR3eC/FmH1+R91/JhGYzwp3kCms/TfXG5UHEj1AWb0sOfISm92aWPvT8zczLKCynz0tXx/F+/hsH0rAS8NqPXhtuKUNS6yRlvLb7LT2l2X8edtYiwSozfMZ0xgV4slCIUlnyZh1csDLbZvb99IDqcM42xG2PcvSZqNG/VUCFhjZ2S0Fo+GRNfZvPxIjo0WoIG4M8ZBzpuoiCrVVKpgbpNLtuDRFnINLR735ygJZU5hV0t7MypH3ldFrFQH9JJSTvFXpaEgDTTfIDI7r3KubSXM/gZZRslMazGpJrg63AgMBAAGjUDBOMB0GA1UdDgQWBBSLlBeHf0VWVKdNbuP2RunYjQTnaTAfBgNVHSMEGDAWgBSLlBeHf0VWVKdNbuP2RunYjQTnaTAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBAQAcmJjx7sKumgxCLcSS87Sc2WxRaMmFATRRrlDokpbx2ME4Mfg3KKdyOGWIdaXrdfbt3Dr0EHk34UrSnH8LoSJvWf91JDh3S4xYtcO46a3Cx0etzgdxj2JiGqURQJajUCCDfdnnwb657Hs58cKd450e/98Lo4ipaH7/GozpJnMo7YU78TsmS7ZNqpogg3lmDljXeThb/v+LBUwYuXxt84jSK4SuE1dwQn2rWdVHiCmkt5D1yK2A/bdvfXsVSoLasvSaE39hxGv2bV6khprLKsebEhDvpo+uw66um3bi7xbTE8iCZGjgCj3BfSQZKXBFglqPY0TwFxnFe9hyhQ3Hq+O6',
    'redirect.validate' => true,
);

// Store Dev  metadata.
$metadata['http://cypressstoredev.prod.acquia-sites.com'] = array (
    'contacts' =>
        array (
            0 =>
                array (
                    'contactType' => 'technical',
                    'givenName' => 'Cypress',
                    'surName' => 'Webmaster',
                    'emailAddress' =>
                        array (
                            0 => 'webmaster@cypress.com',
                        ),
                ),
        ),
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'http://cypressstoredev.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                    'index' => 0,
                ),
            1 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
                    'Location' => 'http://cypressstoredev.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
                    'index' => 1,
                ),
            2 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
                    'Location' => 'http://cypressstoredev.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                    'index' => 2,
                ),
            3 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
                    'Location' => 'http://cypressstoredev.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
                    'index' => 3,
                ),
        ),
    'SingleLogoutService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                    'Location' => 'http://cypressstoredev.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
            1 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
                    'Location' => 'http://cypressstoredev.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
        ),
    'keys' =>
        array (
            0 =>
                array (
                    'encryption' => false,
                    'signing' => true,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIID+zCCAuOgAwIBAgIJAL3PQLjyUcjmMA0GCSqGSIb3DQEBCwUAMIGTMQswCQYDVQQGEwJJTjESMBAGA1UECAwJS2FybmF0YWthMRIwEAYDVQQHDAlCYW5nYWxvcmUxEzARBgNVBAoMClZhbHVlYm91bmQxEjAQBgNVBAsMCXRlY2huaWNhbDEPMA0GA1UEAwwGc291bXlhMSIwIAYJKoZIhvcNAQkBFhNydmFyaWFyMTBAZ21haWwuY29tMB4XDTE2MTEwODEyNDgwOVoXDTI2MTEwODEyNDgwOVowgZMxCzAJBgNVBAYTAklOMRIwEAYDVQQIDAlLYXJuYXRha2ExEjAQBgNVBAcMCUJhbmdhbG9yZTETMBEGA1UECgwKVmFsdWVib3VuZDESMBAGA1UECwwJdGVjaG5pY2FsMQ8wDQYDVQQDDAZzb3VteWExIjAgBgkqhkiG9w0BCQEWE3J2YXJpYXIxMEBnbWFpbC5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC63DAHRVCZPALlzceYdela48SHYj0arPzQ1f/v0OFJ35QSGUR3eC/FmH1+R91/JhGYzwp3kCms/TfXG5UHEj1AWb0sOfISm92aWPvT8zczLKCynz0tXx/F+/hsH0rAS8NqPXhtuKUNS6yRlvLb7LT2l2X8edtYiwSozfMZ0xgV4slCIUlnyZh1csDLbZvb99IDqcM42xG2PcvSZqNG/VUCFhjZ2S0Fo+GRNfZvPxIjo0WoIG4M8ZBzpuoiCrVVKpgbpNLtuDRFnINLR735ygJZU5hV0t7MypH3ldFrFQH9JJSTvFXpaEgDTTfIDI7r3KubSXM/gZZRslMazGpJrg63AgMBAAGjUDBOMB0GA1UdDgQWBBSLlBeHf0VWVKdNbuP2RunYjQTnaTAfBgNVHSMEGDAWgBSLlBeHf0VWVKdNbuP2RunYjQTnaTAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBAQAcmJjx7sKumgxCLcSS87Sc2WxRaMmFATRRrlDokpbx2ME4Mfg3KKdyOGWIdaXrdfbt3Dr0EHk34UrSnH8LoSJvWf91JDh3S4xYtcO46a3Cx0etzgdxj2JiGqURQJajUCCDfdnnwb657Hs58cKd450e/98Lo4ipaH7/GozpJnMo7YU78TsmS7ZNqpogg3lmDljXeThb/v+LBUwYuXxt84jSK4SuE1dwQn2rWdVHiCmkt5D1yK2A/bdvfXsVSoLasvSaE39hxGv2bV6khprLKsebEhDvpo+uw66um3bi7xbTE8iCZGjgCj3BfSQZKXBFglqPY0TwFxnFe9hyhQ3Hq+O6',
                ),
        ),
    'validate.authnrequest' => true,
);

// Store stg metadata.
$metadata['http://cypressstorestg.prod.acquia-sites.com'] = array (
    'contacts' =>
        array (
            0 =>
                array (
                    'contactType' => 'technical',
                    'givenName' => 'Cypress',
                    'surName' => 'Webmaster',
                    'emailAddress' =>
                        array (
                            0 => 'webmaster@cypress.com',
                        ),
                ),
        ),
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'http://cypressstorestg.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                    'index' => 0,
                ),
            1 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
                    'Location' => 'http://cypressstorestg.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
                    'index' => 1,
                ),
            2 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
                    'Location' => 'http://cypressstorestg.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                    'index' => 2,
                ),
            3 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
                    'Location' => 'http://cypressstorestg.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
                    'index' => 3,
                ),
        ),
    'SingleLogoutService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                    'Location' => 'http://cypressstorestg.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
            1 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
                    'Location' => 'http://cypressstorestg.prod.acquia-sites.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
        ),
    'keys' =>
        array (
            0 =>
                array (
                    'encryption' => false,
                    'signing' => true,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIID+zCCAuOgAwIBAgIJAL3PQLjyUcjmMA0GCSqGSIb3DQEBCwUAMIGTMQswCQYDVQQGEwJJTjESMBAGA1UECAwJS2FybmF0YWthMRIwEAYDVQQHDAlCYW5nYWxvcmUxEzARBgNVBAoMClZhbHVlYm91bmQxEjAQBgNVBAsMCXRlY2huaWNhbDEPMA0GA1UEAwwGc291bXlhMSIwIAYJKoZIhvcNAQkBFhNydmFyaWFyMTBAZ21haWwuY29tMB4XDTE2MTEwODEyNDgwOVoXDTI2MTEwODEyNDgwOVowgZMxCzAJBgNVBAYTAklOMRIwEAYDVQQIDAlLYXJuYXRha2ExEjAQBgNVBAcMCUJhbmdhbG9yZTETMBEGA1UECgwKVmFsdWVib3VuZDESMBAGA1UECwwJdGVjaG5pY2FsMQ8wDQYDVQQDDAZzb3VteWExIjAgBgkqhkiG9w0BCQEWE3J2YXJpYXIxMEBnbWFpbC5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC63DAHRVCZPALlzceYdela48SHYj0arPzQ1f/v0OFJ35QSGUR3eC/FmH1+R91/JhGYzwp3kCms/TfXG5UHEj1AWb0sOfISm92aWPvT8zczLKCynz0tXx/F+/hsH0rAS8NqPXhtuKUNS6yRlvLb7LT2l2X8edtYiwSozfMZ0xgV4slCIUlnyZh1csDLbZvb99IDqcM42xG2PcvSZqNG/VUCFhjZ2S0Fo+GRNfZvPxIjo0WoIG4M8ZBzpuoiCrVVKpgbpNLtuDRFnINLR735ygJZU5hV0t7MypH3ldFrFQH9JJSTvFXpaEgDTTfIDI7r3KubSXM/gZZRslMazGpJrg63AgMBAAGjUDBOMB0GA1UdDgQWBBSLlBeHf0VWVKdNbuP2RunYjQTnaTAfBgNVHSMEGDAWgBSLlBeHf0VWVKdNbuP2RunYjQTnaTAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBAQAcmJjx7sKumgxCLcSS87Sc2WxRaMmFATRRrlDokpbx2ME4Mfg3KKdyOGWIdaXrdfbt3Dr0EHk34UrSnH8LoSJvWf91JDh3S4xYtcO46a3Cx0etzgdxj2JiGqURQJajUCCDfdnnwb657Hs58cKd450e/98Lo4ipaH7/GozpJnMo7YU78TsmS7ZNqpogg3lmDljXeThb/v+LBUwYuXxt84jSK4SuE1dwQn2rWdVHiCmkt5D1yK2A/bdvfXsVSoLasvSaE39hxGv2bV6khprLKsebEhDvpo+uw66um3bi7xbTE8iCZGjgCj3BfSQZKXBFglqPY0TwFxnFe9hyhQ3Hq+O6',
                ),
        ),
    'validate.authnrequest' => true,
);

// D8 Store metadata.
$metadata['https://secure.cypress.com'] = array (
    'contacts' =>
        array (
            0 =>
                array (
                    'contactType' => 'technical',
                    'givenName' => 'Cypress',
                    'surName' => 'Webmaster',
                    'emailAddress' =>
                        array (
                            0 => 'webmaster@cypress.com',
                        ),
                ),
        ),
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'https://secure.cypress.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                    'index' => 0,
                ),
            1 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
                    'Location' => 'https://secure.cypress.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
                    'index' => 1,
                ),
            2 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
                    'Location' => 'https://secure.cypress.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
                    'index' => 2,
                ),
            3 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
                    'Location' => 'https://secure.cypress.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
                    'index' => 3,
                ),
        ),
    'SingleLogoutService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
                    'Location' => 'https://secure.cypress.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
            1 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
                    'Location' => 'https://secure.cypress.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
                ),
        ),
    'keys' =>
        array (
            0 =>
                array (
                    'encryption' => false,
                    'signing' => true,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIID+zCCAuOgAwIBAgIJAL3PQLjyUcjmMA0GCSqGSIb3DQEBCwUAMIGTMQswCQYDVQQGEwJJTjESMBAGA1UECAwJS2FybmF0YWthMRIwEAYDVQQHDAlCYW5nYWxvcmUxEzARBgNVBAoMClZhbHVlYm91bmQxEjAQBgNVBAsMCXRlY2huaWNhbDEPMA0GA1UEAwwGc291bXlhMSIwIAYJKoZIhvcNAQkBFhNydmFyaWFyMTBAZ21haWwuY29tMB4XDTE2MTEwODEyNDgwOVoXDTI2MTEwODEyNDgwOVowgZMxCzAJBgNVBAYTAklOMRIwEAYDVQQIDAlLYXJuYXRha2ExEjAQBgNVBAcMCUJhbmdhbG9yZTETMBEGA1UECgwKVmFsdWVib3VuZDESMBAGA1UECwwJdGVjaG5pY2FsMQ8wDQYDVQQDDAZzb3VteWExIjAgBgkqhkiG9w0BCQEWE3J2YXJpYXIxMEBnbWFpbC5jb20wggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQC63DAHRVCZPALlzceYdela48SHYj0arPzQ1f/v0OFJ35QSGUR3eC/FmH1+R91/JhGYzwp3kCms/TfXG5UHEj1AWb0sOfISm92aWPvT8zczLKCynz0tXx/F+/hsH0rAS8NqPXhtuKUNS6yRlvLb7LT2l2X8edtYiwSozfMZ0xgV4slCIUlnyZh1csDLbZvb99IDqcM42xG2PcvSZqNG/VUCFhjZ2S0Fo+GRNfZvPxIjo0WoIG4M8ZBzpuoiCrVVKpgbpNLtuDRFnINLR735ygJZU5hV0t7MypH3ldFrFQH9JJSTvFXpaEgDTTfIDI7r3KubSXM/gZZRslMazGpJrg63AgMBAAGjUDBOMB0GA1UdDgQWBBSLlBeHf0VWVKdNbuP2RunYjQTnaTAfBgNVHSMEGDAWgBSLlBeHf0VWVKdNbuP2RunYjQTnaTAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBAQAcmJjx7sKumgxCLcSS87Sc2WxRaMmFATRRrlDokpbx2ME4Mfg3KKdyOGWIdaXrdfbt3Dr0EHk34UrSnH8LoSJvWf91JDh3S4xYtcO46a3Cx0etzgdxj2JiGqURQJajUCCDfdnnwb657Hs58cKd450e/98Lo4ipaH7/GozpJnMo7YU78TsmS7ZNqpogg3lmDljXeThb/v+LBUwYuXxt84jSK4SuE1dwQn2rWdVHiCmkt5D1yK2A/bdvfXsVSoLasvSaE39hxGv2bV6khprLKsebEhDvpo+uw66um3bi7xbTE8iCZGjgCj3BfSQZKXBFglqPY0TwFxnFe9hyhQ3Hq+O6',
                ),
        ),
    'validate.authnrequest' => true,
);

// sbsati
$metadata['https://sbsati-cypress.cs19.force.com/customer'] = array (
    'entityid' => 'https://sbsati-cypress.cs19.force.com/customer',
    'contacts' =>
        array (
        ),
    'metadata-set' => 'saml20-sp-remote',
    'expire' => 1837416412,
    'AssertionConsumerService' =>
        array (
            0 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'https://test.salesforce.com?so=00D290000008n36',
                    'index' => 0,
                    'isDefault' => true,
                ),
            1 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'https://sbsati-cypress.cs19.force.com/customer/login?so=00D290000008n36',
                    'index' => 1,
                ),
            2 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'https://sbsati-cypress.cs19.force.com/partner/login?so=00D290000008n36',
                    'index' => 2,
                ),
            3 =>
                array (
                    'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
                    'Location' => 'https://sbsati-cypress.cs19.force.com/employee/login?so=00D290000008n36',
                    'index' => 3,
                ),
        ),
    'SingleLogoutService' =>
        array (
        ),
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
    'keys' =>
        array (
            0 =>
                array (
                    'encryption' => false,
                    'signing' => true,
                    'type' => 'X509Certificate',
                    'X509Certificate' => 'MIIEkDCCA3igAwIBAgIOAV2fGArIAAAAABQP/xcwDQYJKoZIhvcNAQELBQAwgYcx
HzAdBgNVBAMMFkN5cHJlc3NfU2luZ2xlX1NpZ25fb24xGDAWBgNVBAsMDzAwRDFh
MDAwMDAwWU11VzEXMBUGA1UECgwOU2FsZXNmb3JjZS5jb20xFjAUBgNVBAcMDVNh
biBGcmFuY2lzY28xCzAJBgNVBAgMAkNBMQwwCgYDVQQGEwNVU0EwHhcNMTcwODAx
MTgzODU5WhcNMTgwODAxMTIwMDAwWjCBhzEfMB0GA1UEAwwWQ3lwcmVzc19TaW5n
bGVfU2lnbl9vbjEYMBYGA1UECwwPMDBEMWEwMDAwMDBZTXVXMRcwFQYDVQQKDA5T
YWxlc2ZvcmNlLmNvbTEWMBQGA1UEBwwNU2FuIEZyYW5jaXNjbzELMAkGA1UECAwC
Q0ExDDAKBgNVBAYTA1VTQTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEB
AI/4IFwnr2SrOtJgSxQblEM25wVgGzEJopGHACPo2mfjFQRBNUawu880BXo0o3DX
SByqMCKIRsdqp1xMTn1z/Oc/Mn4Lue15Tbk6CXBt6gIRLURVr//pGb9DMk3DAsY+
IGLwCjz2R6PCq3q/D+YWhzphBlubStzN8LOTHw3PbHifiBx01yLFDbYAQabXnXVQ
1+WCukdzZtnLSvLlpc2x+zLtevUo2udn1NuOVj7htwVKdf/19jk14OdBdrU9LL6I
oeWsilUqNg6C1wwBeFxQ6FM22dhhFn/4l5hVMGPBPq4fPJ73vhrNV8e9kCGpJbr4
X+e8SoUPEuTv9ZYCLRPW2rMCAwEAAaOB9zCB9DAdBgNVHQ4EFgQUMwpB0kmHDdQd
389Ewk01P01EcqYwDwYDVR0TAQH/BAUwAwEB/zCBwQYDVR0jBIG5MIG2gBQzCkHS
SYcN1B3fz0TCTTU/TURypqGBjaSBijCBhzEfMB0GA1UEAwwWQ3lwcmVzc19TaW5n
bGVfU2lnbl9vbjEYMBYGA1UECwwPMDBEMWEwMDAwMDBZTXVXMRcwFQYDVQQKDA5T
YWxlc2ZvcmNlLmNvbTEWMBQGA1UEBwwNU2FuIEZyYW5jaXNjbzELMAkGA1UECAwC
Q0ExDDAKBgNVBAYTA1VTQYIOAV2fGArIAAAAABQP/xcwDQYJKoZIhvcNAQELBQAD
ggEBACn581Sxg/OSEqqe60/vsHB+PQAl2WXlV4TjXTz7VcDFKCfjJSMC+LW3aNWA
KbNYwPSQmyVHvVZmNQ0H1fOUNIDdRCejExogQoHZjzI6WHJy0omi1HyPpGODeqk4
GC7f5YO1Q/LAyWxNbEeY6GYOkUTh7zgtsS/4KoGpVrxGlqyMkNYJARLMDxwbEGo2
mxj0hf0y4D9jT7AG3duiDU2H5zDA7Unfs5iq/bntC3/mr4Eh3E33T/xYYUpXVF6Y
gaA2zEIGQ9AiOJP1JQ/CobpipNMrh7/e/9M7djLd35opDyMsvBg1D1sWKW3SXg9X
aJyXTrZN4r3YhovTarmiih199ZM=',
                ),
        ),
    'validate.authnrequest' => true,
    'saml20.sign.assertion' => true,
    'simplesaml.nameidattribute' => 'User.Email',
);

