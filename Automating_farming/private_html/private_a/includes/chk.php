<?php 
    // Database connection
    include("config.php");
    
    if(isset($_POST["start_pipe1"])) {
        $pipe1="start";
        
        $pipe1_time=$_POST['pipe1_time'];
                $sql = "UPDATE `irrigation` SET `pipe1`='$pipe1',`time_pipe1`='$pipe1_time' WHERE `id`=1";
                $stmt = $conn->prepare($sql);
                 if($stmt->execute()){
                    $resMessage = array(
                        "status" => "alert-success",
                        "message" => "Image uploaded successfully."
                    );    
                    echo "sucess";             
                 }
                }

                if(isset($_POST["stop_pipe1"])) {
                    $pipe1="stop";
                   
                    $pipe1_time=0;
                            $sql = "UPDATE `irrigation` SET `pipe1`='$pipe1',`time_pipe1`='$pipe1_time' WHERE `id`=1";
                            $stmt = $conn->prepare($sql);
                             if($stmt->execute()){
                                $resMessage = array(
                                    "status" => "alert-success",
                                    "message" => "Image uploaded successfully."
                                );    
                                echo "sucess";             
                             }
                            }

                            if(isset($_POST["start_pipe2"])) {
                                $pipe2="start";
                                
                                $pipe2_time=$_POST['pipe2_time'];
                                        $sql = "UPDATE `irrigation` SET `pipe2`='$pipe2',`time_pipe2`='$pipe2_time' WHERE `id`=1";
                                        $stmt = $conn->prepare($sql);
                                         if($stmt->execute()){
                                            $resMessage = array(
                                                "status" => "alert-success",
                                                "message" => "Image uploaded successfully."
                                            );    
                                            echo "sucess";             
                                         }
                                        }

                                        if(isset($_POST["stop_pipe2"])) {
                                            $pipe2="stop";
                                            
                                            $pipe2_time=0;
                                                    $sql = "UPDATE `irrigation` SET `pipe2`='$pipe2',`time_pipe2`='$pipe2_time' WHERE `id`=1";
                                                    $stmt = $conn->prepare($sql);
                                                     if($stmt->execute()){
                                                        $resMessage = array(
                                                            "status" => "alert-success",
                                                            "message" => "Image uploaded successfully."
                                                        );    
                                                        echo "sucess";             
                                                     }
                                                    }

                                                    if(isset($_POST["start_pipe3"])) {
                                                        $pipe3="start";
                                                        
                                                        $pipe3_time=$_POST['pipe3_time'];
                                                                $sql = "UPDATE `irrigation` SET `pipe3`='$pipe3',`time_pipe3`='$pipe3_time' WHERE `id`=1";
                                                                $stmt = $conn->prepare($sql);
                                                                 if($stmt->execute()){
                                                                    $resMessage = array(
                                                                        "status" => "alert-success",
                                                                        "message" => "Image uploaded successfully."
                                                                    );    
                                                                    echo "sucess";             
                                                                 }
                                                                }

                                                                if(isset($_POST["stop_pipe3"])) {
                                                                    $pipe3="stop";
                                                                    
                                                                    $pipe3_time=0;
                                                                            $sql = "UPDATE `irrigation` SET `pipe3`='$pipe3',`time_pipe3`='$pipe3_time' WHERE `id`=1";
                                                                            $stmt = $conn->prepare($sql);
                                                                             if($stmt->execute()){
                                                                                $resMessage = array(
                                                                                    "status" => "alert-success",
                                                                                    "message" => "Image uploaded successfully."
                                                                                );    
                                                                                echo "sucess";             
                                                                             }
                                                                            }
?>