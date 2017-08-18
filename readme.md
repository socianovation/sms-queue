# E-Mail Queue
Sending Sms with PHP Lumen and RabbitMQ 
Powered by Twilio

### How to use
1. Install RabbitMQ in your environment
Follow this guide : https://www.digitalocean.com/community/tutorials/how-to-install-and-manage-rabbitmq
2. After installing RabbitMQ, start the rabbitmq service, navigate to http://[your server ip]:15672
3. Login with your credential (by default guest:guest)
4. Create a new queue (In the example, i set the queue name as 'send-sms') and make sure you set "durable" option to true. 
5. Clone this repo
6. Run ```composer install ```
7. Change the .env content (TWILIO_SID, TWILIO_TOKEN and TWILIO_PHONE_NUMBER) with your twilio account
8. For the queue listener, run ```php artisan sms:listener ```
9. Run ```php -S localhost:8000 -t public```
10. Try run http://localhost:8000/send-sms?
phone_number=<your_verified_phone_number>
11. Done!! Your sms will be sent
