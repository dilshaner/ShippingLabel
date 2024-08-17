# WordPress Shipping Label Generator


- Version: 1.0
- Author: Dilshan Eranda
- Description

The Shipping Label Generator is a WordPress plugin designed to work with WooCommerce. It allows you to easily generate and print shipping labels for your WooCommerce orders. The labels include essential information such as the customer's name, address, order number, and more. This plugin simplifies the process of creating shipping labels directly from your WooCommerce orders page.
Features

> Shipping Label Generator කියන්නෙ සාමාන්‍ය WooCommerce store එකක් පවත්වාගෙන යන කෙනෙක්ට උදව්වක් වෙන්න හදපු WordPress plugin එකක්. මේකෙන් පුලුවන් ඔයාට WooCommerce store එක හරහා එන orders වලට අදාල Manualy shipping label එක ලියන්නෙ නැතුව automatically generate කරලා ගන්න. සම්පූර්ණයෙන් විස්තරයක් Blog එකේ දාලා තියනවා. එතනින් කියවලා බලලා කරගන්න.  **[Dilshaner.com/Blog](https://www.dilshaner.com "Dilshaner.com")**

[![Genarate Shipping label button](https://raw.githubusercontent.com/dilshaner/images/main/Screenshot%202024-08-17%20at%2021.15.29.png "Genarate Shipping label button")](htthttps://raw.githubusercontent.com/dilshaner/images/main/Screenshot%202024-08-17%20at%2021.15.29.pngp:// "Genarate Shipping label button")


- Generate Shipping Labels: Quickly create and download shipping labels in PDF format from the WooCommerce orders page.
- Customizable Label Template: Modify the HTML template used for generating the labels via the settings page.
- Proof of Delivery: Include fields for name, NIC, signature, and date in the generated labels for proof of delivery.````
- Cash on Delivery (COD): Display the COD amount on the label.

<img src="https://raw.githubusercontent.com/dilshaner/images/main/Untitled%20design%20(1).jpg" alt="https://raw.githubusercontent.com/dilshaner/images/main/Untitled%20design%20(1).jpg" width="840" height="336" class="shrinkToFit">


## Installation

#### Download and Extract:
1.         Download the plugin files.
2.         Extract the contents into your WordPress wp-content/plugins directory.

#### Activate the Plugin:
1.         Go to the WordPress admin dashboard.
2.         Navigate to Plugins > Installed Plugins.
3.         Locate "Shipping Label Generator" and click Activate.

#### Set Up:

After activation, go to Shipping Label Settings under the WordPress admin menu to configure your label template or edit your store's infomation by visiting your file manager

`<div class="container">
        <div class="section">
            <div class="label text-small"><span>  Name:</span> Your Store's Name </div>
            <div class="label text-small"><span> • Phone:</span>Your Store Number </div>
        </div>`

Example : 

`<div class="container">
        <div class="section">
            <div class="label text-small"><span>  Name:</span> Kamal Store </div>
            <div class="label text-small"><span> • Phone:</span>+9470 123 4567 </div>
        </div>`

##Troubleshooting

#### 1. Default WooCommerce checkout form dose not suitable for most of Sri Lankan WooCommerce web stores. So we use custom WooCommerce checkout forms. 

<img src="https://raw.githubusercontent.com/dilshaner/images/main/Screenshot%202024-08-17%20at%2022.25.52.png" alt="https://raw.githubusercontent.com/dilshaner/images/main/Screenshot%202024-08-17%20at%2022.25.52.png" width="840" height="322" class="shrinkToFit transparent">

1.         Go to the WordPress admin dashboard.
2.         Navigate to Plugins > Add Plugins.
3.         Search "Checkout Field Editor" then install and click Activate.

#### 1.1  We added 2 extra fields for get second phone number and districts. 
<img src="https://raw.githubusercontent.com/dilshaner/images/main/Screenshot%202024-08-17%20at%2022.27.10.png" alt="https://raw.githubusercontent.com/dilshaner/images/main/Screenshot%202024-08-17%20at%2022.27.10.png" class="transparent overflowingVertical">

#### 1.3  Now you can see the relation between the Name (billing_city,billing_first_name) and the and the php code.(label-functions.php)

<img src="https://raw.githubusercontent.com/dilshaner/images/main/Untitled%20design%20(2).jpg" alt="https://raw.githubusercontent.com/dilshaner/images/main/Untitled%20design%20(2).jpg" width="840" height="336" class="shrinkToFit">

## Usage

#### Generate a Label:
-         Navigate to the WooCommerce Orders page.
-         For any order, click on the Generate Shipping Label action.
-         The label will be generated in PDF format and automatically downloaded.


## Files

-     shipping-label-template.html: HTML template for the shipping label.
-     label-functions.php: Contains the function to generate the shipping label PDF.
-     shipping-label-generator.php: Main plugin file, handles initialization and hooks.
-     settings-page.php: Manages the settings page and allows customization of the label template.

## Requirements

-     WordPress: 5.0 or higher
-     WooCommerce: 3.0 or higher
-     PHP: 7.0 or higher
- 	TCPDF

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please feel free to open an issue or submit a pull request.
License

This project is licensed under the MIT License.
