<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Listings</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .property-card 
        {
            margin-bottom: 30px;
        }
        .property-card img 
        {
            width: 100%;
            height: auto;
        }
        .property-details 
        {
            text-align: center;
        }
        .schedule-btn 
        {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">VILLA</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Properties</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Property Details</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
            </ul>
           <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="button">Schedule a Visit</button> -->
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">We Provide The Best Properties You Like</h2>
        <div class="row">
            <?php
            $properties = 
            [
                [
                    'Type' => 'Luxury Villa',
                    'Address' => '18 New Street, Miami, OR 97129',
                    'Price' => 'Rs. 2,264,000',
                    'Bedrooms' => 8,
                    'Bathrooms' => 8,
                    'Area' => '545m²',
                    'Floors' => 3,
                    'Parking' => '8 spots',
                    'image' => 'https://templatemo.com/templates/templatemo_591_villa_agency/assets/images/property-01.jpg'
                ],
                [
                    'Type' => 'Luxary Villa',
                    'Address' => '54 Mid Street Florida, OR 27001',
                    'Price' => 'Rs. 11,80,000',
                    'Bedrooms' => 6,
                    'Bathrooms' => 5,
                    'Area' => '450m²',
                    'Floors' => 3,
                    'Parking' => '8 spot',
                    'image' => 'https://templatemo.com/templates/templatemo_591_villa_agency/assets/images/property-02.jpg'
                ],
                [
                    'Type' => 'Luxary Villa',
                    'Address' => '26 Old Street Miami, OR 38540',
                    'Price' => 'Rs. 14,60,000',
                    'Bedrooms' => 5,
                    'Bathrooms' => 4,
                    'Area' => '225m²',
                    'Floors' => 3,
                    'Parking' => '10 spot',
                    'image' => 'https://templatemo.com/templates/templatemo_591_villa_agency/assets/images/property-03.jpg'
                ],
                [
                    'Type' => 'Apartment',
                    'Address' => '12 New Street Miami, OR 12650',
                    'Price' => 'Rs. 5,84,500',
                    'Bedrooms' => 4,
                    'Bathrooms' => 3,
                    'Area' => '125m²',
                    'Floors' => '25th',
                    'Parking' => '2 cars',
                    'image' => 'https://templatemo.com/templates/templatemo_591_villa_agency/assets/images/property-04.jpg'
                ],
                [
                    'Type' => 'PentHouse',
                    'Address' => '34 Beach Street Miami, OR 42680',
                    'Price' => 'Rs. 9,25,600',
                    'Bedrooms' => 4,
                    'Bathrooms' => 4,
                    'Area' => '180m²',
                    'Floors' => '38th',
                    'Parking' => '2 cars',
                    'image' => 'https://templatemo.com/templates/templatemo_591_villa_agency/assets/images/property-05.jpg'
                ],
                [
                    'Type' => 'Modern Condo',
                    'Address' => '22 New Street, Portland, OR 18540',
                    'Price' => 'Rs. 450,000',
                    'Bedrooms' => 2,
                    'Bathrooms' => 2,
                    'Area' => '120m²',
                    'Floors' => 1,
                    'Parking' => '1 spot',
                    'image' => 'https://templatemo.com/templates/templatemo_591_villa_agency/assets/images/property-06.jpg'
                ],
            ];

            foreach ($properties as $property) 
            {
                echo "
                <div class='col-md-4 property-card'>
                    <div class='card'>
                        <img src='{$property['image']}' class='card-img-top' alt='{$property['Type']}'>
                        <div class='card-body property-details'>
                            <h5 class='card-title'>{$property['Type']}</h5>
                            <p class='card-text'>{$property['Address']}<br>
                                Price: {$property['Price']}<br>
                                Bedrooms: {$property['Bedrooms']} | Bathrooms: {$property['Bathrooms']}<br>
                                Area: {$property['Area']} | Floors: {$property['Floors']}<br>
                                Parking: {$property['Parking']}
                            </p>
                            <button class='btn btn-primary schedule-btn' onclick=\"scheduleVisit('{$property['Type']}', 
                            '{$property['Address']}')\">Schedule a Visit</button>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</body>

<script>
    function scheduleVisit(propertyType, propertyAddress) 
    {
        alert(`You have Scheduled a Visit for: \n Type: ${propertyType} \n Address: ${propertyAddress}`);
    }
</script>
</html>


