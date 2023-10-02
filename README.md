# Event Management Web Application using Laravel

This is a web application built for event management using the Laravel framework. The application allows users to apply, create, manage, and organize events.

## How to Run the Program

Follow these steps to set up and run the web application on your local machine:
1. **Install laravel dependencies:**
    ```sh
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

2. **Create sail alias:**
    ```sh
    alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'

3. **Clone the Repository:**
   ```sh
   git clone https://github.com/Pompu/CS442-661-Midterm-Project.git

4. **Open Docker:**
Make sure you have Docker installed on your system.

5. **Run Docker Containers:**
Navigate to the project directory and use the following command to start the Docker containers:
    ```sh
   sail up -d 
* If you encounter a "Permission denied" error, run the following command before trying again:   
    ```sh
   chmod +x vendor/laravel/sail/bin/sail
   
6. **Install Yarn Dependencies:**
After the Docker containers are up and running, you'll need to install Yarn dependencies. Run the following command:
    ```sh
   sail yarn install

7. **Process CSS:**
 Use the following command:
    ```sh
    sail yarn dev

8. **Run Migrations and Seed Database:**
Apply the database migrations and seed the database with sample data:
    ```sh
    sail artisan migrate:fresh --seed

9. **Create Symbolic Link for Storage:**
Create a symbolic link for the storage to show images:
    ```sh
    sail artisan storage:link

10. **Access the Application:**
Open your web browser and navigate to `http://localhost`


## Example users for login

* (MEMBER) (Email: somchai@gmail.com) (Password: somchaipassword)
* (OFFICER) (Email: rose@gmail.com) (Password: roserinpassword)

## Contributors

- 6410401132 Ratti Keatchaiyo
- 6410406509 Kanyakron Sukanuyuth 
- 6410406703 Napasamon Siribanjong
- 6410406819 Petchgamon Sangnual 
- 6410406924 Atitaya Promlers