Products Evolution Standard Edition
====================================

Welcome to the Products Evolution Standard Edition

For details on how to download and get started with ProdEvol Bundle, see the
[Installation][1] chapter of this following Documentation.

What's this tool?
------------------
During long time, we are often confronted to develop or inventorize own products to interact with external tools (called Third Party Products).

After some time, it's come complicated to know which version of a tool is compatible or necessary to use perfectly with an internal product and generate a lot of matrix.

By exemple, a product using C++ run-time interact with a specific external product which generate documentation from LaTeX based on your template.
The installation of your product on a new server request to know the version of LaTeX to install to limit the support in case of issue.

Because the time growing, some products coming deprecated or no more supported by the vendor.
The tool allow to inventorize new external product to identify, test and inform of the compatibility of a new version.
 

Installation.
--------------


Products Evolution is based on Symfony Framework.


composer.php

extract git repository


execute composer update


configure Apache 2


# ProductsEvolution
php bin/console doctrine:schema:update --force



#test after onetomany/manytoone
#for add setter/getter
php bin/console doctrine:generate:entities ProdEvolBundle:Product
#for create form
php bin/console doctrine:generate:form ProdEvolBundle:Product
