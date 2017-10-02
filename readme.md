# Recipe Box

## Live URL
<http://recipe-box.malloryspector.com>

## Description
Recipe Box is an application where users can save and manage their favorite recipes.

## Details

#### Database Tables In Addition To Users Tables
* recipes
* recipe_user
* ingredients

#### CRUD Operations
* Create: Ability for user to add a new recipe
* Read: When logged in user is able to view all of their saved recipes
* Update: The contents of any recipe can be edited
* Delete: Recipes can be detached from any user

#### Other
* There is basic server side validation for all forms
* Javascript is used to add and delete ingredient input rows
* Empty ingredient rows are not saved to database to prevent empty rows that were not deleted by the user

## Outside code
* Bootstrap: http://getbootstrap.com/
* Google Fonts: https://www.google.com/fonts
