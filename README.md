# 🚜 Smart-Farm Management System 🌾

A comprehensive web application designed to bridge the gap between agricultural administrators and farmers. This platform streamlines daily farming operations, automates lease and loan application workflows, and provides data-driven insights to optimize agricultural productivity.

---

## 🏗️ Architecture: MVC Pattern

This project is built strictly following the **Model-View-Controller (MVC)** architectural pattern to ensure a clean separation of concerns, maintainability, and scalability.


📁 Smart-Farm-Management-System


├── 📁 Models       
├── 📁 Views        
└── 📁 Controllers  

* **Model:** Manages the data and core business logic. It interacts directly with the database to handle operations for users, sales, leases, and loans.
* **View:** The presentation layer. Rendered dynamically based on the user's role (Admin or Farmer) using clean and responsive interfaces.
* **Controller:** Acts as the intermediary. It catches user requests from the View, processes them using the Model, and updates the View accordingly.

---

## 🛠️ Core Features

### 👥 Common Features (Available to All Users)

* **Authentication**
    * Secure User Login & Logout.
    * New User Registration.
* **Account Management** [to be added]
    * Change or reset account passwords.
    * Permanent account deletion.
* **Personalized Dashboard**
    * Role-based personalized dashboard upon successful login.
    * Real-time overview of relevant system activities.

---

### 👑 Admin Features

The Administrator acts as the central moderator of the platform, managing users and facilitating financial and logistical support.

1.  **User Management:** Register new farmers and fully manage farmer profiles (View, Edit, Delete).
2.  **Marketplace Control:** Approve or reject product sale requests submitted by farmers.
3.  **Financial Intermediary:** Review and forward farmer loan applications to corresponding financial institutions.
4.  **Logistics:** Manage and track product delivery services.
5.  **Lease Verification:** Verify season suitability and land types for incoming lease applications.
6.  **Knowledge Sharing:** Publish seasonal farming tutorials to guide farmers throughout the year.

---

### 👨‍🌾 Farmer Features

The Farmer portal empowers agricultural workers with tools to sell products, apply for financial aid, and stay updated with the environment.

1.  **Sales Management:** Submit sale requests and manage product details (Type, Quantity, Price).
2.  **Order Tracking:** Track the real-time status of sale requests (*Pending, Approved, Processing*).
3.  **Land Leasing:** Apply for land lease requests by specifying the target season and property type.
4.  **Financial Applications:** Apply for loans seamlessly by providing land information, bank account details, and the requested amount.
5.  **Smart Updates:** Stay informed with live, weather-related updates to plan daily farming activities.

---

## 🚀 Tech Stack

* **Backend/Logic:** PHP (MVC Structure)
* **Database:** MySQL
* **Frontend:** HTML5, CSS3, JavaScript

## 🚀 Local Installation & Run Guide

Follow this step-by-step guide to clone the project repository, set up the required MySQL database tables, and run the system locally.

### Prerequisites
Before you begin, ensure you have the following installed on your local machine:
* **XAMPP** (with Apache and MySQL modules enabled)
* **Git** command line tool

---

### Step 1: Clone the Repository

1. Open your Terminal (Mac/Linux) or Git Bash (Windows).
2. Change your working directory to your XAMPP local server web root directory:

* **Windows:**
  ```bash
  cd C:\xampp\htdocs
  cd /opt/lampp/htdocs
  git clone [https://github.com/your-username/Smart-Farm-Management-System.git](https://github.com/your-username/Smart-Farm-Management-System.git)

Start Local Servers

Open the XAMPP Control Panel app.

Click Start next to the Apache module.

Click Start next to the MySQL module.

Launch and Test the System
Open your browser and navigate to the application deployment address path:

Plaintext
http://localhost/Smart-Farm-Management-System/
## 💾 Database Schema & Local Setup Guide

Because this application relies entirely on a relational MySQL database to process authentication, track loan statuses, and manage sales, you **must setup the database** before launching the application.

### Step 1: Create the Database & Tables

1. Open your browser and go to **phpMyAdmin**: `http://localhost/phpmyadmin/`
2. Click **New** in the left sidebar, name the database **`smart_farm`**, and click **Create**.
3. Click on your newly created `smart_farm` database, navigate to the **SQL** tab at the top, paste the following script into the editor, and click **Go**:

```sql
-- 1. Table structure for table `admin`
CREATE TABLE `admin` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `User_name` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
);

-- 2. Table structure for table `farmer`
CREATE TABLE `farmer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `User_Name` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Date_of_Birth` varchar(100) DEFAULT NULL,
  `Status` varchar(100) DEFAULT 'Pending',
  `Role` varchar(100) NOT NULL DEFAULT 'farmer',
  PRIMARY KEY (`Id`)
);

-- 3. Table structure for table `lease_requests`
CREATE TABLE `lease_requests` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Farmer_Id` int(11) NOT NULL,
  `Season` varchar(50) NOT NULL,
  `Property_Type` varchar(100) NOT NULL,
  `Status` varchar(100) DEFAULT 'Pending',
  PRIMARY KEY (`Id`)
);

-- 4. Table structure for table `loan_requests`
CREATE TABLE `loan_requests` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Farmer_Id` int(11) NOT NULL,
  `Land_Info` text NOT NULL,
  `Bank_Account` varchar(100) NOT NULL,
  `Requested_Amount` decimal(15,2) NOT NULL,
  `Status` varchar(100) DEFAULT 'Pending',
  PRIMARY KEY (`Id`)
);

-- 5. Table structure for table `products`
CREATE TABLE `products` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Farmer_Id` int(11) NOT NULL,
  `Product_Type` varchar(50) NOT NULL,
  `Quantity` decimal(10,2) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `Price_Per_Unit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Id`)
);

-- 6. Table structure for table `sale_requests`
CREATE TABLE `sale_requests` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Farmer_Id` int(11) NOT NULL,
  `Product_Type` varchar(100) NOT NULL,
  `Quantity` decimal(10,2) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Status` varchar(100) DEFAULT 'Pending',
  PRIMARY KEY (`Id`)
);

-- 7. Table structure for table `tutorial`
CREATE TABLE `tutorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Video_Link` varchar(255) NOT NULL,
  `Season` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

-- Seed Data for Default Admin Login(give value by your own while creating the table)
INSERT INTO `admin` (`User_name`, `Password`) VALUES ('admin', 'admin123');
---
