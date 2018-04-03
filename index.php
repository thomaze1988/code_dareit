<?php

// define some variables
$local_file = 'local.txt';
$server_file = 'textfile';

// login data
$ftp_server = "ftp.essenburgmultimedia.nl";
$ftp_user = "asessement@essenburgmultimedia.nl";
$ftp_pass = "VinbXuZR";

// set up basic connection
$conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server"); 

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user, $ftp_pass);

// try to download $server_file and save to $local_file
if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
    echo "Successfully written to $local_file\n";
    $n_of_lines = count(file($local_file));
    rename($local_file, 'backup/procced.txt');
    echo "There are $n_of_lines lines in $local_file"."\n";
} else {
    echo "There was a problem\n";
}

// close the connection
ftp_close($conn_id);

?>