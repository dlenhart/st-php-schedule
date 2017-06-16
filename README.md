st-php-schedule
===============

This is an experiment in creating a job/task scheduler / queue system in PHP and a little bit of Python.  This project was to help me think differently about creating applications and this app should not be used on any production systems.  There is no authentication and little thought of security.  The command line interface is literally me re-inventing the wheel.  There are frameworks such as Symphony that do this better!  The dashboard interface is built on Slim 3.  I have only tested this on Windows, but should work just fine on other systems.

-This is an experiment, dont judge.

Features
----
st-php-schedule has the ability to schedule jobs ( or php scripts - I'm calling them jobs/tasks ) at an interval between 1 minute to 60 minutes.  Using the dashboard, you can hold jobs globally, hold jobs in the queue, and release jobs.  You can also execute one time runs of a job/task ( if you don't want a job added to the queue at a regular interval ).  The dashboard is set to auto refresh Jobs & Queue views for quicker status.

Currently I only have the system to execute PHP scripts.  To execute any job/task, I'm using the PHP **shell_exec()** function.  I have been able to make small modifications to run other scripts, e.g. **shell_exec("powershell .\path\to\script.ps1")**.

Required
----
1.  PHP 5.5.12 + ( this is all I've tested on currently )

2.  PHP PDO extension

3.  Composer

4.  Python 3.5.2 +

Slim App Dependencies
----
-php >= 5.5.0

-slim/slim ^3.4

-slim/php-view ^2.0

-slim/twig-view ^2.1

-slim/http-cache ^0.3.0

-illuminate/database *

Install
----
1.  Download code.

2.  Run the **builddb** command via CLI e.g. **php -f stphpschedule.php builddb**

3.  If named the database durring **builddb** command, edit **config/config.php** with database name.

4.  The **builddb** command will build a SQLite database as well as a couple dummy jobs to get started.

5.  Run **composer install** in application root.  This will install the Slim app dependencies.

6.  Start PHP dev server on the public folder:  **php -S localhost:8000 -t public**.

7.  Open a browser window to:  **http://localhost:8000**.

8.  Via CLI, you can run various commands to check JOBS table ( if a job is ready to run ) or execute any job thats in the queue.  Type **path/to/php.exe -f stphpschedule.php list** for available commands.

9.  Edit **cli/listen.py**, edit php path if necessary.

10.  Run **cli/listen.py** so the Jobs table is checked regularly and jobs are executed.

Notes
----
If running on Windows, its helpful to have PHP set up in your environment variables so you can execute the CLI commands with **php script.php** versus **path/to/php.exe script.php**.


Website
----
http://www.drewlenhart.com/blog/i-made-a-php-task-scheduler

License
----
MIT License

Copyright (c) 2016 Drew D. Lenhart

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
