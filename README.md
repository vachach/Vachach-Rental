# Vachach Rental

**Vachach Rental** is an innovative platform designed to help students easily find and rent housing. This project is built using Laravel (backend) and Vue.js (frontend) technologies.

## Key Features

- **Student-Specific Listings**: Housing options tailored to students' needs.  
- **Advanced Search**: Filter housing by location, price, and other features.  
- **User Profiles**: Manage profiles for both students and landlords.  
- **Automated Rental Process**: Contract creation and integrated payment systems.  

## Technologies Used

- **Backend**: Laravel 10  
- **Frontend**: Vue.js 3  
- **Database**: MySQL  
- **Authentication**: Laravel Breeze (or Laravel Sanctum)  
- **Payment Integration**: Payme, Click  

## Installation Guide

### Requirements

- PHP >= 8.1  
- Composer  
- Node.js >= 16  
- MySQL >= 8.0  

### Steps to Install

1. **Clone the repository**:

   ```bash
   git clone https://github.com/username/vachach-rental.git
   cd vachach-rental
   ```

2. **Set up the backend**:

   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
   ```

3. **Set up the frontend**:

   ```bash
   npm install
   npm run dev
   ```

4. **Start the server**:

   ```bash
   php artisan serve
   ```

5. Open your browser and visit:  

   ```
   http://localhost:8000
   ```

## How to Use

1. Register as a student or landlord.  
2. Use filters to search for housing.  
3. Contact the landlord or complete the payment to rent a property.  

## Future Plans

- Develop a mobile application.  
- Add multilingual support.  
- Implement an AI-powered recommendation system.  

## Contributing

To contribute, please follow these steps:  

1. Fork this repository.  
2. Make your changes locally and commit them.  
3. Submit a pull request.  

## Contact

Author: **Botir**  
Email: botirjohn2000@gmail.com  
Telegram: [@botirjohn](https://t.me/botirjohn)