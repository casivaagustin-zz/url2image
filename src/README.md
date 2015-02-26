Towel Standard
==============

This the standard folder structure for any Towel project

Install
=======
Start by installing composer oin any preferred folder

````
curl -s https://getcomposer.org/installer | php
````

After that, run composer to create Towel project's folder structure.

```
php composer.php create-project --no-interaction -s dev 42mate/towel-standard
```

After that you'll have a fully operational Towel instance to start coding your application.


Contributions to Towel Standard
===============================

Go to Github with your github account.

Fork the Towel Standard repository (click on the "Fork" button)

After the "forking action" has completed, clone your fork locally

```
git clone git@github.com:USERNAME/towel-standard.git
```

Add the upstream repository as a remote (for update your fork).

```
cd towel-standard
git remote add upstream git://github.com/42mate/towel-standard.git
```

Run composer update to install all dependencies.

## Update your fork ##

To update your fork with the main repo do the following

```
cd towel-standard
git checkout master
git fetch upstream
git merge upstream/master
```

Do your changes and then commit and push your changes

```
git commit .... your params ...
git push origin master
```

After that create a new pull request in your fork page in github and we are going
to receive that request to merge your changes in the main repo.
