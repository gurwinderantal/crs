# CRS PHP Connector
This package provides methods to connect to SynXis and Windsurfer central reservation systems (CRS) by means of a SOAP
API. It is currently under development and not ready for use just yet.

## Getting Started

### Prerequisites
This package depends on certain operators that are only available in **PHP 7.0 or later**.

It also uses PHP's SOAP extension to connect to SOAP APIs. Please ensure that you have the **PHP SOAP** extension
installed.

You can look for the SOAP extension in your phpinfo to see if it is already installed.
```
$ php -i | grep -i soap
```
If you don't see it, install it as follows (Ubuntu/Debian):
```
$ sudo apt-get install php-soap
```
A server restart may be required after installation.

### Installation
```
composer require gurwinderantal/crs
```
### Usage
This library is currently able to connect to SynXis and Windsurfer central reservation systems.

Build an array with all the credentials provided by your CRS provider. This will be used in the SOAP request header.
```
$credentials = [
    'username'   => 'MyUsername',
    'password'   => 'MyPassword',
];
```
The `username` and `password` keys *must* be present in your credential array, or else trying to instantiate a connector
class will throw an exception. Other keys (such as `systemId`) are optional but may lead to incorrect results. Follow
your CRS provider's documentation carefully.

Instantiate a connector class for the CRS you want:
```
$wsdl = 'https://example.path/to/Service.asmx?WSDL';
$synxis_connector = new SynxisConnector($wsdl, $credentials);
$windsurfer_connector = new WindsurferConnector($wsdl, $credentials);
```
Call the required method:
```
$response = $connector->getFunctions();
```
Available methods are:
1. **getFunctions**: Gets a list of available methods for the CRS service.
2. **checkAvailability**: Checks availability based on the parameters provided. All parameters must be put in a single
array. The array keys must match the SOAP request's XML request exactly. Refer to your service's WSDL for available
attributes. For example:
   ```
   $params = [
       'ID'           => 'xx',
       'ID_Context'   => 'Open Hospitality',
       'Code'         => 'xxxx',
       'RatePlanCode' => 'MYRATECODE',
       'HotelCode'    => 'MYHOTELCODE',
       'Start'        => '2018-06-03',
       'End'          => '2018-06-07',
       'Quantity'     => 1,
       'Count'        => [
           'Child' => 0,
           'Adult' => 2,
       ],
   ];
   ```
   If multiple elements with the same attributes are allowed (such as `count` in the above example), make it an array with
   different keys. A list of expected keys will be provided in the documentation once there is a stable release for this
   package.
3. **createReservation**
4. **modifyReservation**
5. **cancelReservation**

Response objects in most cases will be returned as a single object containing attributes, arrays or references to other
objects. The response object will be structured as per the response XML of the corresponding SOAP request. For example,
to get the name of the hotel you requested availability for:
```
$hotelName = $response->RoomStays->RoomStay->BasicPropertyInfo->HotelName;
```
