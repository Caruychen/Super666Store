# Super666Store
An e-commerce store powered by Php, Html and Css. Made over a weekend at Hive Helsinki during our Php Piscine. We sell all kinds of superpowers, and you pay with Souls. We used php to dynamically generate the site's content, similar to a single page site.

## Features
We have implemented the following features for our e-commerce store:
### Data management
We implemented a data management scheme using CSV, used for storing basic ecnrypted user information, orders and product lists.

### User management
USers are able to create and delete a user account. Logging into the site is essential before users can validate their basket. However, it is possible for users to fill their basket before identification. The user's basket state is preserved after identification, by using browser sessions. The user is also able to manage their account, and view their order history.

### Shopping basket
Typical of an online store, the user can click on items and add their choices to a shopping cart. It shows the price, quantity of each article, and the total cost (in Souls). The shopping basket provides a validation button that allows the user to confirm their purchase. If the user is not logged in, it will show a login button instead.

### Categories and associated products
The superpowers are organisd into separate categories, and the user is able to browse the options dynamically throughout the site.

### Administrative access
We provide admin access, which has higher priviledge access to the website. The admin is able to manage site content, orders and users.

## Server set-up
We used mamp, packaged by [bitnami](https://bitnami.com/stack/mamp), and run our server on apache2. Simply store the site repository in the `mamp/apache2/htdocs/` directory, and the site should be able to run.
