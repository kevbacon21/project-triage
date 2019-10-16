<?php


// 0.validate my datase
use Ramsey\Uuid\Uuid;
$guid = Uuid::uuid4()->toString();


// Step 1: Get a datase connection from our help class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
$stmt = $db->prepare(
  'INSERT INTO PateintVisit
      (patientGuid, firstName, lastName, dob, sexAtBirth)
    VALUES (?,?,?,?,?)'
);
$stmt->execute([
  $guid,
  $_post ['firstName'],
  $_POST ['lastName'],
  $_POST ['dob'],
  $_POST ['sexAtBirth']
]);

//TODO: Error checking?!

// Step 4: Output
header('HTTP/1.1 303 See Other');
header ('Location: ../recofrds/?guid=.'guid');
