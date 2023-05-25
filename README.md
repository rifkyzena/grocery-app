# Amazing E-Grocery

Amazing E-Grocery is a simple web application that provides limited items (only one in the stock) that can be purchased by online service. Users are able to see the displayed products in the home page only after they can pass through the registration or login process. Each products displayed is also companied with their prices and description. There is also a cart feature so users can keep track of their products before doing a check-out. The main functionality of Amazing E-Grocery app is account management in the Profile menu and Account Maintenance menu. Regular users can change their personal information, while Admin users has the access to update regular user's info data store in the application and delete any account. This web application was made by HTML, CSS and JS with PHP logic and Laravel 8 Framework that uses MySQL to connect to the database. 

Amazing E-Grocery was built with Model View Controller (MVC) architecture.

# Startup Guide
1. Download and unzip the project.
2. Install XAMPP, then start Apache and MySQL module (make sure these two modules are active, otherwise the application can't connect to the database and won't start).
3. Go to http://localhost/phpmyadmin/.
4. Open the project's directory in a terminal and run the command:
    - *php artisan storage:link* (so the images can load)
    - *php artisan serve*
5. Open the link given after the last command to open the web application.

***Please contact me if you run into any problem when trying to run the app***

Below is the database design / table structure of the application:
![image](https://github.com/rifkyzena/grocery-app/assets/55536824/5c649fdd-f9ab-4774-be14-a4017e773e25)

Below is the preview and/or flow of the application:
# (1/8) Index Page
The index page of the web application is shown below
![image](https://github.com/rifkyzena/grocery-app/assets/55536824/5117139b-fe76-486a-ace6-7ba65e59c1e7)

# (2/8) Register Page
“Amazing E-Grocery” web application can only be accessed by the user that has already registered & do the login process; hence every user needs to register first. Below are the application’s “Register” and “Login” page.
![image](https://github.com/rifkyzena/grocery-app/assets/55536824/2ecd7600-3eb1-44bd-ac87-5a073d78277c)

# (3/8) Login Page
![image](https://github.com/rifkyzena/grocery-app/assets/55536824/93c85b5f-7946-4bf1-9be3-a4eb3319cc43)

# (4/8) Home Page
When the user is already done the registration process and log in, the "Home" page will be shown.
![image](https://github.com/rifkyzena/grocery-app/assets/55536824/4017adc6-6d5a-44e0-895e-ac1b96217999)

The “Home” screen shows a maximum of 10 grocery items. If there are more than 10 available items, then the “Home” screen will show the remaining items on the next page (page 2 and so on). The example of “Home – Page 2” can be seen on the below picture:

![image](https://github.com/rifkyzena/grocery-app/assets/55536824/5f13adb0-7fd3-4b7f-a227-7025298dc84f)

In the “Amazing E-Grocery” web application, there is be a difference between the “User” and “Admin” navigation. The difference is the “Account Maintenance” menu, which only can be accessed by the “Admin”. Other than that, “Home”, “Cart”, and “Profile” menu can be accessed by the “User” and the “Admin”.

![image](https://github.com/rifkyzena/grocery-app/assets/55536824/4b469855-f4e0-4e06-bbe2-4f70130d51e8)

![image](https://github.com/rifkyzena/grocery-app/assets/55536824/8794511a-8484-4d9e-beea-2f10e9388a89)

The “User” and “Admin” can buy one or more E-Grocery by clicking the E-Grocery title on “Home” page and “Buy” button. The chosen E-Grocery will be shown on “Cart” page as shown on the below figure:

# (5/8) Cart Page
![image](https://github.com/rifkyzena/grocery-app/assets/55536824/568cfc4a-1521-4d20-a074-704f08eb23d5)

![image](https://github.com/rifkyzena/grocery-app/assets/55536824/a44ffd45-7429-44e4-a500-794000e91093)

On “Cart” page, the E-Grocery list can be deleted by clicking the “Delete” button. For example, here, the “Vegetable 1” is deleted & the “Cart” page will only show the “Vegetable 11”:

![image](https://github.com/rifkyzena/grocery-app/assets/55536824/8e2792d9-40b8-4d83-9b8b-5b1b611b6e4b)

When the list is finalized, the order can be made by clicking the “Check Out” button. If it succeeds, then the “Success” page will be shown (below figure):

![image](https://github.com/rifkyzena/grocery-app/assets/55536824/83001ef3-89f2-4c39-8ec0-44da74e21d1f)

# (6/8) Profile Page
Other than the E-Grocery shopping feature, the “User” and “Admin” can change their personal data on “Profile” menu. If it succeeds, the “Saved” page will be shown:

![image](https://github.com/rifkyzena/grocery-app/assets/55536824/dd6bc485-f765-410e-a538-66d0087437ef)

![image](https://github.com/rifkyzena/grocery-app/assets/55536824/f5a780cb-4a1c-4d88-b0f1-1c30a8e5ff50)

# (7/8) Account Maintenance Page (for Admin only)
Specifically, for the “Admin”, the “Account Maintenance” menu can be accessed to change the account’s role by clicking the “Update Role” link & delete the “Amazing E-Grocery” application’s account by clicking the “Delete” link:

![image](https://github.com/rifkyzena/grocery-app/assets/55536824/44dd0d44-1bdb-4e81-9538-e20af8da2466)

![image](https://github.com/rifkyzena/grocery-app/assets/55536824/8cea0674-3d37-4bca-ae19-f09c13ee1496)

If the role is successfully changed, then the new role will be shown immediately like the below figure:

![image](https://github.com/rifkyzena/grocery-app/assets/55536824/dcbd2290-77a4-49c4-a87d-2c4b70203f0c)

And if one of the accounts is successfully deleted, then the account will not be shown any more like the below figure:

![image](https://github.com/rifkyzena/grocery-app/assets/55536824/6f048bcd-4b6a-4ce1-9991-ca320cd3ff84)

# (8/8) Logout Page
Finally, if the “User” or “Admin” is logged out from the application, the “Log Out Success” will be shown. After logging out, the user’s session will be deleted automatically & the application will be redirected to the Index page. The “User” and the “Admin” must log in again if they want to access the web application.

![image](https://github.com/rifkyzena/grocery-app/assets/55536824/d4306e12-1db0-468b-b1c4-c187ef5b5f1d)


