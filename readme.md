# SMS Team Center powered by Laravel PHP Framework

This application is a test project for application as a web developer to a certain company.

# Features

Features include texting a team member powered by twilio.

Adding a member of a team if you are the team admin.

Phone book where a list of personal contact is located.

Admin capabilities.

# Installation

Like any other laravel application you need to run composer update

Copy the sample env file and edit. If you want to use my twilio config key you can contact me for that.

Run php artisan migrate (need some fixes though) ask me for sql file with data inserted already.

# Updates

(You might kill me for not using git tags for bug fix and proper git versioning. I will promise to take some time learning it but for now lets agree to disagree. :D)

The migration? yeah, I had fixed it, you can now run php artisan migrate:refresh to wipe out the old sql (if you ask me for the file.)

Then run php artisan db:seed to test the admin priviledge because ofcourse I did not put it to registration everyone will become admin if they want to. See Im not that stupid XD.



