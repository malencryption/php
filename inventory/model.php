<!-- Model for Inventory -->
<?php
session_start();
// Get access to the db

function register($firstname, $lastname, $email, $password) {
    $connection = connInv();
    $connection->beginTransaction();

    $flag = TRUE;
    try {
        //Insert the first variables using a prepared statement
        $sql = "INSERT INTO person       
        (firstName, lastName)
        VALUES (:first, :last)";

        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':first', $firstname, PDO::PARAM_STR);
        $stmt->bindValue(':last', $lastname, PDO::PARAM_STR);
        // $stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
        // $stmt->bindValue(':dob', $dob, PDO::PARAM_STR);
        $stmt->execute();

        //determine if the insert worked
        //by getting the primary key created by the insert
        $userid = $connection->lastInsertId();
        $stmt->closeCursor();
        
    } catch (Exception $ex) {
        $connection->rollBack();
        
        return 0; //indicates failure
    }

    //change flag if the insert failed
    if ($userid < 1) {
        $flag = FALSE;
    }
    $_SESSION['status1'] = $flag;
    //if the flag is still true, attempt the second insert
    if ($flag) {
        try {
            //write the other variables and the primary key 
            //from the first table to the second table
            $sql = "INSERT INTO
            account(email, password, personId)
            VALUES (:email, :password, :id)";

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':password', $password, PDO::PARAM_STR);
            // $stmt->bindValue(':question', $question, PDO::PARAM_INT);
            // $stmt->bindValue(':answer', $answer, PDO::PARAM_INT);
            $stmt->bindValue(':id', $userid, PDO::PARAM_INT);
            $stmt->execute();
            $rowcount = $stmt->rowCount(); //How many rows were added
            $stmt->closeCursor();
        } 
        catch (PDOException $ex) {
		//set flag to false indicating the insert could not be completed
            $flag = FALSE;
        }
    }
    if ($rowcount != 1) {
        $flag = FALSE; // the insert failed
    }

    //check if the flag is true
    if ($flag) {
        //make all inserts permanent
        $connection->commit();
        return 1; //a successful registration
    } else {
        //the flag is false, get rid of any inserted data from the transaction
        $connection->rollBack();
        return 0; //a failed registration
    }
}