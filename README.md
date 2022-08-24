# MageGuide AdminCategoryProductThumbnail

Tested on: 2.1+, 2.2+, 2.3+

## Description

  AdminCategoryProductThumbnail provides to admin user extra attribute columns on Product Grid of Category Edit Page for better filterring and product management.


### Functionalities

  - Adds Thumbnail Column on Product Grid of Category Edit Page
  - Adds Quantity Column on Product Grid of Category Edit Page
  - Adds Special Price Column on Product Grid of Category Edit Page
  - Enable/Disable Functionality Per Column

### Installation

  Add the app folder with all the subfolders into the root folder of your Magento Application.

  Perform the following commands:

  * __Developer Mode__

```sh

    $ php bin/magento set:upg && php bin/magento c:c

```

  * __Production Mode__

```sh

    $ php bin/magento maintenance:enable
    $ php bin/magento setup:upgrade
    $ php bin/magento setup:di:compile
    $ php bin/magento setup:upgrade
    $ php bin/magento setup:static-content:deploy el_GR en_US #or any other space seperated language you need for your project
    $ php bin/magento maintenance:disable

```

### Usage

  Stores > Configuration > MageGuide > AdminCategoryProductThumbnail:

  | Option | Value |
  | ------ | ------ |
  | Enabled | Yes |
  | Thumbnail | Yes to Add Thumbnail Column on Product Grid of Category Edit Page |
  | Quantity | Yes to Add Quantity Column on Product Grid of Category Edit Page |
  | Special Price | Yes to Add Special Price Column on Product Grid of Category Edit Page |

  Catalog > Categories > Products in Category:

  Here you can filter your products with the new columns.

### Screenshots

#### Store Configuration
![Store Configuration](/screenshots/store_configuration.png)

#### Category Edit Page Product Grid
![Category Edit Page Product Grid](/screenshots/category_edit_page_product_grid.png)