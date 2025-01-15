---                                   Website Monitoring Progress Order Fallout End State PT Telkom                                      ---
                                                                ==========
                                                                Activation
                                                                ==========
~ Step 1
Download or Clone This Project
~ Step 2
Open Project and change your .env file (you can copy from .env.example{dont forget to renamed it})
"
APP_TIMEZONE=Asia/Jakarta

APP_LOCALE=id
APP_FALLBACK_LOCALE=id
APP_FAKER_LOCALE=id_ID

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=telkomnew
DB_USERNAME=root
DB_PASSWORD=

FILESYSTEM_DISK=local
"
(Database can be change to your prever set)
(system disk is optional, but please change to "public" if you hosting this)
~ Step 3
Open Project and run "composer install --ignore-platform-reqs"
~ Step 4
Run "php artisan storage:link"
~ Step 5
Make your database first and run "php artisan migrate:fresh --seed"
~ Step 6
Run "php artisan serv" and enjoy
~ Optional step
run "composer require maatwebsite/excel"

                                                                ============
                                                                Open Version
                                                                ============
ver 1.0001

- Dashboard
    {Dashboard}
        (Team Leader)
        #   Read Data Order
        (admin)
        #   Read Data Order
    {Data Master}
        (Team Leader)
        #   CRUD Data Order
        (admin)
        #   CRUD Data Order
    {Upload Excel}
        (Team Leader && ASO)
        #   Upload Data Order
    {Check Complete}
        (Team Leader && ASO)
        #   Update Data Order
- Manage Data
    {User Data Management}
        (Team Leader)
        #   CRUD Data User
        (admin)
        #   Read Data User
    {Log Data Management}
        (Team Leader)
        #   Read Data Log
        (admin)
        #   Read Data Log
    {So Data Management}
        (Team Leader)
        #   CRUD Data So
        (admin)
        #   Read Data So
    {Sto Data Management}
        (Team Leader)
        #   CRUD Data Sto
        (admin)
        #   Read Data Sto
    {Uic Data Management}
        (Team Leader)
        #   CRUD Data Uic
        (admin)
        #   Read Data Uic
    {Pic Data Management}
        (Team Leader)
        #   CRUD Data Pic
        (admin)
        #   Read Data Pic
    {Status Kendala Data Management}
        (Team Leader)
        #   CRUD Data Status Kendala
        (admin)
        #   Read Data Status Kendala
