<?php
try {
    // Define the Vertex SMB API WSDL URL
    $wsdlUrl = 'https://mgconnect.vertexsmb.com/vertex-ws/services/CalculateTax70?wsdl';

    // Create a SOAP client
    $client = new SoapClient($wsdlUrl, array('trace' => 1));

    // Define the request parameters
    $orderNumber = '123456';
    $orderDate = '2023-10-10';
    $items = array(
        array('ItemId' => '1', 'Quantity' => '2', 'UnitPrice' => '10.00'),
        // Add more items if needed
    );

    // Construct the request
    $request = array(
        'Order' => array(
            'OrderNumber' => $orderNumber,
            'OrderDate' => $orderDate,
            'Items' => array('Item' => $items)
        )
    );

    // Make the CalculateTax70 API call
    $response = $client->CalculateTax70($request);

    // Extract the tax information from the response
    $totalTax = $response->Tax->TotalTax;

    // Handle the total tax amount or other response data as needed
    echo "Total Tax: $totalTax";
} catch (SoapFault $e) {
    // Handle SOAP errors
    echo "SOAP Error: " . $e->getMessage();
} catch (Exception $e) {
    // Handle other exceptions
    echo "Error: " . $e->getMessage();
}
?>
