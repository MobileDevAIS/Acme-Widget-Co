# Acme Widget Co Sales System

This is a proof of concept for Acme Widget Co's new sales system. It includes the following functionalities:

- Initialization of product catalogue, delivery charge rules, and special offers.
- Adding products to a basket.
- Calculating the total cost of the basket, taking into account delivery and offer rules.

## Assumptions

- The special offer "buy one red widget, get the second half price" is only applicable to the red widget (R01).
- Delivery costs are applied based on the total price before adding the delivery cost.

## How to Use

1. Ensure you have PHP installed on your system.
2. Save the files `Product.php`, `Basket.php`, and `index.php` in the same directory.
3. Run the `index.php` script using the command `php index.php`.

## Example

```bash
$ php index.php
Total: $37.85
Total: $54.37
Total: $60.85
Total: $98.27


### Explanation
- `Product.php` defines the Product class.
- `Basket.php` handles adding products and calculating the total cost including delivery and offers.
- `index.php` demonstrates the usage of the Basket class.
- `README.md` provides instructions and explains the assumptions.

You can now run the `index.php` file to see the expected output as per the provided examples.
