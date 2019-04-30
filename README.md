# Gogo Print
A sinlge page web application that uses API services for Product configurations and pricing.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on local system


### Installing

```
1. Open Localhost Mysql Create an empty database name "gogoprint".
2. Import the database from the project main folder "gogoprint.sql".
3. Change the Connection credentials in the database.php file from the main folder GogoPrint\api\config\ 
4. Deploy the Project Folder to apachee server htdocs

```

## Running the tests

### Configure Product and Add to Cart
```
1. Visit the main Page
   localhost:port/GogoPrint/index.php
2. Configure the Product by selecting the options from the business cards section
3. Now Select the Price from the Pricing Table also considering the processing time from the table header.
4. Click the "Add to Cart" button on the bottom of the page to Add the Selected Configuration, processing time and price in the database
```
### View List of all Previous Orders
```
1. On the bottom of the page click on the button "List All Orders".
2. It will redirect you to a page where all the Previous orders with selected configurations, processing time and pricings will be visible.
NOTE: This is View is for Admin use
```



