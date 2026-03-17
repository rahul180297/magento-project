# Mage2 Module Test GraphQl

    ``test/module-graphql``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
This is a test module

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Test`
 - Enable the module by running `php bin/magento module:enable Test_GraphQl`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require test/module-graphql`
 - enable the module by running `php bin/magento module:enable Test_GraphQl`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - custom_payment_method - payment/custom_payment_method/*

 - custom_shipping_method - carriers/custom_shipping_method/*


## Specifications

 - API Endpoint
	- GET - Test\GraphQl\Api\ProductsManagementInterface > Test\GraphQl\Model\ProductsManagement

 - Cache
	- GraphQl - graphql_cache_tag > Test\GraphQl\Model\Cache\GraphQl

 - Configuration Type
	- enable

 - Console Command
	- import

 - Crongroup
	- default

 - Cronjob
	- test_graphql_fetchpost

 - GraphQl Endpoint
	- Products

 - Model
	- blog

 - Observer
	- customer_login > Test\GraphQl\Observer\Frontend\Customer\Login

 - Payment Method
	- custom_payment_method

 - Shipping Method
	- custom_shipping_method


## Attributes

 - Customer - profile url (profile_url)

