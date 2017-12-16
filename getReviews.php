
<?php

                  $link = mysqli_connect("localhost", "root", "", "pg_db") or die("ERROR");

                  $sql="select review, name from tb_feedback";
                  $data=mysqli_query($link, $sql);

                    if($data)
                    {
                      $length=mysqli_num_rows($data);
                        while ($length > 0 )
                        {

                          $row = mysqli_fetch_array($data);


                          echo $row['review'], $row['name'];


     $length--; }} ?>
