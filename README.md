# Inoverso Professional Portal

> **Notice:** This website was last updated in early 2019 and may not reflect current web standards or practices.

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
- `chat`: Stores real-time chat conversations between users.
- `localizacoes`: Contains location data for various functionalities within the portal.
- `mensagens`: Archives messages exchanged between clients and service providers.
- `notificacoes`: Manages notifications for users about various interactions and updates.
- `orcamentos`: Tracks service quotations, requests, and responses.
- `portfolio`: Catalogs information displayed in the portfolio section.
- `projetos`: Stores project-related data for the portfolio.
- `status`: Defines various status codes for operations and interactions within the portal.

These tables are interconnected with appropriate foreign keys to maintain the integrity of relationships within the data.


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

### Database Schema (`base de dados.png`)
![Database Schema](i9_pics/base_de_dados.png)
*A visual representation of the database schema detailing the tables and relationships within the Inoverso portal.*

### Home Page (`index.png`)
![Home Page](i9_pics/index.png)
*The main landing page that visitors first see, featuring intuitive navigation and a snapshot of the portal's services.*

### Contact Form (`contact.png`)
![Contact Form](i9_pics/contact.png)
*A form designed for potential clients to make inquiries, request services, and reach out to professionals.*

### Portfolio Page (`portfolio.png`)
![Portfolio Page](i9_pics/portfolio.png)
*Showcases the collection of projects completed, with each entry providing insight into the professional capabilities.*

### Login Page (`login.png`)
![Login Page](i9_pics/login.png)
*The login page where users enter their credentials to access the portal's personalized features.*

### User Dashboard (`dashboard.png`)
![User Dashboard](i9_pics/dashboard.png)
*The central hub for users to navigate the portal, manage projects, and interact with notifications and updates.*

### Edit Portfolio (`editar_portfolio.png`)
![Edit Portfolio](i9_pics/editar_portfolio.png)
*An administrative page that allows for the real-time editing and updating of the portfolio entries.*

### Quotes Page (`orcamentos.png`)
![Quotes Page](i9_pics/orcamentos.png)
*Where users can view and manage their quotes, providing an overview of service requests and budgeting.*

### Request Quote (`pedir_orcamento.png`)
![Request Quote](i9_pics/pedir_orcamento.png)
*A detailed page where users can submit a comprehensive request for a service quote, specifying all necessary project details.*

### Messaging System (`mensagens.png`)
![Messaging System](i9_pics/mensagens.png)
*The real-time messaging system that allows clients and service providers to communicate efficiently.*

### Edit Profile (`editar_perfil.png`)
![Edit Profile](i9_pics/editar_perfil.png)
*The profile editing page where users can update their personal information, preferences, and profile picture.*



### SEO Report (`SEO.png`)
![SEO Report](i9_pics/SEO.png)
*An example of the portal's SEO performance, demonstrating the high level of optimization achieved.*

## Setup and Installation

1. Clone the repository to your local environment.
2. Import the `hw36am2w_i9_trabalho.sql` to your SQL database.
3. Edit `db_connect.php` with your database credentials.
4. Ensure any dependencies are installed.
5. Serve the site on a PHP-enabled server like Apache or Nginx.

## Licensing

This project was commissioned by a private client who has granted permission for its display on this platform. It serves as a testament to bespoke web development catered to specific client needs.

---

Developed by [@bakill3](https://github.com/bakill3) - © 2019
