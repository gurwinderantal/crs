# CRS PHP Connector
This package provides methods to connect to SynXis and Windsurfer central reservation systems (CRS) by means of a SOAP
API. It is currently under development and not ready for use just yet.

## Getting Started

### Prerequisites
This package uses PHP's SOAP extension to connect to SOAP APIs. Please ensure that you have the PHP SOAP extension
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

Build an array with all the credentials provided by your CRS provider. Add your API username, password and the SOAP
body's `<POS>` element attributes. For example:
```
$credentials = [
    'username'   => 'MyUsername',
    'password'   => 'MyPassword',
    'Code'       => 'Channel code',
    'ID'         => 'Channel ID',
    'ID_Context' => 'ID source eg. IATA, Synxis, Open Hospitality',
];
```
The `username` and `password` keys *must* be present in your credential array, or else trying to instantiate a connector
class will throw an exception. Other keys are optional but may lead to incorrect results. Follow your CRS provider's
documentation carefully.

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
2. **checkAvailability**: Checks availability based on the parameters provided. A list of available parameters is given
below:
  * *hotelCode*: The CRS code that uniquely identifies a single hotel property.
  * *start*: Starting value of the time span.
  * *end*: Ending value of the time span.
  * *roomCount*: Number of rooms being requested.
  * *adultCount*: Number of adults.
  * *childCount*: Number of children.

Response objects in most cases will be returned as a single object containing attributes, arrays or references to other
objects. The response object will be structured as per the response XML of the corresponding SOAP request. For example,
to get the name of the hotel you requested availability for:
```
$hotelName = $response->RoomStays->RoomStay->BasicPropertyInfo->HotelName;
```
