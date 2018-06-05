# **Roomie, Web Engineering Project Spring Semester 2018**

- [Introduction](#introduction)
  - [Overview](#overview)
  - [Contributors](#contributors)
  - [Requirements](#the-following-requirements-were-defined)
  - [Optional Requirements](#optional-requirements)
- [Pre-Implementation](#pre-implementation)
  - [Wireframes](#wireframes)
  - [Database Model](#database-model)
  - [Use Case Diagram](#use-case-diagram)
  



  - [Domain Model](#domain-model)
  - [Data Access Model](#data-access-model)
- [Implementation](#implementation)
  - [Stage 1: Structure](#stage-1-structure)
  - [Stage 2: Autoloader and Routing](#stage-2-autoloader-and-routing)
  - [Stage 3: Database](#stage-3-database)
  - [Stage 4: Database Access and Domain Objects](#stage-4-database-access-and-domain-objects)
  - [Stage 5: Business Service](#stage-5-business-services)
  - [Stage 6: Register/Login](#stage-6-registerlogin)
  - [Stage 7: Course offerings view frontend](#stage-7-course-offerings-view-frontend)
  - [Stage 8: PDF creation](#stage-8-pdf-creation)
  - [Stage 9: Email Service](#stage-9-email-service)
- [Deployment](#deployment)


### Introduction
###### Overview
The goal of this project was it, to create a website that connects people that are looking for a room in a shared apartment to people, that are offering a room in a shared apartment in a very pragmatic and simple way.

###### Contributors:
* Loris Grether (database, front-end)
* Hermann Grieder (server-side, front-end, GUI)
* Tobias Gerhard (GUI, Documentation, front-end)

###### The following requirements were defined:
1. Authentication
   * If the password is forgotten, it should be possible to get a new one using email
   * The password is securely stored
2. Content management by users
   * Room offerers upload the ads for their room by themselves, using the provided online form
3. Administration
   * Deleting/updating user data
   * Change/delete ads
   * Ads will be deleted automatically after a certain time period
4. Room listing
   * The website provides a list with all the currently available rooms
5. User registration
   * User can create an account using email
   * User can login
   * User can logout
6. Search function
   * The website provides a search function so that user can search for ads with specific criteria
7. Export function
   * Ads can be printed
   * Ads can be exported as PDF
8. GUI
   * The GUI is enhanced with CSS and JavaScript to improve usability and make the appearance more appealing
   * The GUI is responsive, meaning it adapts to the screen size
9. Minimized error rate
   * The website should be as error-prone as possible
###### Optional requirements:
1. Messaging function
   * Users can get in touch with an advertiser using an integrated message function
2. Gallery
   * Users can upload pictures with their ads
3. Google Maps integration
   * Google Maps API is used in order to display the place of the room
4. Facebook login
   * Users can login with their Facebook credentials via Facebook API

### Pre-Implementation
###### Wireframes
In order to have a general idea of the GUI and a better understanding for what we are going to develop, 4 simple mock-ups were created. These wireframes can be found hereafter. However, during implementation we adjusted to our needs.
![Available Rooms](https://github.com/Yardie83/roomie/blob/master/AvailableRoomsMockup.png "Available Rooms")
![Registration](https://github.com/Yardie83/roomie/blob/master/RegistrationMockup.png "Registration")
![Room Details](https://github.com/Yardie83/roomie/blob/master/RoomDetailMockup.png "Room Details")
![Search Page](https://github.com/Yardie83/roomie/blob/master/SearchPageMockup.png "Search Page")

###### Database Model
To store the data, a PostgreSQL database was created. The database contains 3 tables; authtoken, apartment, user.
* **authtoken**: used for the remember-me and password-reset functionality.
* **apartment**: this table stores data about the apartments that are visible as ads.
* **user**: the user table stores the data about the users; id, username, mail, as well as the encrypted password.

![Database Model](https://github.com/Yardie83/WE-roomie/blob/master/DataBaseModel.jpg "Database Model")

The database is designed in a way that one user can have several apartments. However, one apartment corresponds to one user, and only one user.
Additionally it is worth mentioning that the database does not store images as images in the apartment table, it stores links to images, which are stored on an Amazon server (AWS S3).

###### Use Case Diagram
Based on the defined requirements, a use case diagram was created. The following diagram illustrates the use cases. 

![Use Case Diagram](https://github.com/Yardie83/WE-roomie/blob/master/UseCaseDiagram.jpg "Use Case Diagram")

Most use cases have already been shortly explained in the requirements section. However, hereafter, each of the use cases is explained more in detail.
* **Register**: unregistered users can create an account which allows them to create ads for a room that they like to offer.
* **User Login**: registered user that are currently logged out can log in using their credentials (email and password). After that, they have access to edit their profile, their ads, or to create new ads.
* **Logout**: logged-in users can logout, what terminates the current session.
* **Search ad**: users can search for rooms with specific requirements (room size, price, etc.).
* **Contact advertiser**: users can contact an advertiser using a contact form.
* **Delete account**: users can delete their own account as soon as they are logged in.
* **Change profile**: users can change their profile data with regards to email and username.
* **Create ad**: logged-in users can create ads. These ads appear on the website, which displays all the available rooms.
* **Edit ad**: entries (ads) can be edited with respect to description text, address etc.
* **Delete ad**: entries (ads) can be fully deleted, so that they do not appear in the database anymore.
* **Password reset**: if forgotten, users have the possibility to reset their password.







### Implementation
As foundation of the implemented code acts the framework that was developed during classes or pre-developed by the lecturer respectively. It has been adjusted and extended to our needs. Subsequently, important classes are described.
* **Router**: The router routes the requests to the correct resource/destination.
* **View**: The view folder contains all the HTML pages that are necessary for the website, including headers and the footer as well as CSS files.
* **Controller**: The controller folder contains the controller files in order to manipulate the view, or the model respectively.
* **ListingDAO and UserDAO**: The corresponding class handles the database requests and manipulates the data stored in the respective table.
* **Listing**: Holds the data for an apartment.
* **User**: Holds the data for the user.

Hereafter, the detailed code, which is used to create the database, is shown.
```SQL
CREATE TABLE apartment
(
  id INTEGER DEFAULT nextval('apartment_id_seq'::regclass) PRIMARY KEY NOT NULL,
  title VARCHAR(255) NOT NULL,
  street VARCHAR(255) NOT NULL,
  zip INTEGER NOT NULL,
  numberofrooms VARCHAR(255) NOT NULL,
  price INTEGER NOT NULL,
  squaremeters INTEGER NOT NULL,
  publisheddate DATE NOT NULL,
  description VARCHAR(1000) NOT NULL,
  moveindate DATE NOT NULL,
  image1 VARCHAR(255),
  image2 VARCHAR(255),
  image3 VARCHAR(255),
  userid INTEGER NOT NULL,
  city VARCHAR(255),
  canton VARCHAR(255),
  streetnumber INTEGER,
  CONSTRAINT fkapartment122597 FOREIGN KEY (userid) REFERENCES "user" (id)
);
CREATE TABLE authtoken
(
  id INTEGER DEFAULT nextval('authtoken_id_seq'::regclass) PRIMARY KEY NOT NULL,
  selector VARCHAR(255) NOT NULL,
  validator VARCHAR(255) NOT NULL,
  expiration TIMESTAMP NOT NULL,
  type INTEGER NOT NULL,
  userid INTEGER,
  CONSTRAINT authtoken_user_id_fk FOREIGN KEY (userid) REFERENCES "user" (id)
);
CREATE TABLE "user"
(
  id INTEGER DEFAULT nextval('user_id_seq'::regclass) PRIMARY KEY NOT NULL,
  username VARCHAR(255),
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL
);
```

### Conclusion
To be mentioned:
- The welcome page displays the newest 3 entries
