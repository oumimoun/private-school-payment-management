  <h1>Private School Payment Management</h1>
  <p>This project is a software application that simplifies payment and administrative processes related to student training. The system takes input information, such as the student's name, trainer's name, and training period, and generates a payment receipt in PDF format. Additionally, the system manages user accounts and information for students, trainers, and trainees, allowing for creating, editing, and deleting user accounts, as well as managing the training schedule and tracking attendance.</p>
  <p>The aim of this project is to streamline the entire process of managing student training, from payment and financial management to administrative tasks like user account management and scheduling, saving time and increasing efficiency for all stakeholders involved.</p>
  <h2>Running Your PHP Application on XAMPP</h2>
  <p>This guide will help you run your PHP application on XAMPP and connect it to a MySQL database.</p>
  <h3>Prerequisites</h3>
  <p>Before starting, make sure you have the following installed on your machine:</p>
  <ul>
    <li>XAMPP</li>
    <li>PHP</li>
    <li>MySQL</li>
  </ul>
  <h3>Setup</h3>
  <p>Clone this repository to your local machine:</p>
  <pre><code>git clone https://github.com/oumimoun/private-school-payment-management.git</code></pre>
  <p>Move the cloned repository to the htdocs directory in your XAMPP installation folder (e.g. C:\xampp\htdocs).</p>
  <p>Start XAMPP and ensure that Apache and MySQL servers are running.</p>
  <p>Create a new database in phpMyAdmin:</p>
  <ol>
    <li>Open a web browser and go to http://localhost/phpmyadmin</li>
    <li>Click on "New" in the left-hand menu</li>
    <li>Enter a name for your new database, e.g. esgi, and click "Create"</li>
  </ol>
  <p>Import the database schema:</p>
  <ol>
    <li>In phpMyAdmin, select your new database from the left-hand menu</li>
    <li>Click on "Import" in the top menu</li>
    <li>Click "Choose File" and select the database schema file (esgi.sql) from the cloned repository</li>
    <li>Click "Go" to import the schema into your database</li>
  </ol>
  <p>Update the database credentials in the PHP application:</p>
  <ol>
    <li>Open the config.php file in a text editor</li>
    <li>Update the $db_host, $db_user, $db_pass, and $db_name variables to match your MySQL database credentials</li>
  </ol>
  <h3>Usage</h3>
  <p>Start XAMPP and ensure that Apache and MySQL servers are running.</p>
  <p>Navigate to 'http://localhost/private-school-payment-management/esgi-apk/login.php' in a web browser. You should now see your PHP application running.</p>
    <h1>XAMPP Troubleshooting Guide</h1>
		<h2>XAMPP Troubleshooting Guide</h2>
    <main>
	<section>
		<h2>Common Problems and Solutions</h2>
		<ul>
			<li>
				<strong>Problem:</strong> Apache or MySQL servers won't start<br>
				<strong>Solution:</strong> Check if another program is using the ports that Apache and MySQL servers need. Change the ports used by Apache and MySQL in XAMPP's configuration settings.
			</li>
			<li>
				<strong>Problem:</strong> PHP errors are displayed on the webpage<br>
				<strong>Solution:</strong> Check your PHP code for syntax errors and fix them. Also check the PHP version used by XAMPP and make sure it's compatible with your PHP application.
			</li>
			<li>
				<strong>Problem:</strong> Database connection errors<br>
				<strong>Solution:</strong> Check your MySQL database credentials in the <code>config.php</code> file and make sure they're correct. Also make sure that the MySQL server is running and that the database schema has been imported correctly.
			</li>
		</ul>
	</section>
		<h3>Credits</h3>
		<p>This guide was created by Oussama MIMOUNI.</p>
</main>
<img src="exemples/Screenshot%202023-04-03%20235724.png">
<img src="exemples/Screenshot%202023-04-03%20235917.png">
<img src="exemples/Screenshot%202023-04-04%20000816.png">
<img src="exemples/Screenshot%202023-04-04%20001040.png">
<a href="exemples/form-data%20(1).pdf" target="_blank">Download PDF</a>
