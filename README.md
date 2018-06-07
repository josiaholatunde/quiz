# quiz
This project is a computer based platform to prepare students for UTME exams or quiz.
User logs in with username and selects subject combination index.php
User reads the info page as regards the structure of the questions info.php
Questions are saved in the database and fetched to the client side at random using the php random function.
A javascript count down timer begins counting and submits quiz once the time expires.
On submission, the result.php compares the answers stored in the database and that of the user and displays 
the result which includes total number of questions answered, total right answers and total wrong answers. 
User can choose to log out to retake test.
Each username is unique as each username is saved in a session.
User must be logged in before taking the test as attempt to access any of the pages would result in the user 
been redirected to the index page
