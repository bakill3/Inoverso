# Inoverso Professional Portal

## Overview

Inoverso is a sophisticated professional portal, created at the end of 2018 and early 2019 for a client who has since generously allowed for its showcase on GitHub. It is a centralized hub designed to bridge the gap between clients and professionals in the technology service industry. The website facilitates the hiring of experts for project development, website creation, graphic design, and other technology-related services. Previously it could be accessed through https://inoverso.pt/ but now it can be accessed here [inoverso.tapgotech.com](https://inoverso.tapgotech.com/).

## Key Features

- **Responsive Design:** Crafted for an optimal experience across all devices, including desktop and mobile.
- **Performance Excellence:** High performance scores in Google's PageSpeed Insights, with AJAX-driven dynamic interactions.
- **User Interaction:** Immediate notifications, messages, and updates without page reloads.
- **Role-based Dashboards:** Customizable dashboards for users and administrators, providing a suite of interactive tools.

## Detailed Functionality

### User Engagement

- **Home Page:** Offers a compelling introduction to the services with straightforward navigation.
- **About Page:** Showcases the qualifications of the platform's professionals.
- **Portfolio Page:** Displays a curated list of projects with detailed insights pulled from the database.
- **Contact Form:** Gathers detailed project inquiries and sends elegant email confirmations.

### Administrative Features

- **User Dashboard:** Allows for real-time interactions with core features such as messaging, profile management, and service requests.
- **Portfolio Administration:** Enables administrators to manage portfolio entries, reflecting changes instantly on the site.

## Technical Specifications

### Frontend Technologies

- **Languages:** HTML, CSS, JavaScript, jQuery
- **Framework:** Bootstrap v4.3.1
- **Animations:** AOS Animation
- **Image Handling:** Croppie.js

### Backend Technologies

- **Server-side Scripting:** PHP
- **Database:** SQL

### Database Schema and Tables

The database contains several tables that work together to store the necessary information:

- `users`: Holds user credentials and profiles.
- `projects`: Catalogs project information displayed in the portfolio.
- `messages`: Archives communication between clients and service providers.
- `quotes`: Tracks service quotations and responses.

These tables are interconnected with appropriate foreign keys to maintain the integrity of relationships within the data.

### AJAX Scripts

The site heavily relies on AJAX for smooth, uninterrupted user interactions, covering:

- Form submissions
- Dynamic content updates
- File management
- User authentication

### Common Components

- `header.php`: A uniform header included across all pages.
- `footer.php`: A consistent footer appended to the bottom of each page.
- `db_connect.php`: Manages the database connection, included as needed.

## Project Timeline

The project was meticulously developed over the turn of 2018 to 2019 for a client who required a detailed and responsive design. The design was based on precise specifications provided in Photoshop format, which were then converted into the live site.

## Screenshots

Below are the screenshots showcasing different pages of the Inoverso Professional Portal. These images provide a glimpse into the user interface and design elements that make up the platform.

### Home Page
![Home Page](images/home_page.png)
*The welcoming entry point of the portal, providing an overview of services and a direct call to action.*

### About Page
![About Page](images/about_page.png)
*Detailing the expertise and background of the professional team available for hire.*

### Portfolio Page
![Portfolio Page](images/portfolio_page.png)
*Displaying a range of completed projects, each with detailed information accessible from the database.*

### Contact Page
![Contact Page](images/contact_page.png)
*A comprehensive contact form for potential clients to submit their projects and inquiries.*

### User Dashboard
![User Dashboard](images/user_dashboard.png)
*The dashboard where users can view notifications, manage their profiles, and interact with the service providers.*

### Admin Dashboard
![Admin Dashboard](images/admin_dashboard.png)
*Administrative interface featuring management tools for user roles, portfolio entries, and other administrative tasks.*

## Setup and Installation

1. Clone the repository to your local environment.
2. Import the `inoverso_db_schema.sql` to your SQL database.
3. Edit `db_connect.php` with your database credentials.
4. Ensure any dependencies are installed.
5. Serve the site on a PHP-enabled server like Apache or Nginx.

## Licensing

This project was commissioned by a private client who has granted permission for its display on this platform. It serves as a testament to bespoke web development catered to specific client needs.

---

Developed by [@bakill3](https://github.com/bakill3) - © 2019
