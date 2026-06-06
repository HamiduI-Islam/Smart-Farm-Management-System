# Smart-Farm Management System

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
