<?php

/*
    This code is included in the index page to execute as the system is run for the first time. 
    THe code will create a new database and it's tables, create the relationships between the tables.
    There is also default value for the users of the system, which are inserted near the end of the code.
    
*/
    $lo = "localhost";
    $user = "root";

	$connection = mysqli_connect($lo, $user) or die (mysqli_connect_error());
	

    $dbcreate = mysqli_query($connection, "CREATE DATABASE IF NOT EXISTS theclinic");

    //$result = mysqli_query($dbcreate);

    if ($dbcreate){

    	$selectdb = mysqli_select_db($connection, "theclinic") or die(mysqli_error($connection));

	    	    $medscheme = ("CREATE TABLE IF NOT EXISTS medical_schemes (
	                            scheme_id int(11) NOT NULL AUTO_INCREMENT,
	                            scheme_name varchar(50) NOT NULL,
	                            scheme_type varchar(50) NOT NULL,
	                            provider_id int(11) NOT NULL,
	                            validity varchar(20),
	                            manager_id int(11) NOT NULL,
	                            PRIMARY KEY (scheme_id)
	                            )");
	
	    $patient =("CREATE TABLE IF NOT EXISTS patients (
	                            patient_id int(11) NOT NULL AUTO_INCREMENT,
	                            fname varchar(20) NOT NULL,
	                            lname varchar(30) NOT NULL,
	                            sex VARCHAR(7),
	                            dob date,
	                            address varchar(50),
	                            contact int(15),
	                            email varchar(30),
	                            dependent varchar(30),
	                            dependent_contact varchar(15),
	                            scheme_id int(11) NOT NULL,
	                            PRIMARY KEY (patient_id)
	                            )");
	
	    $appointment =("CREATE TABLE IF NOT EXISTS appointments(
	                            app_id int(11) NOT NULL AUTO_INCREMENT,
	                            service_id int(11) NOT NULL,
	                            patient_id int(11) NOT NULL,
	                            patient_name varchar(30),
	                            appointment_day date,
	                            status varchar(20),
	                            reminder date,
	                            PRIMARY KEY (app_id)
	                                )");

	    $service =("CREATE TABLE IF NOT EXISTS services (
	                            service_id int(11) NOT NULL AUTO_INCREMENT,
	                            service_name varchar(30) NOT NULL,
	                            charge int(10) NOT NULL,
	                            PRIMARY KEY (service_id)
	                              )");

	    $drugs =("CREATE TABLE IF NOT EXISTS drugs (
	                            drug_id int(11) NOT NULL AUTO_INCREMENT,
	                            drug_name varchar(30) NOT NULL,
	                            drug_type varchar(30) NOT NULL,
	                            stock int(5) NOT NULL,
	                            price int(10),
	                            pharmacist_id int(11) NOT NULL,
	                            PRIMARY KEY (drug_id)
	                              )");

	   $consultation = ("CREATE TABLE IF NOT EXISTS consultations (
	    						cons_id int(11) NOT NULL AUTO_INCREMENT,
	    						service_id int(11) NOT NULL,
	    						patient_id int(11) NOT NULL,
	    						consultation_date timestamp,
	    						test_results varchar(150),
	    						consultation_results varchar(150),
	    						drug_id int(11) NOT NULL,
	    						recep_id int(11) NOT NULL,
	    						pharmacist_id int(11) NOT NULL,
	    						PRIMARY KEY (cons_id)
	    						)");

	    $manager =("CREATE TABLE IF NOT EXISTS manager (
	                            manager_id int(11) NOT NULL AUTO_INCREMENT,
	                            fname varchar(20) NOT NULL,
	                            lname varchar(30) NOT NULL,
	                            dob date,
	                            address varchar(50) NOT NULL,
	                            contact int(20) NOT NULL,
	                            username varchar(30) NOT NULL,
	                            pass varchar(30) NOT NULL,
	                            PRIMARY KEY (manager_id)
	                          )");

	    $reception =("CREATE TABLE IF NOT EXISTS receptionist (
	                            recep_id int(11) NOT NULL AUTO_INCREMENT,
	                            fname varchar(20) NOT NULL,
	                            lname varchar(30) NOT NULL,
	                            dob date,
	                            address varchar(50) NOT NULL,
	                            contact int(20) NOT NULL,
	                            username varchar(30) NOT NULL,
	                            pass varchar(30) NOT NULL,
	                            PRIMARY KEY (recep_id)
	                          )");

	    $pharmacy =("CREATE TABLE IF NOT EXISTS pharmacist (
	                            pharmacist_id int(11) NOT NULL AUTO_INCREMENT,
	                            fname varchar(20) NOT NULL,
	                            lname varchar(30) NOT NULL,
	                            dob date,
	                            address varchar(50) NOT NULL,
	                            contact int(20) NOT NULL,
	                            username varchar(30) NOT NULL,
	                            pass varchar(30) NOT NULL,
	                            PRIMARY KEY (pharmacist_id)
	                          )");
	    $provider =("CREATE TABLE IF NOT EXISTS provider (
	                            provider_id int(11) NOT NULL AUTO_INCREMENT,
	                            provider_name varchar(40) NOT NULL,
	                            address varchar(50),
	                            email varchar(30),
	                            contact int(20),
	                            PRIMARY KEY (provider_id)
	                              )");
	    $report =("CREATE TABLE IF NOT EXISTS report (
	                            report_id int(11) NOT NULL AUTO_INCREMENT,
	                            report varchar(100) NOT NULL,
	                            patient_id int(11) NOT NULL,
	                            service_id int(11) NOT NULL,
	                            report_date timestamp,
	                            PRIMARY KEY (report_id)
	                              )");

        $table1 = mysqli_query($connection, $medscheme) or die(mysqli_error($connection));
        $table2 = mysqli_query ($connection, $patient) or die(mysqli_error($connection));
        $table3 = mysqli_query ($connection, $appointment) or die(mysqli_error($connection));
        $table4 = mysqli_query($connection, $service) or die(mysqli_error($connection)); 
        $table9	= mysqli_query($connection, $consultation) or die(mysqli_error($connection)); 
       	$table5 = mysqli_query($connection, $pharmacy) or die(mysqli_error($connection)); 
       	$table6 = mysqli_query($connection, $reception) or die(mysqli_error($connection));
       	$table7 = mysqli_query($connection, $manager) or die(mysqli_error($connection));
       	$table8 = mysqli_query($connection, $drugs) or die(mysqli_error($connection));
       	$table10 = mysqli_query($connection, $provider) or die(mysqli_error($connection));
       	$table11 = mysqli_query($connection, $report) or die(mysqli_error($connection));

	        if ($selectdb && $table1 && $table2 && $table3 && $table4 && $table5 && $table6 && $table7 && $table8 && $table9 && $table10 && $table11){

	        	$alter1 = mysqli_query($connection, "ALTER TABLE patients 
	        										ADD CONSTRAINT fk_scheme 
	        										FOREIGN KEY (scheme_id) 
	        										REFERENCES medical_schemes(scheme_id)");

	        	$alter2 = mysqli_query($connection, "ALTER TABLE consultations 
	        										ADD CONSTRAINT fk_service 
	        										FOREIGN KEY (service_id) 
	        										REFERENCES services(service_id)");

	        	$alter3 = mysqli_query($connection, "ALTER TABLE consultations 
	        										ADD CONSTRAINT fk_patient 
	        										FOREIGN KEY (patient_id) 
	        										REFERENCES patients(patient_id)");

	        	$alter4 = mysqli_query($connection, "ALTER TABLE consultations 
	        										ADD CONSTRAINT fk_drugs 
	        										FOREIGN KEY (drug_id) 
	        										REFERENCES drugs(drug_id)");

	        	$alter7 = mysqli_query($connection, "ALTER TABLE consultations 
	        										ADD CONSTRAINT fk_recep 
	        										FOREIGN KEY (recep_id) 
	        										REFERENCES receptionist(recep_id)");

	        	$alter5 = mysqli_query($connection, "ALTER TABLE appointments 
	        										ADD CONSTRAINT fk_serv 
	        										FOREIGN KEY (service_id) 
	        										REFERENCES services(service_id)");

	        	$alter6 = mysqli_query($connection, "ALTER TABLE appointments 
	        										ADD CONSTRAINT fk_pat 
	        										FOREIGN KEY (patient_id) 
	        										REFERENCES patients(patient_id)");

	        	$alter8 = mysqli_query($connection, "ALTER TABLE drugs 
	        										ADD CONSTRAINT fk_pharma 
	        										FOREIGN KEY (pharmacist_id) 
	        										REFERENCES pharmacist(pharmacist_id)");

	        	$alter9 = mysqli_query($connection, "ALTER TABLE medical_schemes 
	        										ADD CONSTRAINT fk_mangr 
	        										FOREIGN KEY (manager_id) 
	        										REFERENCES manager(manager_id)");

	        	$alter10 = mysqli_query($connection, "ALTER TABLE medical_schemes 
	        										ADD CONSTRAINT fk_provr 
	        										FOREIGN KEY (provider_id) 
	        										REFERENCES provider(provider_id)");

	        	$alter11 = mysqli_query($connection, "ALTER TABLE consultations 
	        										ADD CONSTRAINT fk_pharmac 
	        										FOREIGN KEY (pharmacist_id) 
	        										REFERENCES pharmacist(pharmacist_id)");

	        	$alter12 = mysqli_query($connection, "ALTER TABLE report 
	        										ADD CONSTRAINT fk_pid 
	        										FOREIGN KEY (patient_id) 
	        										REFERENCES patients(patient_id)");

	        	$alter13 = mysqli_query($connection, "ALTER TABLE report 
	        										ADD CONSTRAINT fk_serid 
	        										FOREIGN KEY (service_id) 
	        										REFERENCES services(service_id)");

	        	$check = mysqli_query($connection, "SELECT * FROM medical_schemes, services, drugs, manager, receptionist, pharmacist, patients");
	        	$match = mysqli_num_rows($check);

	        	if($match != 1) {
	        		//populate data

	        		$fk = mysqli_query($connection, "SET FOREIGN_KEY_CHECKS = 0");

		            $ins_scheme = mysqli_query($connection, 
		            	
		            	"INSERT INTO medical_schemes(scheme_id, scheme_name, scheme_type, provider_id, validity) VALUES (1, 'MASM', 'MASM Scheme', 3, '1 Year'), (2, 'Employee and Dependent Medical Plan', 'MRA Medical Scheme', 1, '1 year'), (3, 'Employee Plan', 'MDF Scheme', 2, '1 year'), (4, 'VIP Scheme', 'VIP Health Plan', 4, '6 months')");

		            $ins_service = mysqli_query($connection, 
		            	
		            	"INSERT INTO services(service_id, service_name, charge) VALUES (1, 'Ultrasound Scanning', '8000.00'), (2, 'Malaria Test', '1500.00'), (3, 'VCT Service', '2000.00'), (4, 'X-Ray', '5200.00'), (5, 'Surgery', '20000.00'), (6, 'Consultation', '2000.00')");
		            
		            $ins_provider = mysqli_query($connection, 
		            	
		            	"INSERT INTO provider(provider_id, provider_name, address, email, contact) VALUES (1, 'Malawi Revenue Authority', 'P. Bag 1135', 'mra@c.com', 011126589), (2, 'Malawi Defence Force', 'P. Bag 43', 'mdf@mdf.com', 0111268479), (3, 'Medical Aid Society of Malawi', 'P. Bag 67', 'masm@masm.org', 011132158), (4, 'The Clinic', 'P. Bag 6', 'theclinic@gmail.com', 011138794)");

		        	$ins_drugs = mysqli_query($connection, 

		        		"INSERT INTO drugs(drug_id, drug_name, drug_type, stock, price) VALUES (1, 'Ibruprofen', 'Anti-biotic', 50, 500), (2, 'Magnetris','Gas', 34, 300), (3, 'Vitamin B', 'Vitamins', 80, 800), (4, 'LA', 'Malarial Drug', 60, 700), (5, 'Paracetamol', 'Anti-biotic', 30, 400)");

		        	$ins_manager = mysqli_query($connection, 

		        		"INSERT INTO manager(manager_id, fname, lname, dob, address, contact, username) VALUES (1, 'Ahmed', 'Muhammed', '1980-3-3', 'P.O Box 313, Lilongwe', 0996123123, 'manager')");

		        	$ins_recept = mysqli_query($connection, 

		        		"INSERT INTO receptionist(recep_id, fname, lname, dob, address, contact, username) VALUES (1, 'Mary', 'Banda', '1989-5-6', 'P.O Box 45, Lumbadzi', 0881456456, 'reception'), (2, 'Pheona', 'Phiri', '1974-6-2', 'P.O. Box 43, Lilongwe', 0224653187, 'pheona')");

		        	$ins_pharma = mysqli_query($connection, 

		        		"INSERT INTO pharmacist(pharmacist_id, fname, lname, dob, address, contact, username) VALUES (1, 'Paul', 'Zitaye', '1985-7-1', 'P.O Box 23, Lilongwe', 0995987987, 'pharmacy'), (2, 'Marcus', 'Fodi', '1998-5-8', 'P.O Box 90, Lilongwe', 0999852641, 'marcus19')");

		        	$ins_patient = mysqli_query($connection, 

		        		"INSERT INTO patients(patient_id, fname, lname, sex, dob, address, contact, email, dependent, dependent_contact) VALUES (1, 'John', 'Smith', 'Male', '1970-7-1', 'P.O Box 21, Lilongwe', 0999637987, 'js@ymail.com', 'Neil Don', 144562689), (2, 'Hong', 'Wang', 'Male', '1930-8-8', 'P.O Box 9, Lilongwe', 0888746318, 'wang@gmail.com', 'Lee Wang', 0888168325), (3, 'Chimwemwe', 'Lobwe', 'Female', '1993-7-3', 'Box 69, Blantyre', 0888696969, 'chimz@gmail.com', 'Al Khal', 0999969696), (4, 'Cain', 'Pers', 'Male', '1900-1-1', 'Box 1, Chitipa', 0111111111, 'cain@abel.com', 'Abel Pers', 0111122222), (5, 'Lois', 'Lane', 'Female', '1970-5-6', 'P.O Box 5', 0888461357, 'brucechitsa16@gmail.com', 'Kent Clart', 0999555555)");
		        	} else {
		        		//
		        	}
			     }	
	        } else {
	        	echo mysqli_error($connection);
	        }

	mysqli_close($connection);

?>