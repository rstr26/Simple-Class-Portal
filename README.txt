INSTALLATION GUIDE

- After extracting the file, copy/move 'Class Portal' folder to XAMPP directory -> htdocs
- Open XAMPP and start Apache and MySQL
- Go to phpMyAdmin and create a database 'portaldb'
- Import the database 'portaldb'
- Open your IDE or a terminal/command prompt
- Go to Class Portal folder path on your terminal
- Start the local host server by typing the command 'php -S localhost:4000'
- Open your browser and type the URL 'localhost:4000/pages/index.php'
- Try the site using the credentials below

LOGIN CREDENTIALS
-TEACHERS(username, password)
 -adam1, west1
 -cleveland1, brown1
 -glenn1, quagmire1
 -joe1, swanson1
 -lois1, griffin1
 -mort1, goldman1
 -peter1, griffin1
 -tom1, tucker1

-STUDENTS
 -meg1, griffin1
 -rick1, sanchez1
 -brian1, griffin1
 -chris1, griffin1
 -morty1, smith1
 -stewie1, griffin1

*if there is a 'mysqli extension is missing' error, please make sure there is a php_mysqli.dll located at xampp/php/ext and open php.ini file in xampp/php, find 'extension=mysqli' and replace it with 'extension="C:\xampp\php\ext\php_mysqli.dll"'

